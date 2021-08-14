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
     * @param array|null $selectedFields
     *
     * @return Collection
     */
    public function getData(array $selectedFields = null): Collection
    {
        if($selectedFields) {
            return $this->data->map(function ($item) use ($selectedFields) {
                return collect($item)
                    ->only($selectedFields)
                    ->all();
            });
        }

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
    public function first(string $fieldName = null)
    {
        $firstElement = $this->getData()->first();

        if ($fieldName) {
            return Arr::get($firstElement, $fieldName);
        }

        return $firstElement;
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