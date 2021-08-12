<?php

namespace Dou\NovaPoshtaApi\tests;

use Dou\NovaPoshtaApi\Requests\Address\CityRequest;
use Dou\NovaPoshtaApi\Service\NovaPoshtaAPI;
use Exception;
use Illuminate\Support\Arr;
use Tests\TestCase;

class CityRequestTest extends TestCase
{
    /**
     * test search city by name
     *
     * @throws Exception
     */
    public function testSearchCityByName()
    {
        $name = 'Днепр';
        $request = new CityRequest();
        $request->setCityName($name);
        $this->assertSame(Arr::get($request->getRequestData(), 'methodProperties.FindByString'), $name);

        $api = new NovaPoshtaAPI();
        $api->setRequest($request);
        $api->get();

        $this->assertSame($api->response->isSuccess(), true);
        $this->assertTrue($api->response->count() > 0);
        $this->assertArrayHasKey('Ref', $api->response->first());
    }

    /**
     * test search city by ref
     *
     * @throws Exception
     */
    public function testSearchCityByRef()
    {
        $ref = 'ebc0eda9-93ec-11e3-b441-0050568002cf';
        $request = new CityRequest();
        $request->setCityRef($ref);
        $this->assertSame(Arr::get($request->getRequestData(), 'methodProperties.Ref'), $ref);

        $api = new NovaPoshtaAPI();
        $api->setRequest($request);
        $api->get();

        $this->assertSame($api->response->isSuccess(), true);
        $this->assertTrue($api->response->count() > 0);
        $this->assertArrayHasKey('Ref', $api->response->first());
    }
}