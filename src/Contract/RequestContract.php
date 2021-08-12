<?php

namespace Dou\NovaPoshtaApi\Contract;

interface RequestContract
{
    /**
     * Get request data
     *
     * @return array
     */
    public function getRequestData(): array;
}