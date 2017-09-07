<?php

namespace Tests\Unit;

use Tests\BaseTest;

class CategoryTest extends BaseTest
{
    /**
     * @test
     * @return void
     */
    public function test_categories_list_has_success_response()
    {
        $client = $this->getClient();
        $this->assertSame(200, $client->categories()->list()->getStatusCode());
    }

}
