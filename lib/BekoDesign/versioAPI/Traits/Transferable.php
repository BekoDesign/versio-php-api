<?php

namespace BekoDesign\versioAPI\Traits;

use BekoDesign\versioAPI\Contracts\IClient;
use GuzzleHttp\Psr7\Request;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

trait Transferable
{
    /**
     * @var IClient
     */
    protected $client;

    public function transfer($id, $data = [], $urlPostfix = ''): ResponseInterface
    {
        return $this->client
            ->sendRequest(
                $this->transferRequest($id, $data, $urlPostfix)
            );
    }

    public function transferAsync($id, $data = [], $urlPostfix = ''): Promise
    {
        return $this->client
            ->sendRequestAsync(
                $this->transferRequest($id, $data, $urlPostfix)
            );
    }

    /**
     * @apram int $id
     * @param array $data
     * @param string $urlPostfix
     * @return RequestInterface
     */
    public function transferRequest($id, $data = [], $urlPostfix = '') : RequestInterface
    {
        $request = new Request('POST', $this->endpoint . '/' . $id . '/transfer' . $urlPostfix);
        $request = $request->withBody(\GuzzleHttp\Psr7\stream_for(\GuzzleHttp\json_encode($data)));

        return $request;
    }

    public function transferNominet($id, $data = [], $urlPostfix = ''): ResponseInterface
    {
        return $this->client
            ->sendRequest(
                $this->transferNominetRequest($id, $data, $urlPostfix)
            );
    }

    public function transferNominetAsync($id, $data = [], $urlPostfix = ''): Promise
    {
        return $this->client
            ->sendRequestAsync(
                $this->transferNominetRequest($id, $data, $urlPostfix)
            );
    }

    /**
     * @apram int $id
     * @param array $data
     * @param string $urlPostfix
     * @return RequestInterface
     */
    public function transferNominetRequest($id, $data = [], $urlPostfix = '') : RequestInterface
    {
        $request = new Request('POST', $this->endpoint . '/' . $id . '/update/nominettag' . $urlPostfix);
        $request = $request->withBody(\GuzzleHttp\Psr7\stream_for(\GuzzleHttp\json_encode($data)));

        return $request;
    }

    public function transferStatus($id, $process_id, $data = [], $urlPostfix = ''): ResponseInterface
    {
        return $this->client
            ->sendRequest(
                $this->transferStatusRequest($id, $process_id, $data, $urlPostfix)
            );
    }

    public function transferStatusAsync($id, $process_id, $data = [], $urlPostfix = ''): Promise
    {
        return $this->client
            ->sendRequestAsync(
                $this->transferStatusRequest($id, $process_id, $data, $urlPostfix)
            );
    }

    /**
     * @apram int $id
     * @param array $data
     * @param string $urlPostfix
     * @return RequestInterface
     */
    public function transferStatusRequest($id, $process_id, $data = [], $urlPostfix = '') : RequestInterface
    {
        $request = new Request('GET', $this->endpoint . '/' . $id . '/transfer/' . $process_id . $urlPostfix);
        $request = $request->withBody(\GuzzleHttp\Psr7\stream_for(\GuzzleHttp\json_encode($data)));

        return $request;
    }
}