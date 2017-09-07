<?php

namespace BekoDesign\versioAPI\Contracts;


use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface ITransferable
{
    public function transfer($key, $data = [], $urlPostfix = '') : ResponseInterface;

    public function transferAsync($key, $data = [], $urlPostfix = '') : Promise;

    public function transferRequest($key, $data = [], $urlPostfix = '') : RequestInterface;

    public function transferNominet($key, $data = [], $urlPostfix = '') : ResponseInterface;

    public function transferNominetAsync($key, $data = [], $urlPostfix = '') : Promise;

    public function transferNominetRequest($key, $data = [], $urlPostfix = '') : RequestInterface;


}