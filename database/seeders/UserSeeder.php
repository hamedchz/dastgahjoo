<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table('users')->insert([
            [
                'name'              => 'حامد',
                'mobile'             => '09210034734',
                'mobile_verified_at' => now(),
                'email'              => 'w3persia@gmail.com',
                'avatar'              => '/admin/img/pro.jpg',
                'isActive'           => '1',
                'isAdmin'             => '1',
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
            [
                'name'              => 'احمد',
                'mobile'             => '09171063364',
                'mobile_verified_at' => now(),
                'email'              => 'arpaweb8@gmail.com',
                'avatar'              => '/admin/img/pro.jpg',
                'isActive'           => '1',
                'isAdmin'           => '1',
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
            [
                'name'              => 'حسن',
                'mobile'             => '09365022654',
                'mobile_verified_at' => now(),
                'email'              => 'hmp1368@gmail.com',
                'avatar'              => '/admin/img/pro.jpg',
                'isActive'           => '0',
                'isAdmin'           => '1',
                'created_at'         => now(),
                'updated_at'         => now(),
            ],


           
            ///////////////////تا آخر رکورد 366


        ]);
        DB::table('role_user')->insert([
            ['role_id'    => '1','user_id'    => '1'],
            ['role_id'    => '2','user_id'    => '2'],
            ['role_id'    => '3','user_id'    => '3'],

        ]);
        // for ($i=3;$i<=299;$i++){
        //     DB::table('role_user')->insert([
        //         ['role_id'    => '3','user_id'    => $i],
        //     ]);
        // }
    }
}
