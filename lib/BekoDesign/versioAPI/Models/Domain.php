<?php

namespace BekoDesign\versioAPI\Models;

use BekoDesign\versioAPI\Contracts\ICheckable;
use BekoDesign\versioAPI\Contracts\ICreatable;
use BekoDesign\versioAPI\Contracts\IDomains;
use BekoDesign\versioAPI\Contracts\IGetable;
use BekoDesign\versioAPI\Contracts\ITransferable;
use BekoDesign\versioAPI\Contracts\IListable;
use BekoDesign\versioAPI\Contracts\IRenewable;
use BekoDesign\versioAPI\Contracts\IUpdateable;
use BekoDesign\versioAPI\Traits\Checkable;
use BekoDesign\versioAPI\Traits\Creatable;
use BekoDesign\versioAPI\Traits\Deleteable;
use BekoDesign\versioAPI\Traits\Getable;
use BekoDesign\versioAPI\Traits\Listable;
use BekoDesign\versioAPI\Traits\Renewable;
use BekoDesign\versioAPI\Traits\Transferable;
use BekoDesign\versioAPI\Traits\Updateable;

class Domain implements IDomains, IListable, ICreatable, IGetable, IUpdateable, ICheckable, IRenewable, ITransferable
{
    use Listable, Creatable, Deleteable,  Getable, Updateable, Checkable, Renewable, Transferable;

    protected $endpoint = 'domains';

    /**
     * Category constructor.
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getCreateUrl($data = [], $urlPostfix = '') : string {
        return $this->endpoint .'/' . $data['domain'] . $urlPostfix;
    }

}