<?php

namespace matviichuk\NsSdk\Resources;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Exceptions\HttpClient\BadRequestHttpException;
use matviichuk\NsSdk\Exceptions\HttpClient\NotFountHttpException;
use matviichuk\NsSdk\Exceptions\HttpClient\ServerHttpException;
use matviichuk\NsSdk\Exceptions\HttpClient\UnauthenticatedHttpException;
use matviichuk\NsSdk\Exceptions\HttpClient\UnknownErrorHttpException;
use matviichuk\NsSdk\Hydrators\HydratorInterface;
use matviichuk\NsSdk\Hydrators\ModelHydrator;
use matviichuk\NsSdk\Requests\RequestInterface;
use Exception;

/**
 * Class Resource
 *
 * @package matviichuk\NsSdk\Resources
 */
abstract class Resource implements ResourceInterface
{
    /**
     * @var string
     */
    protected $resourcePath;

    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    /**
     * @inheritdoc
     */
    public function execute(RequestInterface $request, ClientInterface $httpClient)
    {
        if ($this->beforeExecute() === false) {
            return null;
        }

        $response = $request->execute($httpClient, $this->getResourcePath());

        if (!in_array($response->getStatusCode(), [200, 201, 204])) {
            $this->handleErrors($response);
        }

        $responseClass = $request->getResponseClass();

        return $responseClass ? $this->getHydrator()
                                     ->hydrate($responseClass, $response) : $response;
    }

    /**
     * @return HydratorInterface|ModelHydrator
     */
    public function getHydrator() : HydratorInterface
    {
        if (!$this->hydrator) {
            $this->hydrator = new ModelHydrator();
        }

        return $this->hydrator;
    }

    /**
     * @param HydratorInterface $hydrator
     */
    public function setHydrator(HydratorInterface $hydrator) : void
    {
        $this->hydrator = $hydrator;
    }

    /**
     * @return string
     */
    public function getResourcePath() : string
    {
        return $this->resourcePath;
    }

    /**
     * @return bool
     */
    public function beforeExecute() : bool
    {
        return true;
    }

    /**
     * Throw the correct exception for this error.
     *
     * @param ResponseInterface $response
     *
     * @throws Exception
     */
    protected function handleErrors(ResponseInterface $response) : void
    {
        $statusCode = $response->getStatusCode();

        switch ($statusCode) {
            case 400:
            case 422:
                throw new BadRequestHttpException($response);
            case 401:
                throw new UnauthenticatedHttpException($response);
            case 404:
                throw new NotFountHttpException($response);
            case 500 <= $statusCode:
                throw new ServerHttpException($response);
            default:
                throw new UnknownErrorHttpException($response);
        }
    }
}
