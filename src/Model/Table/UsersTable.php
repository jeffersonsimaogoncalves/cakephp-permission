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
 * Class UsersTable
 *
 * Date: 22/01/2019 00:28
 *
 * Project: cakephp-permission
 *
 * @author Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\CakePermission\Model\Table
 */
class UsersTable
    extends Table
{
    use UsersTableTrait;

    /**
     * @param array $config
     *
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable(Configure::read('Permission.tableNameMap.users') ?: 'users');
        $this->buildPermissionRelationship();
    }
}
