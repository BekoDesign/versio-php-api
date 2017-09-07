<?php

namespace Tests\Unit;

use Tests\BaseTest;

class ResellerPlanTest extends BaseTest
{
    /**
     * @test
     * @return void
     */
    public function test_resellerPlans_list_has_success_response()
    {
        $response =$this->getClient()
            ->resellerPlans()
            ->list();

        $this->assertSame(200, $response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @test
     * @return void
     */
    public function test_resellerPlans_get_has_success_response()
    {
        $response = $this->getClient()
            ->resellerPlans()
            ->get('1');

        $content = $response->getBody()->getContents();

        $this->assertSame(200, $response->getStatusCode(), $content);
    }

}
