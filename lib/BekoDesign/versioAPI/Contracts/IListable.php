<?php

namespace BekoDesign\versioAPI\Contracts;


use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface IListable
{
    public function list($data = [], $urlPostfix = '') : ResponseInterface;

    public function listAsync($data = [], $urlPostfix = '') : Promise;

    public function listRequest($data = [], $urlPostfix = '') : RequestInterface;
}