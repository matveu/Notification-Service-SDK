<?php

namespace matviichuk\NsSdk\Models\Providers;

use matviichuk\NsSdk\Models\CollectionTrait;
use matviichuk\NsSdk\Models\Model;
use Iterator;

/**
 * Class Providers
 *
 * @package matviichuk\NsSdk\Models\Providers
 */
class Providers extends Model implements Iterator
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
                    $items[] = new Provider($item);
                }

                return $items;
            },
        ];
    }
}
