<?php


namespace App\Services\Crawler\Sources;


use Symfony\Component\DomCrawler\Crawler;

abstract class InternalPage
{
    protected $httpClient;
    protected $crawler;
    protected $url;
    
    public function __construct($url)
    {
        $this->url = $url;
        $this->httpClient = new \GuzzleHttp\Client();
        $this->crawler = new Crawler($this->fetchHTML($url));
    }

    public function fetchHTML($url, $method = 'GET')
    {
        $res = $this->httpClient->request($method, $url);
        return $res->getBody()->getContents();
    }

    public abstract function execute() : array;
}