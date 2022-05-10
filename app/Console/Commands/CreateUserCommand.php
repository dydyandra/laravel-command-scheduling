<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user{name}{--option=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Create New User';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $option = $this->option('option');
        $this->info("Hallo {$name} from {$option}\n
                You Call create:user Command \n
                With name argument : {$name}\n
                With name option : {$option}");
        
        if ($this->confirm('Do you wish to continue?'))
        {
            $this->info("OK Continue");
            $username = $this->ask('Please type your username!');
            $password = $this->secret('Please type your password!');
        }
        else{
            $this->error("Stop Proccess");
        }

        $this->info("Thank You!!!");
    }
}
