<?php
/**
 * CakePHP permission handling library
 *
 * @author Tao <taosikai@yeah.net>
 */

namespace JeffersonSimaoGoncalves\CakePermission\Model\Entity;

use Cake\ORM\Entity;

/**
 * Class User
 *
 * Date: 22/01/2019 00:27
 *
 * Project: cakephp-permission
 *
 * @author Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\CakePermission\Model\Entity
 */
class User
    extends Entity
{
    use UserTrait;

    /**
     * The map of fields that can be saved
     *
     * @var array
     */
    protected $_accessible = [
        'id' => false,
        '*'  => true,
    ];
}
