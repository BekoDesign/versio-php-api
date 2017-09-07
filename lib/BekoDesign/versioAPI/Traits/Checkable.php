<?php

namespace BekoDesign\versioAPI\Traits;

use BekoDesign\versioAPI\Contracts\IClient;
use GuzzleHttp\Psr7\Request;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

trait Checkable
{
    /**
     * @var IClient
     */
    protected $client;

    public function check($key, $data = [], $urlPostfix = ''): ResponseInterface
    {
        return $this->client
            ->sendRequest(
                $this->checkRequest($key, $data, $urlPostfix)
            );
    }

    public function checkAsync($key, $data = [], $urlPostfix = ''): Promise
    {
        return $this->client
            ->sendRequestAsync(
                $this->checkRequest($key, $data, $urlPostfix)
            );
    }

    /**
     * @apram string $key
     * @param array $data
     * @param string $urlPostfix
     * @return RequestInterface
     */
    public function checkRequest($key, $data = [], $urlPostfix = '') : RequestInterface
    {
        $request = new Request('GET', $this->endpoint . '/' . $key . '/availability' . $urlPostfix);
        $request = $request->withBody(\GuzzleHttp\Psr7\stream_for(\GuzzleHttp\json_encode($data)));

        return $request;
    }
}