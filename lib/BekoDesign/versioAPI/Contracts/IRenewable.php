<?php

namespace BekoDesign\versioAPI\Contracts;


use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface IRenewable
{
    public function renew($key, $data = [], $urlPostfix = '') : ResponseInterface;

    public function renewAsync($key, $data = [], $urlPostfix = '') : Promise;

    public function renewRequest($key, $data = [], $urlPostfix = '') : RequestInterface;
}