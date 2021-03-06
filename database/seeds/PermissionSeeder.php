<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();
        $json = File::get("database/data/permissions.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            \App\Permission::firstOrCreate(array(
                'id' => $obj->id,
                'name' => $obj->name
            ));
        }
    }
}
