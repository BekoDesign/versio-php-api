<?php

namespace BekoDesign\versioAPI\Models;

use BekoDesign\versioAPI\Contracts\IContact;
use BekoDesign\versioAPI\Contracts\ICreatable;
use BekoDesign\versioAPI\Contracts\IListable;
use BekoDesign\versioAPI\Contracts\IResendable;
use BekoDesign\versioAPI\Traits\Creatable;
use BekoDesign\versioAPI\Traits\Deleteable;
use BekoDesign\versioAPI\Traits\Listable;
use BekoDesign\versioAPI\Traits\Resendable;

class Contact implements IContact, IListable, ICreatable, IResendable
{
    use Listable, Creatable, Deleteable, Resendable;

    protected $endpoint = 'contacts';

    /**
     * Category constructor.
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }
}