<?php

namespace matviichuk\NsSdk\Hydrators;

use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\ModelInterface;

/**
 * Interface HydratorInterface
 *
 * @package matviichuk\NsSdk\Hydrators
 */
interface HydratorInterface
{
    /**
     * @param string            $modelClass
     * @param ResponseInterface $response
     *
     * @return ModelInterface
     */
    public function hydrate(string $modelClass, ResponseInterface $response) : ModelInterface;
}
