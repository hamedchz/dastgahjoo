<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id'          => '1',
                'name'        => 'admin',
                'description' => 'مدیر',
                'isActive'    => '1',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'id'          => '2',
                'name'        => 'teacher',
                'description' => 'مدرس',
                'isActive'    => '1',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'id'          => '3',
                'name'        => 'student',
                'description' => 'دانشجو',
                'isActive'    => '1',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);

        //Permission Full For Admin
        foreach (Permission::all() as $permission) {
            DB::table('permission_role')->insert([
                [
                    'role_id' => '1',
                    'permission_id' => $permission->id,
                ],
            ]);
        }

        //Permission Full For student And Teacher

    }
}
