<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  // {
  //   DB::table('users')->insert(
  //     [
  //     'email' => 'rahmani@persiatc.com',
  //     'name' => 'احمد',
  //     'family' => 'رحمانی',
  //     'password' => bcrypt('tabas35242'),
  //     'nationalCode' => '1',
  //     'groupName' => 'مدیریت',
  //     'position' => 'مدیرعامل',
  //     'mobileNumber' => '09121010328',
  //     'isAdmin' => 1,
  //     'isDataEntry' => 1,
  //   ]
  // );
  //
  // }


  {

  if (($handle = fopen ( public_path () . '/dataImporters/dataImporters.csv', 'r' )) !== FALSE) {

    while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
      DB::table('users')->insert(
        [

              [
              'email' => $data[0],
              'name' => $data[1],
              'family' => $data[2],
              'password' => $data[3],
              'nationalCode' => $data[4],
              'groupName' => $data[5],
              'position' => $data[6],
              'mobileNumber' => $data[7],
              'isAdmin' => 0,
              'isDataEntry' => 0,
            ],

        ]
      );

    }

    fclose ( $handle );
  }



  }
}
