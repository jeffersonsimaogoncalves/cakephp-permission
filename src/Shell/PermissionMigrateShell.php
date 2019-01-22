<?php
/**
 * CakePHP permission handling library
 *
 * @author Tao <taosikai@yeah.net>
 */

namespace JeffersonSimaoGoncalves\CakePermission\Shell;

use Cake\Console\Shell;
use JeffersonSimaoGoncalves\CakePermission\Exception\RuntimeException;

/**
 * Class PermissionMigrateShell
 *
 * Date: 22/01/2019 00:28
 *
 * Project: cakephp-permission
 *
 * @author Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\CakePermission\Shell
 */
class PermissionMigrateShell
    extends Shell
{

    protected $migrationFilesPath;

    /**
     * {@inheritdoc}
     */
    public function main()
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
        $this->out('Migrate ok, please execute command "./cake migrations migrate"');
    }

    /**
     * Find array of migration file
     *
     * @param string $path
     *
     * @return array
     */
    protected function findMigrationFiles($path)
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
