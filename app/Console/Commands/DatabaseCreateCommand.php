<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DatabaseCreateCommand extends Command
{
    /**
     * @var string
     */
    protected $name = 'db:create';

    /**
     * @var string
     */
    protected $description = 'This command creates a new database';

    /**
     * @var string
     */
    protected $signature = 'db:create';


    public function handle(): void
    {
        $database = env('DB_DATABASE', false);

        if (!$database) {
            $this->info('Skipping creation of database as env(DB_DATABASE) is empty');
            return;
        }

        $dbFile = env('DB_DATABASE');

        if (file_exists(base_path(env('DB_DATABASE')))) {
            $this->info(sprintf('Skipping creation of database, already exists: %s', $dbFile));
            return;
        }

        try {
            touch($dbFile);
            $this->info(sprintf('Successfully created database: %s', $dbFile));
        } catch (\Exception $exception) {
            $this->error('Failed to create database, %s', $exception->getMessage());
        }
    }
}