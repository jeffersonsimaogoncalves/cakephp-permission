<?php
/**
 * CakePHP permission handling library
 *
 * @author Tao <taosikai@yeah.net>
 */

namespace JeffersonSimaoGoncalves\CakePermission\Model\Table;

use Cake\Core\Configure;
use JeffersonSimaoGoncalves\CakePermission\TableFactory;

/**
 * Trait UsersTableTrait
 *
 * Date: 22/01/2019 00:28
 *
 * Project: cakephp-permission
 *
 * @author Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\CakePermission\Model\Table
 */
trait UsersTableTrait
{
    /**
     * @return void
     */
    public function buildPermissionRelationship()
    {
        $this->belongsToMany('Roles', [
            'className'        => TableFactory::getModelClass('Roles'),
            'foreignKey'       => 'user_id',
            'targetForeignKey' => 'role_id',
            'joinTable'        => Configure::read('Permission.tableNameMap.users_roles') ?: 'users_roles',
            'saveStrategy'     => 'append',
        ]);
    }
}
