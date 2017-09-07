<?php

namespace BekoDesign\versioAPI\Models;

use BekoDesign\versioAPI\Contracts\IGetable;
use BekoDesign\versioAPI\Contracts\IListable;
use BekoDesign\versioAPI\Contracts\ISSLProduct;
use BekoDesign\versioAPI\Traits\Getable;
use BekoDesign\versioAPI\Traits\Listable;

class SSLProduct implements ISSLProduct, IListable, IGetable
{
    use Listable, Getable;

    protected $endpoint = 'sslproducts';

    /**
     * Category constructor.
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }


}