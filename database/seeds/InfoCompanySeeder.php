<?php

use Illuminate\Database\Seeder;

class InfoCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // $position = [
        //     [
        //         'address' => 'خیابان استادنجات الهی خیابان اراک پلاک ۲۷ ',
        //         'code_posti' => '۱۵۹۸۹۶۶۹۵۱',
        //         'phone' => '۸۷۷۰۰۱۱۲',
        //         'fax' => '۸۸۹۳۴۳۰۴',
        //         'address_khoram' => 'اداره بنادر و کشتیرانی یارد یک شرکت مهندسی و ساخت تاسیسات دریایی ایران ساختمان انفورماتیک',
        //         'code_posti_khoram' => '۶۴۱۵۹۱۳۱۶۱',
        //         'phone_khoram' => '۰۶۱-۵۳۵۰۴۲۰۲',
        //         'fax_khoram' => '',
        //         'shomare_sabt' => '۱۵۵۶',
        //         'shomare_hesab_tejarat' => '۱۲۹۳۴۳۱۷۶',
        //         'shomare_shaba' => 'IR60 0180 0000 0000 0129 3431 76',
        //         'code_eqtesadi' => '4113-3983-7594',
        //         'email' => 'info@persiatc.com',
        //         'website' => 'www.persiatc.com',
        //         'shenase_meli' => '۱۰۱۰۲۶۳۱۴۰۹',
        //     ],
        // ];



        DB::table('info_companies')->insert([
            'address' => 'خیابان استادنجات الهی خیابان اراک پلاک ۲۷ ',
            'code_posti' => '۱۵۹۸۹۶۶۹۵۱',
            'phone' => '۸۷۷۰۰۱۱۲',
            'fax' => '۸۸۹۳۴۳۰۴',
            'address_khoram' => 'اداره بنادر و کشتیرانی یارد یک شرکت مهندسی و ساخت تاسیسات دریایی ایران ساختمان انفورماتیک',
            'code_posti_khoram' => '۶۴۱۵۹۱۳۱۶۱',
            'phone_khoram' => '۰۶۱-۵۳۵۰۴۲۰۲',
            'fax_khoram' => '',
            'shomare_sabt' => '۱۵۵۶',
            'shomare_hesab_tejarat' => '۱۲۹۳۴۳۱۷۶',
            'shomare_shaba' => 'IR60 0180 0000 0000 0129 3431 76',
            'code_eqtesadi' => '4113-3983-7594',
            'email' => 'info@persiatc.com',
            'website' => 'www.persiatc.com',
            'shenase_meli' => '۱۰۱۰۲۶۳۱۴۰۹',
        ]);

    }

}
