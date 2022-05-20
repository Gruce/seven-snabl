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
    protected $description = 'Start the server on the specified port';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $x = shell_exec('ipconfig');
        $x = explode(':', $x);
       
        $index = count($x) == 18 ? 15 : 18;

        $ip = trim(explode('S' , $x[$index])[0]);

        $this->info('Your IP is : http://' . $ip . ':5000');
        Artisan::call('serve --host ' . $ip . ':5000');
        // dd(gethostbyname(trim(`hostname`)));
        return 0;
    }
}
