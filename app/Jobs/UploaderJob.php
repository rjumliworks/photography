<?php

namespace App\Jobs;

use FFMpeg;
use App\Models\FolderFile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploaderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $folderFile;

    public function __construct(FolderFile $folderFile)
    {
        $this->folderFile = $folderFile;
    }

    public function handle()
    {
        $meta = [];

        if ($this->folderFile->kind === 'image') {
            $imageInfo = getimagesize(storage_path("app/public/{$this->folderFile->path}"));
            $meta = [
                'width' => $imageInfo[0],
                'height' => $imageInfo[1],
            ];
            // optional: extract EXIF
        } else {
            $ffprobe = FFMpeg\FFProbe::create();
            $duration = $ffprobe->format(storage_path("app/public/{$this->folderFile->path}"))->get('duration');
            $videoStream = $ffprobe->streams(storage_path("app/public/{$this->folderFile->path}"))->videos()->first();
            $meta = [
                'width' => $videoStream->get('width'),
                'height' => $videoStream->get('height'),
                'duration' => $duration,
                'codec' => $videoStream->get('codec_name'),
            ];
        }

        $this->folderFile->update([
            'meta' => $meta,
            'status' => 'completed'
        ]);
    }
}
