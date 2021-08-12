<?php

namespace Dou\NovaPoshtaApi\Requests;

use Dou\NovaPoshtaApi\Contract\RequestContract;
use Illuminate\Support\Arr;

abstract class Request implements RequestContract
{
    /**
     * @var array
     */
    protected $requestStructure;

    /**
     * Get structure
     *
     * @return array
     */
    public function getRequestData(): array
    {
        return $this->requestStructure;
    }

    /**
     * Set request structure
     *
     * @param string $key
     * @param null   $value
     *
     * @return $this
     */
    protected function set(string $key, $value = null): self
    {
        Arr::set($this->requestStructure, $key, $value);

        return $this;
    }


}