<?php

namespace matviichuk\NsSdk\Models\Campaigns;

use matviichuk\NsSdk\Models\CollectionTrait;
use matviichuk\NsSdk\Models\Model;
use Iterator;

/**
 * Class Campaigns
 *
 * @package matviichuk\NsSdk\Models\Campaigns
 */
class Campaigns extends Model implements Iterator
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
                    $items[] = new Campaign($item);
                }

                return $items;
            },
        ];
    }
}
