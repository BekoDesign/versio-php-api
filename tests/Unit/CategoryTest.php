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
        $response = $this->getClient()
            ->categories()
            ->list();

        $this->assertSame(200, $response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @test
     * @return void
     */
    public function test_categories_create_has_success_response()
    {
        $response = $this->getClient()
            ->categories()
            ->create([
                'name' => 'TestCategoryName'
            ]);
        $this->assertSame(201, $response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @test
     * @return void
     */
    public function test_categories_delete_has_success_response()
    {
        $response = $this->getClient()
            ->categories()
            ->delete(1);

        $content = $response->getBody()->getContents();

        $this->assertSame(400, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|Category does not exists',
            json_decode($content)
                ->error->message, $content);
    }

}
