<?php

namespace BekoDesign\versioAPI\Contracts;


use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface ICancelable
{
    public function cancel($id, $data = [], $urlPostfix = '') : ResponseInterface;

    public function cancelAsync($id, $data = [], $urlPostfix = '') : Promise;

    public function cancelRequest($id, $data = [], $urlPostfix = '') : RequestInterface;

}