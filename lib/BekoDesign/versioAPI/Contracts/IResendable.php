<?php

namespace BekoDesign\versioAPI\Contracts;


use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface IResendable
{
    public function resend($id, $data = [], $urlPostfix = '') : ResponseInterface;

    public function resendAsync($id, $data = [], $urlPostfix = '') : Promise;

    public function resendRequest($id, $data = [], $urlPostfix = '') : RequestInterface;
}