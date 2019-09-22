<?php

namespace Tests\Feature\Api\v1;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssetsTest extends TestCase
{
    use RefreshDatabase;

    public function testAssetIndex()
    {
        $response = $this->get('/api/v1/asset');
        $response->assertOk();
    }

    public function testAssetSearchCategoryValid()
    {
        $response = $this->get('/api/v1/asset/?category_id=0');
        $response->assertOk();
    }

    public function testAssetSearchCategoryInvalid()
    {
        $response = $this->get('/api/v1/asset/?category_id=-1');
        $response->assertStatus(422);

        $response = $this->get('/api/v1/asset/?category_id=1234');
        $response->assertStatus(422);
    }

    public function testAssetShow()
    {
        $response = $this->get('/api/v1/asset/1');
        $response->assertOk();
    }
}
