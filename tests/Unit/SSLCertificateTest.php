<?php

namespace Tests\Unit;

use Tests\BaseTest;

class SSLCertificateTest extends BaseTest
{
    /**
     * @test
     * @return void
     */
    public function test_sslCertificates_list_has_success_response()
    {
        $response =$this->getClient()
            ->sslCertificates()
            ->list();

        $this->assertSame(200, $response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @test
     * @return void
     */
    public function test_sslCertificates_create_has_success_response()
    {
        $response = $this->getClient()
            ->sslCertificates()
            ->create(json_decode(
                '{
                  "csr"          : "-----BEGIN CERTIFICATE REQUEST-----....",
                  "approver_emai": "john@domain.com",
                  "product_id"   : 5,
                  "years"        : 2,
                  "contactperson"        : "John Doe",
                  "contactperson_email"   : "john@email.com",
                  "contactperson_phone"   : "0632334455",
                  "address"   : "Streetname 5",
                  "postalcode"   : "1111AA",
                  "auto_renew"   : true,
                  "san_names"           : [{"san.com","san2.com"}]
                }'
            ));
        $content = $response->getBody()->getContents();

        $this->assertSame(400, $response->getStatusCode(), $content);
        $this->assertSame('ParameterInvalid|Invalid csr parameter',
            json_decode($content)
                ->error->message, $content);
    }

    /**
     * @test
     * @return void
     */
    public function test_sslCertificates_get_has_success_response()
    {
        $response = $this->getClient()
            ->sslCertificates()
            ->get(1);

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|SSL certificate not found',
            json_decode($content)
                ->error->message, $content);
    }

    /**
     * @test
     * @return void
     */
    public function test_sslCertificates_renew_has_success_response()
    {
        $response = $this->getClient()
            ->sslCertificates()
            ->renew(1, json_decode(
                '{
                     "csr"          : "-----BEGIN CERTIFICATE REQUEST-----....",
                     "approver_emai": "john@domain.com",
                     "address"   : "Streetname 5",
                     "postalcode"   : "1111AA",
                   }'
            ));

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|SSL certificate not found',
            json_decode($content)
                ->error->message, $content);

    }

    /**
     * @test
     * @return void
     */
    public function test_webhosting_changeApprover_has_success_response()
    {
        $response = $this->getClient()
            ->sslCertificates()
            ->update(1, json_decode(
                '{
                 "approver_emai": "john@domain.com",
               }'
            ));

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|SSL certificate not found',
            json_decode($content)
                ->error->message, $content);
    }
}
