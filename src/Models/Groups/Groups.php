<?php

namespace matviichuk\NsSdk\Models\Groups;

use matviichuk\NsSdk\Models\CollectionTrait;
use matviichuk\NsSdk\Models\Model;
use Iterator;

/**
 * Class Campaigns
 *
 * @package matviichuk\NsSdk\Models\Groups
 */
class Groups extends Model implements Iterator
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
                    $items[] = new Group($item);
                }

                return $items;
            },
        ];
    }
}
