<?php
/**
 * CakePHP permission handling library
 *
 * @author Tao <taosikai@yeah.net>
 */

namespace JeffersonSimaoGoncalves\CakePermission\Model\Entity;
/**
 * Interface PermissionInterface
 *
 * Date: 22/01/2019 00:26
 *
 * Project: cakephp-permission
 *
 * @author Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\CakePermission\Model\Entity
 */
interface PermissionInterface
{
    /**
     * Gets the permission name
     * return string
     */
    public function getName();
}
