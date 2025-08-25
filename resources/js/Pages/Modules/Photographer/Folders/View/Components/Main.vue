<template>
<div class="card bg-light-subtle shadow-none border">
        <div class="card-header bg-light-subtle">
            <div class="d-flex mb-n3">
                <div class="flex-shrink-0 me-3">
                    <div style="height:2.5rem;width:2.5rem;">
                        <span class="avatar-title bg-primary-subtle rounded p-2 mt-n1">
                            <i class="ri-image-line text-primary fs-24"></i>
                        </span>
                    </div>
                </div>
                <div class="flex-grow-1">
                    <h5 class="mb-0 fs-14"><span class="text-body">Media Files</span></h5>
                    <p class="text-muted text-truncate-two-lines fs-12">A list of all your uploaded images and videos.</p>
                </div>
                <div class="flex-shrink-0 text-end">
                    <div class="list-grid-nav hstack gap-1">
                        <button type="button" id="grid-view-button" class="btn btn-soft-info nav-link btn-icon fs-14 filter-button material-shadow-none"><i class="ri-grid-fill"></i></button>
                        <button type="button" id="list-view-button" class="btn btn-soft-info nav-link btn-icon fs-14 filter-button material-shadow-none"><i class="ri-list-unordered"></i></button>
                        
                        <button
                         @click="triggerFileInput"
                         class="btn btn-primary"><i class="ri-add-fill me-1 align-bottom"></i>Upload</button>
                        <input
                        ref="fileInput"
                        type="file"
                        accept="image/*,video/*"
                        multiple
                        style="display: none;" 
                        @change="handleFileChange"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-white rounded-bottom border-bottom">
            <p class="mb-0 text-primary fs-12 fw-semibold">Images & Videos</p>
        </div>
        <div class="card bg-light-subtle rounded-bottom shadow-none mb-0" style="height: calc(100vh - 395px); overflow-x: hidden;">
            <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1 p-3 mt-2">
                <div class="col list-element" v-for="(list,index) in folder.files" v-bind:key="index">
                    <div class="card explore-box card-animate">
                        <div class="explore-place-bid-img"> <input type="hidden" class="form-control" id="1">
                            <div class="d-none">undefined</div> 
                            <img :src="'/storage/'+list.path" alt="" class="card-img-top explore-img">
                            <div class="bg-overlay"></div>
                            <div class="place-bid-btn"> 
                                <a href="#!" class="btn btn-success"><i class="ri-auction-fill align-bottom me-1"></i> Place Bid</a> 
                            </div>
                        </div>
                        <div class="bookmark-icon position-absolute top-0 end-0 p-2"> 
                            <button type="button" class="btn btn-icon active" data-bs-toggle="button" aria-pressed="true">
                                <i class="ri-star-s-fill text-warning fs-20"></i>
                            </button> 
                        </div>
                        <div class="card-body">
                            <h5 class="mb-0 mt-n2 fs-12 text-truncate text-primary">{{ list.name }}</h5>
                            <p class="text-muted fs-10 mb-n2">{{ formatSize(list.size) }}</p>
                        </div>
                         <div class="card-footer border-top border-top-dashed mb-n2 fs-12">
                            <p class="fw-medium mb-0 mt-n1 float-end"><i class="ri-message-3-fill text-primary align-middle"></i> 0 </p>
                            <p class="fw-medium mb-0 mt-n1"><i class="mdi mdi-heart text-danger align-middle"></i> 0 </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Upload ref="upload"/>
</template>
<script>
import { useForm } from '@inertiajs/vue3';
import Upload from '../Modals/Upload.vue';
export default {
    components: { Upload },
    props:['folder','plan'],
    data(){
        return {
            form: useForm({
                id: this.folder.id,
                file: null,
                limit: this.plan.plan.storage_limit
            }),
        }
    },
    methods: { 
        triggerFileInput() {
            this.$refs.fileInput.click(); // Programmatically click the hidden input
        },
        openUpload(){
            this.$refs.upload.show();
        },
        handleFileChange(e) {
            const selectedFiles = Array.from(e.target.files);

            selectedFiles.forEach((file, index) => {
                const clientId = Date.now() + Math.random();
                let preview = file.type.startsWith("image/") ? URL.createObjectURL(file) : null;

                // Immediately show in Upload Manager
                window.dispatchEvent(new CustomEvent("new-upload", {
                    detail: { clientId, name: file.name, size: file.size, status: "Queued", progress: 0, folderId: this.folder.id, preview }
                }));

                const formData = new FormData();
                formData.append('file', file);
                formData.append('id', this.folder.id);
                formData.append('limit', this.form.limit);

                axios.post('/files', formData, {
                    headers: { 'Content-Type': 'multipart/form-data' },
                    onUploadProgress: (event) => {
                        window.dispatchEvent(new CustomEvent("upload-progress", {
                            detail: { clientId, progress: Math.round((event.loaded / event.total) * 100) }
                        }));
                        window.dispatchEvent(new CustomEvent("upload-status", {
                            detail: { clientId, status: "Processing" }
                        }));
                    }
                }).then(response => {
                    const staggerDelay = Math.random() * 2000; 
                    setTimeout(() => {
                        window.dispatchEvent(new CustomEvent("upload-status", {
                            detail: { clientId, status: "Completed" }
                        }));
                    }, staggerDelay);
                    this.folder.files.unshift(response.data.file);
                    this.$emit('size',response.data.file.size);
                }).catch(response => {
                    window.dispatchEvent(new CustomEvent("upload-status", {
                        detail: { clientId, status: "Failed" }
                    }));
                    console.log(response.status);
                });
            });

            e.target.value = "";
        },
        formatSize(bytes) {
            if (bytes < 1024) return bytes + " B"
            if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + " KB"
            return (bytes / (1024 * 1024)).toFixed(1) + " MB"
        }
    }
}
</script>