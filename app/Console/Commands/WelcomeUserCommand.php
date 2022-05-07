<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WelcomeUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //tidak memakai handle
    //protected $signature = 'welcome:user';

    protected $signature = 'welcome:user{name_argument}{--org_option=}';
    
    //default
    //protected $signature = 'welcome:user{name_argument=Andrias}';
    
    //option
    //protected $signature = 'welcome:user{name_argument=Andrias}{--org_option=ITS}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Say Hello to User';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //memanggil argument
        $name_argument = $this->argument('name_argument');

        //memanggil opsi
        $org_option = $this->option('org_option');

        $this->info("
            Hello {$name_argument} from {$org_option}!\n\n
            You call welcome:user command \n
            with name Argument : {$name_argument}
            with name Option : {$org_option}
        ");

        if ($this->confirm('Do you wish to continue?')) 
        {
            $this->info("Ok Continue");
            $username = $this->ask('Please type your username!');
            $password = $this->secret('What is the password?');
        } 
        else {
            $this->error("Stop Process");
        }

        $this->info("Thank you! See you Again!!!");
    }
}
