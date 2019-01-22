<?php
/**
 * CakePHP permission handling library
 *
 * @author Tao <taosikai@yeah.net>
 */

namespace JeffersonSimaoGoncalves\CakePermission\Model\Table;

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Validation\Validator;
use JeffersonSimaoGoncalves\CakePermission\Constants;
use JeffersonSimaoGoncalves\CakePermission\TableFactory;

/**
 * Trait RolesTableTrait
 *
 * Date: 22/01/2019 00:28
 *
 * Project: cakephp-permission
 *
 * @author Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\CakePermission\Model\Table
 */
trait RolesTableTrait
{
    /**
     * Refreshes the cache
     *
     * @param int $userId
     */
    public static function refreshCache($userId)
    {
        Cache::delete(sprintf(Constants::CACHE_ROLES, $userId));
    }

    /**
     * @return void
     */
    public function buildPermissionRelationship()
    {
        $this->belongsToMany('Permissions', [
            'className'        => TableFactory::getModelClass('Permissions'),
            'foreignKey'       => 'role_id',
            'targetForeignKey' => 'permission_id',
            'joinTable'        => Configure::read('Permission.tableNameMap.roles_permissions') ?: 'roles_permissions',
            'saveStrategy'     => 'append',
        ]);
        $this->belongsToMany('Users', [
            'className'        => TableFactory::getModelClass('Users'),
            'foreignKey'       => 'role_id',
            'targetForeignKey' => 'user_id',
            'joinTable'        => Configure::read('Permission.tableNameMap.users_roles') ?: 'users_roles',
            'saveStrategy'     => 'append',
        ]);
        $this->addBehavior('Timestamp');
    }

    /**
     * @param Validator $validator
     *
     * @return Validator
     */
    public function validationPermission(Validator $validator)
    {
        $validator->add('name', 'unique', [
            'rule'     => 'validateUnique',
            'message'  => 'The role already exists',
            'provider' => 'table',
        ]);

        return $validator;
    }
}
