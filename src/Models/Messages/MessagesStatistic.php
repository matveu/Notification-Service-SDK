<?php

namespace matviichuk\NsSdk\Models\Messages;

use matviichuk\NsSdk\Models\CollectionTrait;
use matviichuk\NsSdk\Models\Model;
use Iterator;

/**
 * Class MessagesStatistic
 *
 * @package matviichuk\NsSdk\Models\Messages
 */
class MessagesStatistic extends Model implements Iterator
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
                    $items[] = new MessageStatistic($item);
                }

                return $items;
            },
        ];
    }
}
