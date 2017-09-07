<?php

namespace BekoDesign\versioAPI\Models;

use BekoDesign\versioAPI\Contracts\IGetable;
use BekoDesign\versioAPI\Contracts\IResellerPlan;
use BekoDesign\versioAPI\Contracts\IListable;
use BekoDesign\versioAPI\Traits\Getable;
use BekoDesign\versioAPI\Traits\Listable;

class WebhostingPlan implements IResellerPlan, IListable, IGetable
{
    use Listable, Getable;

    protected $endpoint = 'webhostingplans';

    /**
     * Category constructor.
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

}