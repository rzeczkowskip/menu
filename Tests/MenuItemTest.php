<?php
namespace Rzeka\Menu\Tests;

use PHPUnit\Framework\TestCase;
use Rzeka\Menu\Exception\InvalidChildTypeException;
use Rzeka\Menu\MenuItem;
use Rzeka\Menu\MenuItemInterface;

class MenuItemTest extends TestCase
{
    public function testIsInstanceOfMenuItemInterface()
    {
        $menu = new MenuItem('');

        $this->assertInstanceOf(MenuItemInterface::class, $menu);
    }

    public function testConstructorTitle()
    {
        $title = 'test';

        $menu = new MenuItem($title);

        $this->assertEquals($title, $menu->getTitle());
    }

    public function testSetChildren()
    {
        $children = [
            new MenuItem(''),
            new MenuItem('')
        ];

        $menu = new MenuItem('');
        $menu->setChildren($children);

        $this->assertEquals($children, $menu->getChildren());
    }

    public function testInvalidChildType()
    {
        $menu = new MenuItem('');

        $this->expectException(InvalidChildTypeException::class);
        $menu->setChildren([
            new InvalidMenuType()
        ]);
    }

    public function testGettersAndSetters()
    {
        $menu = new MenuItem('');

        $link = 'test';
        $menu->setLink($link);
        $this->assertEquals($link, $menu->getLink());

        $menu->setActive(true);
        $this->assertTrue($menu->isActive());

        $attributes = [
            'attribute' => 'test'
        ];
        $menu->setAttributes($attributes);
        $this->assertEquals($attributes, $menu->getAttributes());
    }

    public function testSetAttribute()
    {
        $menu = new MenuItem('');

        $attribute = 'attribute';
        $value = 'value';

        $menu->setAttribute($attribute, $value);

        $this->assertArrayHasKey($attribute, $menu->getAttributes());
        $this->assertEquals($value, $menu->getAttributes()[$attribute]);
    }

    public function testAddChild()
    {
        $menu = new MenuItem('');
        $child = new MenuItem('');

        $menu->addChild($child);
        $this->assertTrue(in_array($child, $menu->getChildren(), true));
    }

}
