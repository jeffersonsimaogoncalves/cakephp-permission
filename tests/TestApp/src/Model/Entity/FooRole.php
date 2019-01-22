<?php
namespace TestApp\Model\Entity;

use JeffersonSimaoGoncalves\CakePermission\Model\Entity\Role;

class FooRole extends Role
{

    /**
     * The map of fields that can be saved
     * @var array
     */
    protected $_accessible = [
        'id' => false,
        '*' => true
    ];
}
