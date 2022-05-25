<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'name' => 'user_panel_for_sms',
                'value' => 'erampayam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'password_panel_for_sms',
                'value' => 'GoodBoom)123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'lineNumber_panel_for_sms',
                'value' => '+983000505',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'logo',
                'value' => '/theme/img/logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'logo_alt_image',
                'value' => 'آکادمی تخصصی لاراول در ایران',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'title',
                'value' => 'آکادمی تخصصی لاراول',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'description',
                'value' => 'آکادمی تخصصی لاراول در ایران قصد دارد بصورت تخصصی دوره های آموزشی لاراول را در اختیار علاقمندان قرار دهد. پس شما می توانید از دوره های',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'siteUrlForPayment',
                'value' => 'http://laravellearn.test/course/payment/check',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'merchantId',
                'value' => '801ff286-fbd4-4aa2-b837-a8f2e1386424',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
