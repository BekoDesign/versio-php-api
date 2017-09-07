<?php

namespace Tests\Unit;

use Tests\BaseTest;

class DomainsTest extends BaseTest
{
    /**
     * @test
     * @return void
     */
    public function test_domains_list_has_success_response()
    {
        $response =$this->getClient()
            ->domains()
            ->list();

        $this->assertSame(200, $response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @test
     * @return void
     */
    public function test_domains_create_has_success_response()
    {
        $response = $this->getClient()
            ->domains()
            ->create([
                'domain' => 'domain.com',
                'contact_id' => '4711',
                'years' => '1',
                'auto_renew' => 'true',
                'ns' => [
                    [ 'ns' => 'ns1.domain.com', 'nsip' => '' ],
                    [ 'ns' => 'ns2.domain.com', 'nsip' => '' ]
                ]
            ]);
        $content = $response->getBody()->getContents();

        $this->assertSame(400, $response->getStatusCode(), $content);
        $this->assertSame('ObjectInvalid|Invalid contact_id parameter',
            json_decode($content)
                ->error->message, $content);
    }

    /**
     * @test
     * @return void
     */
    public function test_domains_delete_has_success_response()
    {
        $response = $this->getClient()
            ->domains()
            ->delete('domain.com');

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|Domain not found',
            json_decode($content)
                ->error->message, $content);
    }

    /**
     * @test
     * @return void
     */
    public function test_domains_get_has_success_response()
    {
        $response = $this->getClient()
            ->domains()
            ->get(1);

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|Domain not found',
            json_decode($content)
                ->error->message, $content);
    }

    /**
     * @test
     * @return void
     */
    public function test_domains_check_has_success_response()
    {
        $response = $this->getClient()
            ->domains()
            ->check('domain.com');

        $content = $response->getBody()->getContents();

        $this->assertSame(200, $response->getStatusCode(), $content);
    }

    /**
     * @test
     * @return void
     */
    public function test_domains_renew_has_success_response()
    {
        $response = $this->getClient()
            ->domains()
            ->renew('domain.com');

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|Domain not found',
            json_decode($content)
                ->error->message, $content);

    }

    /**
     * @test
     * @return void
     */
    public function test_domains_transfer_has_success_response()
    {
        $response = $this->getClient()
            ->domains()
            ->transfer('domain.com', json_decode(
                '{
                  "contact_id": 4711,
                  "years"        : 1,
                  "auto_renew"   : true
                }'
            ));

        $content = $response->getBody()->getContents();

        $this->assertSame(400, $response->getStatusCode(), $content);
        $this->assertSame('ParameterInvalid|Invalid auth_code parameter',
            json_decode($content)
                ->error->message, $content);

    }

    /**
     * @test
     * @return void
     */
    public function test_domains_transfer_nominet_has_success_response()
    {
        $response = $this->getClient()
            ->domains()
            ->transferNominet('domain.com', json_decode(
                '{
                   "tag": "AXC-NL"
                }'
            ));

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|Domain not found',
            json_decode($content)
                ->error->message, $content);

    }

    /**
     * @test
     * @return void
     */
    public function test_domains_transfer_status_has_success_response()
    {
        $response = $this->getClient()
            ->domains()
            ->transferStatus('domain.com', 1);

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('InvalidParameters|Process_id parameter invalid',
            json_decode($content)
                ->error->message, $content);

    }

    /**
     * @test
     * @return void
     */
    public function test_domains_update_has_success_response()
    {
        $response = $this->getClient()
            ->domains()
            ->update('domain.com', json_decode(
                '{
                  "registrant_id": 4711,
                  "category_id"  : 10434,
                  "auto_renew"   : true,
                  "lock"         : true,
                  "ns"           : [{ns="ns1.domain.com", nsip=""},{ns="ns2.domain.com", nsip=""}],
                  "dns_records"  :  [
                      {
                            "type": "MX",
                            "name": "example.com",
                            "value": "fallback.axc.eu",
                            "prio": "20",
                            "ttl": "3600"
                            },
                            {
                            "type": "TXT",
                            "name": "example.com",
                            "value": "\"v=spf1 a mx ip4:127.0.0.1 a:spf.spamexperts.axc.nl ~all\"",
                            "prio": "0",
                            "ttl": "3600"
                            }],
                  "dnssec_keys": [
                      {
                       "keytag": 25164,
                       "flags": 256,
                       "algorithm": 3,
                       "public_key": "AwEAAZKsuPDwO1+Usao2X1rgdFhdT3LAxy5cbRNFNEy1qsauwSIYov5SU4GlG6ylXIVQwHF5AWfbD7lcZzw1IlNegvaLnoirJjcYZhz4ppQU5+M/1hfH7aNZIsyz7AhHwX7gpOeUdGBXTiXQ3m7ksGccVQ79h7yl2fiBDCryBSf49vOTqo3dI7KZM48vmeqOxPth3ANMXzt6osHENGIchdGgIOVy5Y7AsVecL4V+lbn2t47fFfJ2O9PwuuDBzO0HCCT/mmYVsvZ33kgc7QPFKB3LojoXdHFHl1jCsC98phIVGzJR54H2xRohQvfC2WAXFEx+YNDW1yv7zQFrUVVMFwCe/E8="
                      },
                      {
                       "keytag": 25164,
                       "flags": 257,
                       "algorithm": 8,
                       "public_key": "AwEAAZKsuPDwO1+Usao2X1rgdFhdT3LAxy5cbRNFNEy1qsauwSIYov5SU4GlG6ylXIVQwHF5AWfbD7lcZzw1IlNegvaLnoirJjcYZhz4ppQU5+M/1hfH7aNZIsyz7AhHwX7gpOeUdGBXTiXQ3m7ksGccVQ79h7yl2fiBDCryBSf49vOTqo3dI7KZM48vmeqOxPth3ANMXzt6osHENGIchdGgIOVy5Y7AsVecL4V+lbn2t47fFfJ2O9PwuuDBzO0HCCT/mmYVsvZ33kgc7QPFKB3LojoXdHFHl1jCsC98phIVGzJR54H2xRohQvfC2WAXFEx+YNDW1yv7zQFrUVVMFwCe/E8="
                      },
                 ]}'
            ));

        $content = $response->getBody()->getContents();

        $this->assertSame(400, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|Domain not found',
            json_decode($content)
                ->error->message, $content);
    }
}
