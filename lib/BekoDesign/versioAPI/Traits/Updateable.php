<?php

namespace BekoDesign\versioAPI\Traits;

use BekoDesign\versioAPI\Contracts\IClient;
use GuzzleHttp\Psr7\Request;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

trait Updateable
{
    /**
     * @var IClient
     */
    protected $client;

    public function update($id, $data = [], $urlPostfix = ''): ResponseInterface
    {
        return $this->client
            ->sendRequest(
                $this->updateRequest($id, $data, $urlPostfix)
            );
    }

    public function updateAsync($id, $data = [], $urlPostfix = ''): Promise
    {
        return $this->client
            ->sendRequestAsync(
                $this->updateRequest($id, $data, $urlPostfix)
            );
    }

    /**
     * @apram int $id
     * @param array $data
     * @param string $urlPostfix
     * @return RequestInterface
     */
    public function updateRequest($id, $data = [], $urlPostfix = '') : RequestInterface
    {
        $request = new Request('POST', $this->getUpdateUrl($id, $data, $urlPostfix));
        $request = $request->withBody(\GuzzleHttp\Psr7\stream_for(\GuzzleHttp\json_encode($data)));

        return $request;
    }

    public function getUpdateUrl($key, $data = [], $urlPostfix = '') : string {
        return $this->endpoint . '/' . $key . '/update' . $urlPostfix;
    }
}