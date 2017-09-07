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
        $this->assertSame(200,
            $this->getClient()
                ->categories()
                ->list()
                ->getStatusCode()
        );
    }

    /**
     * @test
     * @return void
     */
    public function test_categories_create_has_success_response()
    {
        $client = $this->getClient();
        $this->assertSame(201, $this->createCategory('TestCategoryName')->getStatusCode());
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

        $this->assertSame(400, $response->getStatusCode());
        $this->assertSame('ObjectDoesNotExist|Category does not exists',
            json_decode($response->getBody()->getContents())
                ->error->message);
    }

    private function createCategory($name) {
        return $this->getClient()
            ->categories()
            ->create([
                'name' => $name
            ]);
    }
}
