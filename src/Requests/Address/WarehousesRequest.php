<?php

namespace Dou\NovaPoshtaApi\Requests\Address;

use Dou\NovaPoshtaApi\Requests\Request;

class WarehousesRequest extends Request
{
    /**
     * @var array|string[]
     */
    protected $requestStructure = [
        'modelName'    => 'Address',
        'calledMethod' => 'getWarehouses',
    ];

    /**
     * Set city name
     *
     * @param string $name
     *
     * @return $this
     */
    public function setCityName(string $name): self
    {
        $this->set('methodProperties', ['CityName' => $name]);

        return $this;
    }

    /**
     * Set city Ref
     *
     * @param string $ref
     *
     * @return $this
     */
    public function setCityRef(string $ref): self
    {
        $this->set('methodProperties', ['CityRef' => $ref]);

        return $this;
    }
}
