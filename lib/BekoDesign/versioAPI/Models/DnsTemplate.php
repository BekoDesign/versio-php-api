<?php

namespace BekoDesign\versioAPI\Models;

use BekoDesign\versioAPI\Contracts\IContact;
use BekoDesign\versioAPI\Contracts\ICreatable;
use BekoDesign\versioAPI\Contracts\IGetable;
use BekoDesign\versioAPI\Contracts\IListable;
use BekoDesign\versioAPI\Contracts\IUpdateable;
use BekoDesign\versioAPI\Traits\Creatable;
use BekoDesign\versioAPI\Traits\Deleteable;
use BekoDesign\versioAPI\Traits\Getable;
use BekoDesign\versioAPI\Traits\Listable;
use BekoDesign\versioAPI\Traits\Updateable;

class DnsTemplate implements IContact, IListable, ICreatable, IGetable, IUpdateable
{
    use Listable, Creatable, Deleteable, Getable, Updateable;

    protected $endpoint = 'dnstemplates';

    /**
     * Category constructor.
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }
}