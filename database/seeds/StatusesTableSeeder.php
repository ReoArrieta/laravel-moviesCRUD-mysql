<?php

use App\Status;
use Illuminate\Database\Seeder;


class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new Status();
        $status->name = 'activo';
        $status->type_status_id = '1';
        $status->save();

        $status = new Status();
        $status->name = 'inactivo';
        $status->type_status_id = '1';
        $status->save();
    }
}
