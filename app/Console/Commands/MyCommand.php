<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:my-command {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $texto = $this->argument('name');
        // $this->info("Texto exitoso $texto");
        // $this->line('texto nuevo');
        $this->withProgressBar([1,2,3], function() {
            sleep(0);
        });

        /*

            - ask('pregunta')
            - secret('pregunta')
            - confirm('pregunta')
            - anticipate('pregunta', [opciones])
            - choice('pregunta', [opciones])

        */

        // $this->line($this->ask('Que te parecio?'));

        // $this->line($this->secret('escribe?'));

        // $this->line($this->confirm('Confirma?'));
        // $this->line($this->anticipate('seguro?', ['poco', 'medio', 'mucho']));

        $this->choice('seguro?', ['poco', 'medio', 'mucho']);

        return Command::SUCCESS;
    }
}
