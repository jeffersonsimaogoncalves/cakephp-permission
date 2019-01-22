<?php
namespace JeffersonSimaoGoncalves\CakePermission\Tests\Model\Table;

use Cake\ORM\Association\BelongsToMany;
use JeffersonSimaoGoncalves\CakePermission\TableFactory;
use JeffersonSimaoGoncalves\CakePermission\Tests\TestCase;
use Cake\Core\Configure;

class UsersTableTest extends TestCase
{
    public function testRelationship()
    {
        $users = TableFactory::getModel('Users');
        $this->assertInstanceOf(BelongsToMany::class, $users->association('Roles'));
    }

    public function testInitialize()
    {
        $users = TableFactory::getModel('Users');
        $this->assertEquals(Configure::read('Permission.tableNameMap.users') ?: 'users', $users->getTable());
    }
}
