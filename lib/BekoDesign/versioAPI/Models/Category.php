<?php

namespace BekoDesign\versioAPI\Models;


use BekoDesign\versioAPI\Contracts\ICategory;
use BekoDesign\versioAPI\Contracts\IListable;
use BekoDesign\versioAPI\Traits\Listable;

class Category implements IListable, ICategory
{
    use Listable;

    public $name;

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