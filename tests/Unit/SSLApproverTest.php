<?php

namespace Tests\Unit;

use Tests\BaseTest;

class SSLApproverTest extends BaseTest
{
    /**
     * @test
     * @return void
     */
    public function test_sslProducts_list_has_success_response()
    {
        $response = $this->getClient()
            ->sslApprovers()
            ->list(['domain' => 'domain.com']);

        $this->assertSame(200, $response->getStatusCode(), $response->getBody()->getContents());
    }
}
