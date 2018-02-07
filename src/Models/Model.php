<?php

namespace matviichuk\NsSdk\Models;

/**
 * Class Model
 *
 * @package matviichuk\NsSdk\Models
 */
abstract class Model implements ModelInterface
{
    /**
     * Model constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = null)
    {
        if ($data) {
            $this->setAttributes($data);
        }
    }

    /**
     * Return attributes map. Fields from API request
     */
    abstract protected function getAttributeMap() : array;

    /**
     * @inheritdoc
     */
    public function setAttributes(array $data) : void
    {
        foreach ($this->getAttributeMap() as $key => $value) {
            $preparedKey = $this->toCamelCase($key);
            if (property_exists($this, $preparedKey) && is_callable($value)) {
                $this->{$preparedKey} = call_user_func($value, $data);
            } else {
                $preparedValue = $this->toCamelCase($value);
                if (property_exists($this, $preparedValue)
                    && isset($data[$value])
                ) {
                    $this->{$preparedValue} = $data[$value];
                }
            }
        }
    }

    /**
     * Convert snake_case to camelCase.
     *
     * @param $value
     *
     * @return string
     */
    protected function toCamelCase($value) : string
    {
        return lcfirst(str_replace('_', '', ucwords($value, '_')));
    }
}
