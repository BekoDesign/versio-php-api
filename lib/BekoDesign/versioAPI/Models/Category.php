<?php

namespace BekoDesign\versioAPI\Models;

use BekoDesign\versioAPI\Contracts\ICategory;
use BekoDesign\versioAPI\Contracts\ICreatable;
use BekoDesign\versioAPI\Contracts\IListable;
use BekoDesign\versioAPI\Traits\Creatable;
use BekoDesign\versioAPI\Traits\Deleteable;
use BekoDesign\versioAPI\Traits\Listable;

class Category implements IListable, ICreatable, ICategory
{
    use Listable, Creatable, Deleteable;

    protected $endpoint = 'categories';

    /**
     * Category constructor.
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }
}