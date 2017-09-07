<?php

namespace BekoDesign\versioAPI\Models;

use BekoDesign\versioAPI\Contracts\ICreatable;
use BekoDesign\versioAPI\Contracts\IGetable;
use BekoDesign\versioAPI\Contracts\IReseller;
use BekoDesign\versioAPI\Contracts\IListable;
use BekoDesign\versioAPI\Contracts\IRenewable;
use BekoDesign\versioAPI\Contracts\IUpdateable;
use BekoDesign\versioAPI\Contracts\IWebhosting;
use BekoDesign\versioAPI\Traits\Creatable;
use BekoDesign\versioAPI\Traits\Deleteable;
use BekoDesign\versioAPI\Traits\Getable;
use BekoDesign\versioAPI\Traits\Listable;
use BekoDesign\versioAPI\Traits\Renewable;
use BekoDesign\versioAPI\Traits\Updateable;

class Webhosting implements IWebhosting, IListable, ICreatable, IGetable, IUpdateable, IRenewable
{
    use Listable, Creatable, Deleteable,  Getable, Updateable, Renewable;

    protected $endpoint = 'webhosting';

    /**
     * Category constructor.
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

}