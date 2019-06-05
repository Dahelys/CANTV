<?php

namespace reporte_red_datos_cantv\Console\Commands;

use Illuminate\Console\Command;
use reporte_red_datos_cantv\Planta;

class UpdatePlanta extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'planta:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clona la planta';

    /**
     * Create a new command instance.
     *
     * @return void
  
     */

    /*
    public function __construct()
    {
        parent::__construct();
    }
*/
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $fun = Planta::updatePlanta();

        if($fun){

            $this->info('La planta ha sido Clonada!');

        }else{

            $this->info('La planta no fue Clonada, ya existe una Copia de este mes!');

        }

          
    }



}
