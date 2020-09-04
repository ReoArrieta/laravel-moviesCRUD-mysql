<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Admin Movie',
            'slug' => 'movie.all',
            'description' => 'all access to movie module'
        ]);
        Permission::create([
            'name' => 'Admin Users',
            'slug' => 'user.all',
            'description' => 'all access to user module'
        ]);
    }
}
