<?php

namespace BekoDesign\versioAPI\Models;

use BekoDesign\versioAPI\Contracts\ICancelable;
use BekoDesign\versioAPI\Contracts\ICreatable;
use BekoDesign\versioAPI\Contracts\IGetable;
use BekoDesign\versioAPI\Contracts\IListable;
use BekoDesign\versioAPI\Contracts\IRenewable;
use BekoDesign\versioAPI\Contracts\ISSLCertificate;
use BekoDesign\versioAPI\Contracts\IUpdateable;
use BekoDesign\versioAPI\Traits\Cancelable;
use BekoDesign\versioAPI\Traits\Creatable;
use BekoDesign\versioAPI\Traits\Getable;
use BekoDesign\versioAPI\Traits\Listable;
use BekoDesign\versioAPI\Traits\Renewable;
use BekoDesign\versioAPI\Traits\Updateable;

class SSLCertificate implements ISSLCertificate, IListable, ICreatable, IGetable, IRenewable, ICancelable, IUpdateable
{
    use Listable, Creatable, Getable, Renewable, Cancelable, Updateable;

    protected $endpoint = 'sslcertificates';

    /**
     * Category constructor.
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getRenewUrl($key, $data = [], $urlPostfix = '') : string {
        return $this->endpoint . '/' . $key . '/reissue' . $urlPostfix;
    }

    public function getUpdateUrl($key, $data = [], $urlPostfix = '') : string {
        return $this->endpoint . '/' . $key . '/changeapprover' . $urlPostfix;
    }


}