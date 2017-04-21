<?php
namespace Rzeka\Menu;

use Rzeka\Menu\Exception\InvalidChildTypeException;

class MenuItem implements MenuItemInterface
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string|null
     */
    private $link;

    /**
     * @var bool
     */
    private $active;

    /**
     * @var MenuItem[]
     */
    private $children;

    /**
     * @var array
     */
    private $attributes;

    /**
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->setTitle($title);
        $this->setActive(false);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return null|string
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param null|string $link
     */
    public function setLink(?string $link)
    {
        $this->link = $link;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return (bool) $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
    }

    /**
     * @return MenuItem[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @param MenuItem[] $children
     *
     * @throws InvalidChildTypeException
     */
    public function setChildren(array $children)
    {
        if (count(array_filter($children, function($v) {
            return !$v instanceof MenuItemInterface;
        })) > 0) {
            throw new InvalidChildTypeException('Child items has to implement ' . MenuItemInterface::class);
        }

        $this->children = $children;
    }

    /**
     * @param MenuItemInterface $child
     */
    public function addChild(MenuItemInterface $child)
    {
        $this->children[] = $child;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     */
    public function setAttribute(string $attribute, $value)
    {
        $this->attributes[$attribute] = $value;
    }
}
