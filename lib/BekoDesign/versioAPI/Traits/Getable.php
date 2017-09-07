<?php

namespace BekoDesign\versioAPI\Traits;

use BekoDesign\versioAPI\Contracts\IClient;
use GuzzleHttp\Psr7\Request;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

trait Getable
{
    /**
     * @var IClient
     */
    protected $client;

    public function get($id, $data = [], $urlPostfix = ''): ResponseInterface
    {
        return $this->client
            ->sendRequest(
                $this->getRequest($id, $data, $urlPostfix)
            );
    }

    public function getAsync($id, $data = [], $urlPostfix = ''): Promise
    {
        return $this->client
            ->sendRequestAsync(
                $this->getRequest($id, $data, $urlPostfix)
            );
    }

    /**
     * @apram int $id
     * @param array $data
     * @param string $urlPostfix
     * @return RequestInterface
     */
    public function getRequest($id, $data = [], $urlPostfix = '') : RequestInterface
    {
        $request = new Request('GET', $this->endpoint . '/' . $id. $urlPostfix);
        $request = $request->withBody(\GuzzleHttp\Psr7\stream_for(\GuzzleHttp\json_encode($data)));

        return $request;
    }
}