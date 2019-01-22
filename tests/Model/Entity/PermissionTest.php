<?php
namespace JeffersonSimaoGoncalves\CakePermission\Tests\Model\Entity;

use Cake\Datasource\Exception\RecordNotFoundException;
use JeffersonSimaoGoncalves\CakePermission\Exception\InvalidArgumentException;
use JeffersonSimaoGoncalves\CakePermission\Model\Entity\Permission;
use JeffersonSimaoGoncalves\CakePermission\Tests\TestCase;

class PermissionTest extends TestCase
{
    public function testCreate()
    {
        $permission = Permission::create('foo');
        $this->assertInstanceOf(Permission::class, $permission);
        $this->assertGreaterThan(0, $permission->id);
    }

    /**
     * @depends testCreate
     */
    public function testRepeatCreate()
    {
        $this->expectException(InvalidArgumentException::class);
        Permission::create('foo');
    }

    /**
     * @depends testCreate
     */
    public function testFind()
    {
        $permission = Permission::find('foo');
        $this->assertEquals('foo', $permission->name);
        $this->expectException(RecordNotFoundException::class);
        Permission::find('not-exists-permission');
    }

    public function testFindOrCreate()
    {
        $permission = Permission::findOrCreate('not-exists-permission');
        $this->assertEquals('not-exists-permission', $permission->name);
    }
}
