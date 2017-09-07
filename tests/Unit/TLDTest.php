<?php

namespace Tests\Unit;

use Tests\BaseTest;

class TLDTest extends BaseTest
{
    /**
     * @test
     * @return void
     */
    public function test_tld_list_has_success_response()
    {
        $response =$this->getClient()
            ->tld()
            ->list();

        $this->assertSame(200, $response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @test
     * @return void
     */
    public function test_tld_get_has_success_response()
    {
        $response = $this->getClient()
            ->tld()
            ->get('com');

        $content = $response->getBody()->getContents();

        $this->assertSame(200, $response->getStatusCode(), $content);
    }
}
