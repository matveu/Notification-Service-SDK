<?php

namespace matviichuk\NsSdk\Models\Messages;

use matviichuk\NsSdk\Models\CollectionTrait;
use matviichuk\NsSdk\Models\Model;
use Iterator;

/**
 * Class Messages
 *
 * @package matviichuk\NsSdk\Models\Campaigns
 */
class Messages extends Model implements Iterator
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
                    $items[] = new Message($item);
                }

                return $items;
            },
        ];
    }
}
