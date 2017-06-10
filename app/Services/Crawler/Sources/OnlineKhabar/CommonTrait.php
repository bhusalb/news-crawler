<?php


namespace App\Services\Crawler\Sources\OnlineKhabar;


trait CommonTrait
{
    public function execute()
    {
        $links = [];
        foreach ($this->crawler->filter('.news_loop > h2 > a') as $domElement)
            $links[] = $domElement->getAttribute('href');

        foreach ($links as $link)
            (new SingleNews($link, $this->config, $this->category))->execute()->saveNews();

        return $this;
    }
}