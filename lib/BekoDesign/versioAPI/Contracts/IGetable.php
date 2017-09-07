<?php

namespace BekoDesign\versioAPI\Contracts;


use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface IGetable
{
    public function get($id, $data = [], $urlPostfix = '') : ResponseInterface;

    public function getAsync($id, $data = [], $urlPostfix = '') : Promise;

    public function getRequest($id, $data = [], $urlPostfix = '') : RequestInterface;
}