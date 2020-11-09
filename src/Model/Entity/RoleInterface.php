<?php
/**
 * CakePHP permission handling library
 *
 * @author Tao <taosikai@yeah.net>
 */

namespace JeffersonSimaoGoncalves\CakePermission\Model\Entity;
/**
 * Interface RoleInterface
 *
 * Date: 22/01/2019 00:26
 *
 * Project: cakephp-permission
 *
 * @author Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\CakePermission\Model\Entity
 */
interface RoleInterface
{
    /**
     * Finds the role by its name
     *
     * @param string $name
     *
     * @return RoleTrait
     */
    public static function find($name);

    /**
     * Gets the role name
     *
     * @return string
     */
    public function getName();

    /**
     * Gives the permission or an array of permissions
     *
     * @param string|Permission|array $permission
     *
     * @return bool
     */
    public function givePermission($permission);

    /**
     * Revokes the permissions of the role
     *
     * @param $permission
     *
     * @return \JeffersonSimaoGoncalves\CakePermission\Model\Entity\RoleInterface
     */
    public function revokePermission($permission);

    /**
     * Revokes all permissions of the role
     *
     * @return boolean
     */
    public function revokeAllPermissions();

    /**
     * Gets all permissions for the role
     *
     * @return Permission[]
     */
    public function getAllPermissions();
}
