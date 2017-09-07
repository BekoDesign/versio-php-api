<?php

namespace BekoDesign\versioAPI\Models;

use BekoDesign\versioAPI\Contracts\IGetable;
use BekoDesign\versioAPI\Contracts\IResellerPlan;
use BekoDesign\versioAPI\Contracts\IListable;
use BekoDesign\versioAPI\Traits\Getable;
use BekoDesign\versioAPI\Traits\Listable;

class ResellerPlan implements IResellerPlan, IListable, IGetable
{
    use Listable, Getable;

    protected $endpoint = 'resellerhostingplans';

    /**
     * Category constructor.
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

}