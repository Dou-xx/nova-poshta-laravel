<?php

namespace Dou\NovaPoshtaApi\Tests;

use Dou\NovaPoshtaApi\Requests\Address\WarehousesRequest;
use Dou\NovaPoshtaApi\Service\NovaPoshtaAPI;
use Exception;
use Illuminate\Support\Arr;
use Tests\TestCase;

class WarehousesRequestTest extends TestCase
{
    /**
     * test search Warehouses by city name
     *
     * @throws Exception
     */
    public function testSearchCityByName()
    {
        $name = 'Киев';
        $request = new WarehousesRequest();
        $request->setCityName($name);
        $this->assertSame(Arr::get($request->getRequestData(), 'methodProperties.CityName'), $name);

        $api = new NovaPoshtaAPI();
        $api->setRequest($request);
        $api->get();

        $this->assertSame($api->response->isSuccess(), true);
        $this->assertTrue($api->response->count() > 0);
        $this->assertArrayHasKey('Ref', $api->response->first());
    }

    /**
     * test search Warehouses city by city-ref
     *
     * @throws Exception
     */
    public function testSearchCityByRef()
    {
        $cityRef = 'ebc0eda9-93ec-11e3-b441-0050568002cf';
        $request = new WarehousesRequest();
        $request->setCityRef($cityRef);
        $this->assertSame(Arr::get($request->getRequestData(), 'methodProperties.CityRef'), $cityRef);

        $api = new NovaPoshtaAPI();
        $api->setRequest($request);
        $api->get();

        $this->assertSame($api->response->isSuccess(), true);
        $this->assertTrue($api->response->count() > 0);
        $this->assertArrayHasKey('Ref', $api->response->first());
        $this->assertSame($cityRef, $api->response->first('CityRef'));
    }
}
