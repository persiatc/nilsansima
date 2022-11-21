<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\User;
use App\Invoice;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->call(function(){
        //   $users = User::all();
        //   foreach ($users as $user) {
        //     $amount = (int)$user->size * 2500;
        //     $forr = 'شارژ' . ' ' . \jDate::forge('now')->format('%B') . ' ' . 'ماه';
        //     $code = 'CH'  . '-' . \jDate::forge('now')->format('%m') . '-' . $user->id;
        //     Invoice::create([
        //       'amount' => $amount,
        //       'for' => $forr,
        //       'code' => $code,
        //       'userId' => $user->id
        //     ]);
        //   }
        //
        // })->monthlyOn('03', '00:55')->timezone('Asia\Tehran');;
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
