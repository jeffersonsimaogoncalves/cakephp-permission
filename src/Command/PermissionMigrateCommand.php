<?php

namespace JeffersonSimaoGoncalves\CakePermission\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use JeffersonSimaoGoncalves\CakePermission\Exception\RuntimeException;

/**
 * Class PermissionMigrateCommand
 *
 * @package JeffersonSimaoGoncalves\CakePermission\Command
 */
class PermissionMigrateCommand extends Command
{
    /**
     * @var string
     */
    private $migrationFilesPath;

    public function execute(Arguments $args, ConsoleIo $io)
    {
        $this->migrationFilesPath = CONFIG . 'Migrations/';
        //Creates the directory if it does not exists
        file_exists($this->migrationFilesPath) || mkdir($this->migrationFilesPath, 0777, true);
        //All migration files
        $srcMigrationFiles = $this->findMigrationFiles(__DIR__ . '/../../database/migrations');
        foreach ($srcMigrationFiles as $file) {
            $result = $this->processMigrationFile($file);
            if (!$result) {
                throw new RuntimeException(sprintf('Fail to copy migration file "%s"', $file));
            }
        }
        $io->out('Migrate ok, please execute command "./cake migrations migrate"');
    }

    /**
     * Find array of migration file
     *
     * @param string $path
     *
     * @return array
     */
    protected function findMigrationFiles(string $path)
    {
        return glob("{$path}/*");
    }

    /**
     * @param $originFile
     *
     * @return bool
     */
    protected function processMigrationFile($originFile)
    {
        $format = 'YmdHis';
        $newFileName = $this->migrationFilesPath
            . date($format) . '_' . basename($originFile);

        return copy($originFile, $newFileName);
    }
}
