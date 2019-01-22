<?php
/**
 * CakePHP permission handling library
 *
 * @author Tao <taosikai@yeah.net>
 */

namespace JeffersonSimaoGoncalves\CakePermission;

use Cake\Core\Configure;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use JeffersonSimaoGoncalves\CakePermission\Model\Table\PermissionsTable;
use JeffersonSimaoGoncalves\CakePermission\Model\Table\RolesTable;
use JeffersonSimaoGoncalves\CakePermission\Model\Table\UsersTable;

/**
 * Class TableFactory
 *
 * Date: 22/01/2019 00:25
 *
 * Project: cakephp-permission
 *
 * @author Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\CakePermission
 */
class TableFactory
{
    /**
     * Array of default models classes
     *
     * @var array
     */
    protected static $defaultModelClasses = [
        'Users'       => UsersTable::class,
        'Roles'       => RolesTable::class,
        'Permissions' => PermissionsTable::class,
    ];

    /**
     * Gets the role model
     *
     * @return Table
     */
    public static function getRoleModel()
    {
        return static::getModel('Roles');
    }

    /**
     * Gets the model instance
     *
     * @param $name
     *
     * @return Table
     */
    public static function getModel($name)
    {
        return TableRegistry::get("_Permission{$name}", [
            'className' => static::getModelClass($name),
        ]);
    }

    /**
     * Gets the default model class
     *
     * @param string $name
     *
     * @return string
     */
    public static function getModelClass($name)
    {
        return Configure::read("Permission.tableClassMap.{$name}") ?: static::$defaultModelClasses[$name];
    }

    /**
     * Gets the permission model
     *
     * @return Table
     */
    public static function getPermissionModel()
    {
        return static::getModel('Permissions');
    }

    /**
     * Gets the user model
     *
     * @return Table
     */
    public static function getUserModel()
    {
        return static::getModel('Users');
    }
}
