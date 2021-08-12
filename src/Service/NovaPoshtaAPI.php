<?php

namespace Dou\NovaPoshtaApi\Service;

use Dou\NovaPoshtaApi\Contract\RequestContract;
use Dou\NovaPoshtaApi\Response\Response;
use Exception;

class NovaPoshtaAPI
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var RequestContract
     */
    private $request;

    /**
     * @var Response
     */
    public $response;

    /**
     * @param string|null $apiKey
     */
    public function __construct(string $apiKey = null)
    {
        if ($apiKey) {
            $this->apiKey = $apiKey;
        }

        return $this;
    }

    /**
     * Set api key
     *
     * @param string $apiKey
     *
     * @return $this
     */
    public function setApiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Set request.
     *
     * @param RequestContract $request
     *
     * @return $this
     */
    public function setRequest(RequestContract $request): self
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Request to API NP.
     *
     * @return Response
     * @throws Exception
     */
    public function get(): Response
    {
        $requestData = $this->request->getRequestData();
        $requestData['apiKey'] = $this->apiKey;
        $request = json_encode($requestData);
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL            => 'https://api.novaposhta.ua/v2.0/json/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => $request,
            CURLOPT_HTTPHEADER     => ['content-type: application/json'],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            throw new Exception(['success' => false]);
        }

        $this->response = (new Response())->setResponse(
            json_decode($response, true)
        );

        return $this->response;
    }
}