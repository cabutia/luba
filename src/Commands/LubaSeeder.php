<?php

namespace GRG\Luba\Commands;

use Illuminate\Console\Command;

class LubaSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'luba:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserts sample data into the database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $seeders = glob(__DIR__ .'/../Database/Seeders/*');
        foreach ($seeders as $seed) {
            $file = basename($seed);
            $class = str_replace('.php', '', $file);
            $classname = '\\GRG\\Luba\\Database\\Seeders\\' . $class;
            $seeder = new $classname();
            $this->line("Seeding $class");
            try {
                $seeder->run();
                $this->info("Success!");
            } catch (\Exception $e) {
                $this->error("Error:");
                $this->error($e->getMessage());
            }


        }
    }
}
