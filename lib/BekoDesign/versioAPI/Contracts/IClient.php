<?php

namespace BekoDesign\versioAPI\Contracts;


use Http\Promise\Promise;
use Psr\Http\Message\ResponseInterface;

interface IClient
{

    public function sendRequest($request) : ResponseInterface;
    public function sendRequestAsync($request) : Promise;

}