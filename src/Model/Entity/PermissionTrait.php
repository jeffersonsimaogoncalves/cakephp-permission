<?php
/**
 * CakePHP permission handling library
 *
 * @author Tao <taosikai@yeah.net>
 */

namespace JeffersonSimaoGoncalves\CakePermission\Model\Entity;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Utility\Text;
use JeffersonSimaoGoncalves\CakePermission\Exception\InvalidArgumentException;
use JeffersonSimaoGoncalves\CakePermission\TableFactory;

/**
 * Trait PermissionTrait
 *
 * Date: 22/01/2019 00:26
 *
 * Project: cakephp-permission
 *
 * @author Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\CakePermission\Model\Entity
 */
trait PermissionTrait
{
    /**
     * Finds the permission by its name, if it does not exists, the role will be created
     *
     * @param  string  $name
     *
     * @return PermissionInterface
     */
    public static function findOrCreate($name)
    {
        try {
            $permission = static::find($name);
        } catch (RecordNotFoundException $exception) {
            $permission = static::create($name);
        }

        return $permission;
    }

    /**
     * Gets the permission by its name
     *
     * @param  string  $name
     *
     * @return PermissionInterface
     */
    public static function find($name)
    {
        return TableFactory::getPermissionModel()
            ->findByName($name)
            ->firstOrFail();
    }

    /**
     * Creates a role
     *
     * @param  string|array  $arguments
     *
     * @return PermissionInterface
     */
    public static function create($arguments)
    {
        if (is_string($arguments)) {
            $arguments = [
                'name' => $arguments,
            ];
        }
        $arguments['slug'] = Text::slug($arguments['name']);
        /** @var \JeffersonSimaoGoncalves\CakePermission\Model\Entity\Permission $permission */
        $permission = TableFactory::getPermissionModel()
            ->newEntity($arguments, ['validate' => 'permission']);
        if (TableFactory::getPermissionModel()
                ->save($permission) === false) {
            throw new InvalidArgumentException(sprintf('Failed to create the permission "%s"',
                $arguments['name']));
        }

        return $permission;
    }
}
