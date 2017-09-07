<?php

namespace BekoDesign\versioAPI\Traits;

use BekoDesign\versioAPI\Contracts\IClient;
use GuzzleHttp\Psr7\Request;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

trait Deleteable
{
    /**
     * @var IClient
     */
    protected $client;

    public function delete($id, $data = [], $urlPostfix = ''): ResponseInterface
    {
        return $this->client
            ->sendRequest(
                $this->deleteRequest($id, $data, $urlPostfix)
            );
    }

    public function deleteAsync($id, $data = [], $urlPostfix = ''): Promise
    {
        return $this->client
            ->sendRequestAsync(
                $this->deleteRequest($id, $data, $urlPostfix)
            );
    }

    /**
     * @apram int|string $id
     * @param array $data
     * @param string $urlPostfix
     * @return RequestInterface
     */
    public function deleteRequest($id, $data = [], $urlPostfix = '') : RequestInterface
    {
        $request = new Request('DELETE', $this->endpoint . '/' . $id. $urlPostfix);
        $request = $request->withBody(\GuzzleHttp\Psr7\stream_for(\GuzzleHttp\json_encode($data)));

        return $request;
    }
}