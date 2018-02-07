<?php

namespace matviichuk\NsSdk\Hydrators;

use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Exceptions\HydrationException;
use matviichuk\NsSdk\Models\ModelInterface;

/**
 * Class ModelHydrator
 *
 * @package matviichuk\NsSdk\Hydrators
 */
class ModelHydrator implements HydratorInterface
{
    /**
     * @inheritdoc
     * @throws HydrationException
     */
    public function hydrate(string $modelClass, ResponseInterface $response) : ModelInterface
    {
        if (!class_exists($modelClass)) {
            throw new HydrationException('Unable to load class: ' . $modelClass);
        }

        $body = $response->getBody()->getContents();
        $data = [];
        if ($body) {
            $data = json_decode($body, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new HydrationException(sprintf('Error %d when trying to json_decode response', json_last_error()));
            }
        }

        $data     = $data['data'] ?? null;
        $instance = new $modelClass($data);

        return $instance;
    }
}
