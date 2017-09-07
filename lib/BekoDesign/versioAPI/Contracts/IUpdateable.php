<?php

namespace BekoDesign\versioAPI\Contracts;


use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface IUpdateable
{
    public function update($id, $data = [], $urlPostfix = '') : ResponseInterface;

    public function updateAsync($id, $data = [], $urlPostfix = '') : Promise;

    public function updateRequest($id, $data = [], $urlPostfix = '') : RequestInterface;
}