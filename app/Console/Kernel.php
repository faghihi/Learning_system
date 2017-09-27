<?php

namespace App\Console;

use App\Goal;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
       // \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Run once per week ...
//        $schedule->call(function () {
//            $goals = Goal::all();
//            foreach($goals as $goal){
//                $goal->delete();
//            }
//        })->hourly();
//
//        ->after(function () {
//            return redirect('\Dashboard');
//        });
    }
}
