<?php

namespace Dou\NovaPoshtaApi\Response;

use ArrayAccess;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class Response
{
    /**
     * @var array
     */
    private $response;

    /**
     * @var Collection
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
        $this->data = collect(Arr::get($response, 'data'));
        $this->success = Arr::get($response, 'success');

        return $this;
    }

    /**
     * @return Collection
     */
    public function getData(): Collection
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
        return $this->getData()->first();
    }

    /**
     * Get first element
     *
     * @return array|ArrayAccess|mixed
     */
    public function count(): int
    {
        return $this->getData()->count();
    }
}