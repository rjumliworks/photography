<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListDropdownsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_dropdowns')->delete();
        
        \DB::table('list_dropdowns')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'n/a',
                'classification' => 'n/a',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Private',
                'classification' => 'Visibility',
                'type' => 'n/a',
                'color' => 'text-danger',
                'others' => 'bg-danger',
                'is_active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Shared',
                'classification' => 'Visibility',
                'type' => 'n/a',
                'color' => 'text-info',
                'others' => 'bg-info',
                'is_active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Public',
                'classification' => 'Visibility',
                'type' => 'n/a',
                'color' => 'text-primary',
                'others' => 'bg-primary',
                'is_active' => 1,
            ),
        ));

        
    }
}