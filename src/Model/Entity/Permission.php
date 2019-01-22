<?php
/**
 * CakePHP permission handling library
 *
 * @author Tao <taosikai@yeah.net>
 */

namespace JeffersonSimaoGoncalves\CakePermission\Model\Entity;

use Cake\ORM\Entity;

/**
 * Class Permission
 *
 * Date: 22/01/2019 00:26
 *
 * Project: cakephp-permission
 *
 * @author Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\CakePermission\Model\Entity
 */
class Permission
    extends Entity
    implements PermissionInterface
{
    use PermissionTrait;

    /**
     * The map of fields that can be saved
     *
     * @var array
     */
    protected $_accessible = [
        'id' => false,
        '*'  => true,
    ];

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->get('name');
    }
}
