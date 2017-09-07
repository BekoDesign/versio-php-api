<?php

namespace Tests\Unit;

use Tests\BaseTest;

class WebhostingPlanTest extends BaseTest
{
    /**
     * @test
     * @return void
     */
    public function test_webhostingPlans_list_has_success_response()
    {
        $response =$this->getClient()
            ->webhostingPlans()
            ->list();

        $this->assertSame(200, $response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @test
     * @return void
     */
    public function test_webhostingPlans_get_has_success_response()
    {
        $response = $this->getClient()
            ->webhostingPlans()
            ->get('1');

        $content = $response->getBody()->getContents();

        $this->assertSame(200, $response->getStatusCode(), $content);
    }

}
