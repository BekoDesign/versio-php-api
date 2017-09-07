<?php

namespace Tests;

use BekoDesign\versioAPI\Client;

abstract class BaseTest extends \PHPUnit_Framework_TestCase
{
    const ENV_HOST = 'VERSIO_HOST';
    const ENV_USERNAME = 'VERSIO_USERNAME';
    const ENV_PASSWORD = 'VERSIO_PASSWORD';

    /**
     * @var Client
     */
    protected $client = null;

    /**
     * BaseTest constructor.
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        if(file_exists(__DIR__ . '/../.env')) {
            $dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
            $dotenv->load();
        }
    }


    /**
     * @return Client
     */
    protected function getClient() : Client {
        if(!$this->client) {
            $this->client = new Client(
                getenv(BaseTest::ENV_USERNAME),
                getenv(BaseTest::ENV_PASSWORD),
                Client::VERSIO_URL_TEST,
                ($host = getenv(BaseTest::ENV_HOST)) ? $host : Client::VERSIO_HOST
            );
        }

        return $this->client;
    }
}