<?php


namespace App\Services\Crawler;


class Crawler
{
    protected $httpClient;

    public function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client();
    }

    public function execute()
    {
        foreach (config('crawler') as $crawlingWebsite) {
            $className = __NAMESPACE__ . '\\Sources\\' . $crawlingWebsite['name'];
            $this->storeNews((new $className($this->fetchHTML($crawlingWebsite['source'])))->execute());
        }
    }

    public function fetchHTML($url, $method = 'GET')
    {
        $res = $this->httpClient->request($method, $url);
        return $res->getBody()->getContents();
    }

    public function storeNews($news)
    {
        foreach ($news as $item)
            if ($item['url'] && \App\News::where('url', $item['url'])->count() == 0)
                \App\News::create($item);
    }
}