<?php
/**
 * CakePHP permission handling library
 *
 * @author Tao <taosikai@yeah.net>
 */

namespace JeffersonSimaoGoncalves\CakePermission\Model\Table;

use Cake\Core\Configure;
use Cake\ORM\Table;

/**
 * Class RolesTable
 *
 * Date: 22/01/2019 00:27
 *
 * Project: cakephp-permission
 *
 * @author Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\CakePermission\Model\Table
 */
class RolesTable
    extends Table
{
    use RolesTableTrait;

    /**
     * @param array $config
     *
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable(Configure::read('Permission.tableNameMap.roles') ?: 'roles');
        $this->buildPermissionRelationship();
    }
}
