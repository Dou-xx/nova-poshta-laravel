<?php

namespace Dou\NovaPoshtaApi\Requests\Address;

use Dou\NovaPoshtaApi\Requests\Request;

class CityRequest extends Request
{
    /**
     * @var array|string[]
     */
    protected $requestStructure = [
        'modelName'    => 'Address',
        'calledMethod' => 'getCities',
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
        $this->set('methodProperties', ['FindByString' => $name]);

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
        $this->set('methodProperties', ['Ref' => $ref]);

        return $this;
    }
}
