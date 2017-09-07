<?php

namespace BekoDesign\versioAPI\Contracts;


use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface ICreatable
{
    public function create($data = [], $urlPostfix = '') : ResponseInterface;

    public function createAsync($data = [], $urlPostfix = '') : Promise;

    public function createRequest($data = [], $urlPostfix = '') : RequestInterface;
}