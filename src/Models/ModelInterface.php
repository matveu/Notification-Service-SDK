<?php

namespace matviichuk\NsSdk\Models;

/**
 * Interface ModelInterface
 *
 * @package matviichuk\NsSdk\Models
 */
interface ModelInterface
{
    /**
     * @param array $data
     */
    public function setAttributes(array $data) : void;
}
