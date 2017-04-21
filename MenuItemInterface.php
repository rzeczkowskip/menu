<?php
namespace Rzeka\Menu;

use Rzeka\Menu\Exception\InvalidChildTypeException;

interface MenuItemInterface
{
    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @param string $title
     */
    public function setTitle(string $title);

    /**
     * @return null|string
     */
    public function getLink(): ?string;

    /**
     * @param null|string $link
     */
    public function setLink(?string $link);

    /**
     * @return bool
     */
    public function isActive(): bool;

    /**
     * @param bool $active
     */
    public function setActive(bool $active);

    /**
     * @return MenuItem[]
     */
    public function getChildren(): array;

    /**
     * @param MenuItem[] $children
     *
     * @throws InvalidChildTypeException
     */
    public function setChildren(array $children);

    /**
     * @param MenuItemInterface $item
     *
     * @throws InvalidChildTypeException
     */
    public function addChild(MenuItemInterface $item);

    /**
     * @return array
     */
    public function getAttributes(): array;

    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes);

    /**
     * @param string $attribute
     * @param mixed $value
     */
    public function setAttribute(string $attribute, $value);
}
