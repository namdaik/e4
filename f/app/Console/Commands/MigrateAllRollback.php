<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class MigrateAllRollback extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate-all:rollback';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate rollback all folders';

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
        $this->info('Migrate rollback all folders');
        Artisan::call('migrate:rollback',["--path"=>"/database/migrations/*"]);
    }
}
