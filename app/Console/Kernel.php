<?php

namespace reporte_red_datos_cantv\Console;

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
       // Commands\Inspire::class,
      
         Commands\UpdatePlanta::class,
    
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
      //  $schedule->command('inspire')
        //         ->hourly();

        $schedule->command('planta:update');

       
    }
}
