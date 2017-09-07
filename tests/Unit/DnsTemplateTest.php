<?php

namespace Tests\Unit;

use Tests\BaseTest;

class DnsTemplateTest extends BaseTest
{
    /**
     * @test
     * @return void
     */
    public function test_dnsTemplates_list_has_success_response()
    {
        $response =$this->getClient()
            ->dnsTemplates()
            ->list();

        $this->assertSame(200, $response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @test
     * @return void
     */
    public function test_dnsTemplates_create_has_success_response()
    {
        $response = $this->getClient()
            ->dnsTemplates()
            ->create(json_decode(
                '{
                "name"   : "DNS template server"
                }'
            ));
        $this->assertSame(201, $response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @test
     * @return void
     */
    public function test_dnsTemplates_delete_has_success_response()
    {
        $response = $this->getClient()
            ->dnsTemplates()
            ->delete(1);

        $content = $response->getBody()->getContents();

        $this->assertSame(400, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|DNS template does not exists',
            json_decode($content)
                ->error->message, $content);
    }
    /**
     * @test
     * @return void
     */
    public function test_dnsTemplates_get_has_success_response()
    {
        $response = $this->getClient()
            ->dnsTemplates()
            ->get(1);

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|DNS template not found',
            json_decode($content)
                ->error->message, $content);
    }
    /**
     * @test
     * @return void
     */
    public function test_dnsTemplates_update_has_success_response()
    {
        $response = $this->getClient()
            ->dnsTemplates()
            ->update(1, json_decode(
                '{
                  "name": "New name DNS template",
                  "dns_records"  :  [
                   {
                     "type": "MX",
                     "value": "mail.%",
                     "prio": "20",
                     "ttl": "3600"
                    },
                    {
                     "type": "TXT",
                     "name": "example.com",
                     "value": "\"v=spf1 a mx ip4:127.0.0.1 a:spf.spamexperts.axc.nl ~all\"",
                     "prio": "0",
                     "ttl": "3600"
                   }
                  ],
                  "dns_redirections" : [
                  {
                   "from": "redirect.%",
                   "destination": "http://www.google.nl"
                  }
                 ]
                }'
            ));

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|DNS template not found',
            json_decode($content)
                ->error->message, $content);
    }
}
