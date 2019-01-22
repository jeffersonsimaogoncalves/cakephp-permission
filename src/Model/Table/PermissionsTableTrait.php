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
 * Trait PermissionsTableTrait
 *
 * Date: 22/01/2019 00:27
 *
 * Project: cakephp-permission
 *
 * @author Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\CakePermission\Model\Table
 */
trait PermissionsTableTrait
{
    /**
     * Refreshes the cache
     *
     * @param int $roleId
     */
    public static function refreshCache($roleId)
    {
        Cache::delete(sprintf(Constants::CACHE_PERMISSIONS, $roleId));
    }

    /**
     * @return void
     */
    public function buildPermissionRelationship()
    {
        $this->belongsToMany('Roles', [
            'className'        => TableFactory::getModelClass('Roles'),
            'foreignKey'       => 'permission_id',
            'targetForeignKey' => 'role_id',
            'joinTable'        => Configure::read('Permission.tableNameMap.roles_permissions') ?: 'roles_permissions',
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
            'message'  => 'The permission already exists',
            'provider' => 'table',
        ]);

        return $validator;
    }
}
