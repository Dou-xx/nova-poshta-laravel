<?php

namespace Dou\NovaPoshtaApi\Response;

use ArrayAccess;
use Illuminate\Support\Arr;

class Response
{
    /**
     * @var array
     */
    private $response;

    /**
     * @var array
     */
    private $data;

    /**
     * @var bool
     */
    private $success;

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->response;
    }

    /**
     * @param array $response
     *
     * @return Response
     */
    public function setResponse(array $response): self
    {
        $this->response = $response;
        $this->data = Arr::get($response, 'data');
        $this->success = Arr::get($response, 'success');

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * Get first element
     *
     * @return array|ArrayAccess|mixed
     */
    public function first()
    {
        return Arr::get($this->getData(), 0);
    }

    /**
     * Get first element
     *
     * @return array|ArrayAccess|mixed
     */
    public function count(): int
    {
        return is_array($this->getData()) ? count($this->getData()) : 0;
    }
}