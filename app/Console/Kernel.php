<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Console\Commands\UpdateScheduledSurveys;

use Illuminate\Support\Facades\DB;
use App\Models\Surveys;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        // $schedule->command('surveys:schedule')->everyMinute();

        $schedule->call(function () {
            $updated = DB::table('surveys')
              ->where('status', 'scheduled')
              ->where('publishDate', '<=', now())
              ->update(['status' => 'published']);
              echo $updated.' survey(s) published';
        })->timezone('America/Toronto')->everyMinute();

        $schedule->call(function () {
            $updated = DB::table('surveys')
              ->where('status', 'published')
              ->where('expireDate', '<=', now())
              ->update(['status' => 'expired']);
              echo $updated.' survey(s) unpublished';
        })->timezone('America/Toronto')->everyMinute();


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
