<?php

namespace matviichuk\NsSdk\Models;

/**
 * Trait CollectionTrait
 *
 * @package matviichuk\NsSdk\Models
 */
trait CollectionTrait
{
    /**
     * @var array
     */
    protected $items;

    /**
     * @param Model $item
     */
    public function addItem(Model $item)
    {
        $this->items[] = $item;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Reset collection.
     */
    public function rewind()
    {
        return reset($this->items);
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->items);
    }

    /**
     * @return int|null|string
     */
    public function key()
    {
        return key($this->items);
    }

    /**
     * @return mixed
     */
    public function next()
    {
        return next($this->items);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return key($this->items) !== null;
    }
}
