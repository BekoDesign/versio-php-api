<?php

namespace BekoDesign\versioAPI\Contracts;


use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface ICheckable
{
    public function check($key, $data = [], $urlPostfix = '') : ResponseInterface;

    public function checkAsync($key, $data = [], $urlPostfix = '') : Promise;

    public function checkRequest($key, $data = [], $urlPostfix = '') : RequestInterface;
}