<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class Ipconfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ip';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run laraevl in your local ip';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // ask
        $port = $this->ask('What is your local port?');
        $ip = gethostbyname(trim(`hostname`));

        $port = $port ?? '5000';

        $this->info('Your IP is : http://' . $ip . ":$port");
        Artisan::call('serve --host ' . $ip . ":$port");
        return 0;
    }
}
