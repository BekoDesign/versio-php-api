<?php
namespace BekoDesign\versioAPI\Contracts;


use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface IDeleteable
{
    public function delete($id, $data = [], $urlPostfix = '') : ResponseInterface;

    public function deleteAsync($id, $data = [], $urlPostfix = '') : Promise;

    public function deleteRequest($id, $data = [], $urlPostfix = '') : RequestInterface;
}