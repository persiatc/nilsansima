<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\User;
use App\Invoice;

class ChargeInvoces implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $users = User::all();
      foreach ($users as $user) {
        $amount = (int)$user->size * 2500;
        $forr = 'شارژ' . ' ' . \jDate::forge('now - 2 months')->format('%B') . ' ' . 'ماه';
        $code = 'CH'  . '-' . \jDate::forge('now -2 months')->format('%m') . '-' . $user->id;
        Invoice::create([
          'amount' => $amount,
          'for' => $forr,
          'code' => $code,
          'userId' => $user->id
        ]);
      }
    }
}
