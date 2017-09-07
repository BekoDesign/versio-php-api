<?php
namespace BekoDesign\versioAPI\Traits;


use BekoDesign\versioAPI\Contracts\IClient;
use GuzzleHttp\Psr7\Request;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

trait Listable
{
    /**
     * @var IClient
     */
    protected $client;

    /**
     * @param array $data
     * @param string $urlPostfix
     * @return ResponseInterface
     */
    public function list($data = [], $urlPostfix = '') : ResponseInterface
    {
        return $this->client
            ->sendRequest(
                $this->listRequest($data, $urlPostfix)
            );
    }

    /**
     * @param array $data
     * @param string $urlPostfix
     * @return ResponseInterface
     */
    public function listAsync($data = [], $urlPostfix = '') : Promise
    {
        return $this->client
            ->sendRequestAsync(
                $this->listRequest($data, $urlPostfix)
            );
    }

    /**
     * @param array $data
     * @param string $urlPostfix
     * @return RequestInterface
     */
    public function listRequest($data = [], $urlPostfix = '') : RequestInterface
    {
        $request = new Request('GET', $this->getListUrl($data, $urlPostfix));
        $request->withBody(\GuzzleHttp\Psr7\stream_for(\GuzzleHttp\json_encode($data)));

        return $request;
    }

    /**
     * @param array $data
     * @param string $urlPostfix
     * @return string
     */
    public function getListUrl($data = [], $urlPostfix = '') : string {
        return $this->endpoint . $urlPostfix;
    }
}