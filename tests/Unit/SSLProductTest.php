<?php

namespace Tests\Unit;

use Tests\BaseTest;

class SSLProductTest extends BaseTest
{
    /**
     * @test
     * @return void
     */
    public function test_sslProducts_list_has_success_response()
    {
        $response =$this->getClient()
            ->sslProducts()
            ->list();

        $this->assertSame(200, $response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @test
     * @return void
     */
    public function test_sslProducts_get_has_success_response()
    {
        $response = $this->getClient()
            ->sslProducts()
            ->get('9');

        $content = $response->getBody()->getContents();

        $this->assertSame(200, $response->getStatusCode(), $content);
    }
}
