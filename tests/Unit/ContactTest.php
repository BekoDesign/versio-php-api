<?php

namespace Tests\Unit;

use Tests\BaseTest;

class ContactTest extends BaseTest
{
    /**
     * @test
     * @return void
     */
    public function test_contacts_list_has_success_response()
    {
        $response =$this->getClient()
            ->contacts()
            ->list();

        $this->assertSame(200, $response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @test
     * @return void
     */
    public function test_contacts_create_has_success_response()
    {
        $response = $this->getClient()
            ->contacts()
            ->create([
                'firstname' => 'FirstName',
                'surname' => 'SurName',
                'email' => 'email@domain.nl',
                'phone' => '0123456789',
                'street' => 'Streename',
                'number' => '12',
                'zipcode' => '1234AB',
                'city' => 'City',
                'country' => 'NL',
                'properties' => [
                    'idNumber' => 'BF38432',
                    'taxIdNumber' => '3458372'
                ]
            ]);
        $this->assertSame(201, $response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @test
     * @return void
     */
    public function test_contacts_delete_has_success_response()
    {
        $response = $this->getClient()
            ->contacts()
            ->delete(1);

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|Contact not found',
            json_decode($content)
                ->error->message, $content);
    }
    /**
     * @test
     * @return void
     */
    public function test_contacts_resend_has_success_response()
    {
        $response = $this->getClient()
            ->contacts()
            ->resend(1);

        $content = $response->getBody()->getContents();

        $this->assertSame(401, $response->getStatusCode(), $content);
        $this->assertSame('ObjectDoesNotExist|Contact not found',
            json_decode($content)
                ->error->message, $content);
    }
}
