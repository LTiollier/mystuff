<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class CreateMysqlDatabase extends Command
{
    protected $signature = 'mysql:create-database {--force}';

    protected $description = 'Create a MySQL database.';

    /**
     * @return int
     */
    public function handle(): int
    {
        $forceCreateDatabase = (bool)$this->option('force');

        $this->createDatabase(
            config('database.connections.mysql.database'),
            config('database.connections.mysql.username'),
            config('database.connections.mysql.password'),
            $forceCreateDatabase
        );

        return 0;
    }

    private function createDatabase(string $database, string $username, string $password, bool $force = false): void
    {
        $databaseExists = $this->checkIfDatabaseExists($database, $username, $password);

        if ($databaseExists && !$force) {
            $this->line(sprintf(
                'Database "%s" already exists.',
                $database
            ));

            return;
        }

        if ($databaseExists) {
            $this->dropDatabase($database, $username, $password);
        }

        $this->executeMysqlQuery(
            sprintf(
                'CREATE DATABASE %s;',
                $database
            ),
            $username,
            $password
        );

        $this->info(sprintf(
            'Database "%s" succesfully created!',
            $database
        ));
    }

    private function dropDatabase(string $database, string $username, string $password): void
    {
        $this->executeMysqlQuery(sprintf(
            'DROP DATABASE %s;',
            $database
        ), $username, $password);

        $this->line(sprintf(
            'Database "%s" succesfully dropped.',
            $database
        ));
    }

    private function checkIfDatabaseExists(string $database, string $username, string $password): bool
    {
        try {
            $this->executeMysqlQuery(sprintf(
                'USE %s;',
                $database
            ), $username, $password);
        } catch (ProcessFailedException $e) {
            if (false !== strpos($e->getMessage(), 'Unknown database')) {
                return false;
            }

            throw $e;
        }

        return true;
    }

    private function executeMysqlQuery(string $sql, string $username, string $password): void
    {
        $process = Process::fromShellCommandline(sprintf(
            'mysql -u%s -p%s -e "%s"',
            $username,
            $password,
            $sql
        ));

        $process->mustRun();
    }
}
