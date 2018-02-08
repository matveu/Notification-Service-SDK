<?php

namespace matviichuk\NsSdk\Models\Customers;

use matviichuk\NsSdk\Models\CollectionTrait;
use matviichuk\NsSdk\Models\Model;
use Iterator;

/**
 * Class Customers
 *
 * @package matviichuk\NsSdk\Models\Customers
 */
class Customers extends Model implements Iterator
{
    use CollectionTrait;

    /**
     * @inheritdoc
     */
    protected function getAttributeMap() : array
    {
        return [
            'items' => function (array $data) {
                $items = [];

                foreach ($data as $item) {
                    $items[] = new Customer($item);
                }

                return $items;
            },
        ];
    }
}
