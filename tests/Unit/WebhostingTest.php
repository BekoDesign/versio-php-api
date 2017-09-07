<?php

namespace Tests\Unit;

use Tests\BaseTest;

class ResellerTest extends BaseTest
{
    /**
     * @test
     * @return void
     */
    public function test_reseller_list_has_success_response()
    {
        $response =$this->getClient()
            ->webhosting()
            ->list();

        $this->assertSame(200, $response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @test
     * @return void
     */
    public function test_webhosting_create_has_success_response()
    {
        $response = $this->getClient()
            ->webhosting()
            ->create(json_decode(
                '{
                   "name"   : "John",
                   "email"  : "john@myemail.com",
                   "plan_id": 2,
                   "term" : 3,
                   "auto_renew": true
                }'
            ));
        $content = $response->getBody()->getContents();

        $this->assertSame(201, $response->getStatusCode(), $content);
    }

    /**
     * @test
     * @return void
     */
    public function test_webhosting_delete_has_success_response()
    {
        $response = $this->getClient()
            ->webhosting()
            ->delete('testuser');

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|Webhosting not found',
            json_decode($content)
                ->error->message, $content);
    }

    /**
     * @test
     * @return void
     */
    public function test_webhosting_get_has_success_response()
    {
        $response = $this->getClient()
            ->webhosting()
            ->get('testuser');

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|Webhosting not found',
            json_decode($content)
                ->error->message, $content);
    }

    /**
     * @test
     * @return void
     */
    public function test_webhosting_renew_has_success_response()
    {
        $response = $this->getClient()
            ->webhosting()
            ->renew('testuser', [
                'term' => '3'
            ]);

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|Webhosting not found',
            json_decode($content)
                ->error->message, $content);

    }
    /**
     * @test
     * @return void
     */
    public function test_webhosting_update_has_success_response()
    {
        $response = $this->getClient()
            ->webhosting()
            ->update('testuser', json_decode(
                '{
                   "ssl_management": false,
                   "auto_renew": true,
                   "reset_login" : true,
                }'
            ));

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|Webhosting not found',
            json_decode($content)
                ->error->message, $content);
    }
}
