<?php

namespace BekoDesign\versioAPI\Traits;

use BekoDesign\versioAPI\Contracts\IClient;
use GuzzleHttp\Psr7\Request;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

trait Creatable
{
    /**
     * @var IClient
     */
    protected $client;

    public function create($data = [], $urlPostfix = ''): ResponseInterface
    {
        return $this->client
            ->sendRequest(
                $this->createRequest($data, $urlPostfix)
            );
    }

    public function createAsync($data = [], $urlPostfix = ''): Promise
    {
        return $this->client
            ->sendRequestAsync(
                $this->createRequest($data, $urlPostfix)
            );
    }

    /**
     * @param array $data
     * @param string $urlPostfix
     * @return RequestInterface
     */
    public function createRequest($data = [], $urlPostfix = '') : RequestInterface
    {
        $request = new Request('POST', $this->getCreateUrl($data, $urlPostfix));
        $request = $request->withBody(\GuzzleHttp\Psr7\stream_for(\GuzzleHttp\json_encode($data)));

        return $request;
    }

    /**
     * @param array $data
     * @param string $urlPostfix
     * @return string
     */
    public function getCreateUrl($data = [], $urlPostfix = '') : string {
        return $this->endpoint . $urlPostfix;
    }
}