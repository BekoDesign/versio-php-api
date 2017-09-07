<?php

namespace BekoDesign\versioAPI\Traits;

use BekoDesign\versioAPI\Contracts\IClient;
use GuzzleHttp\Psr7\Request;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

trait Resendable
{
    /**
     * @var IClient
     */
    protected $client;

    public function resend($id, $data = [], $urlPostfix = ''): ResponseInterface
    {
        return $this->client
            ->sendRequest(
                $this->resendRequest($id, $data, $urlPostfix)
            );
    }

    public function resendAsync($id, $data = [], $urlPostfix = ''): Promise
    {
        return $this->client
            ->sendRequestAsync(
                $this->resendRequest($id, $data, $urlPostfix)
            );
    }

    /**
     * @apram int $id
     * @param array $data
     * @param string $urlPostfix
     * @return RequestInterface
     */
    public function resendRequest($id, $data = [], $urlPostfix = '') : RequestInterface
    {
        $request = new Request('POST', $this->endpoint . '/' . $id . '/resendvalidation' . $urlPostfix);
        $request = $request->withBody(\GuzzleHttp\Psr7\stream_for(\GuzzleHttp\json_encode($data)));

        return $request;
    }
}