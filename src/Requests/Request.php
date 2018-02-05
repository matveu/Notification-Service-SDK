<?php

namespace matviichuk\NsSdk\Requests;

/**
 * Class Request
 *
 * @package matviichuk\NsSdk\Requests
 */
abstract class Request implements RequestInterface
{
    /**
     * @var string
     */
    protected $responseClass;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var array
     */
    protected $requestFields = [];

    /**
     * @var array
     */
    protected $queryFields = [];

    /**
     * @return string|null
     */
    public function getPath() : ?string
    {
        return $this->path;
    }

    /**
     * @param $path
     */
    public function setPath($path) : void
    {
        $this->path = $path;
    }

    /**
     * @param $url
     *
     * @return string
     */
    public function prepareUrl($url) : string
    {
        return $url . $this->getPath();
    }

    /**
     * @return string|null
     */
    public function getResponseClass() : ?string
    {
        return $this->responseClass;
    }

    /**
     * @return array
     */
    public function getParams() : array
    {
        return array_filter(array_intersect_key(get_object_vars($this), array_flip($this->requestFields)), function ($value) {
            return $value !== null;
        });
    }

    /**
     * @return array
     */
    public function getQueryParams() : array
    {
        return array_filter(array_intersect_key(get_object_vars($this), array_flip($this->queryFields)), function ($value) {
            return $value !== null;
        });
    }

    /**
     * Convert camelCase to snake_case.
     *
     * @param array $params
     *
     * @return array
     */
    protected function normalize(array $params) : array
    {
        $result = [];

        foreach ($params as $key => $value) {
            $key          = strtolower(preg_replace([
                '/([a-z\d])([A-Z])/',
                '/([^_])([A-Z][a-z])/',
            ], '$1_$2', $key));
            $result[$key] = $value;
        }

        return $result;
    }
}
