<?php

namespace BekoDesign\versioAPI\Models;

use BekoDesign\versioAPI\Contracts\IListable;
use BekoDesign\versioAPI\Contracts\ISSLApprover;
use BekoDesign\versioAPI\Traits\Listable;

class SSLApprover implements ISSLApprover, IListable
{
    use Listable;

    protected $endpoint = 'sslapprovers';

    /**
     * Category constructor.
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @param array $data
     * @param string $urlPostfix
     * @return string
     */
    public function getListUrl($data = [], $urlPostfix = '') : string {
        return $this->endpoint . '/' . $data['domain'] . $urlPostfix;
    }

}