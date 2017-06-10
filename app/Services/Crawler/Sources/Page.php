<?php


namespace App\Services\Crawler\Sources;


use Symfony\Component\DomCrawler\Crawler;

abstract class Page
{
    public $httpClient;
    public $crawler;
    public $url;
    public $config;
    public $category;
    public $news;

    public function __construct($url, $config, $category = null)
    {
        $this->url = $url;
        $this->httpClient = new \GuzzleHttp\Client();
        $this->crawler = new Crawler($this->fetchHTML($url));
        $this->config = $config;
        $this->category = $category;
    }

    public function fetchHTML($url, $method = 'GET')
    {
        $res = $this->httpClient->request($method, $url);
        return $res->getBody()->getContents();
    }

    public abstract function execute();

    public function downloadAndSave($url)
    {
        $fileName = 'public/images/' . uniqid() . $this->appendFileExtension($url);
        file_put_contents(storage_path('app/' . $fileName), file_get_contents($url));
        
        return $fileName;
    }

    private function appendFileExtension($url)
    {
        $pieces = explode('.', $url);
        if (count($pieces) > 1 && strlen(end($pieces)) < 5)
            return '.' . end($pieces);

        return '';
    }

    public function saveNews()
    {
        if ($this->news['url'] && \App\News::where('url', $this->news['url'])->count() == 0)
            \App\News::create($this->news);
    }
}