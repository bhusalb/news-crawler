<?php


namespace App\Services\Crawler\Sources\OnlineKhabar;


use App\Services\Crawler\Sources\Page;

class HomePage extends Page
{

    public function execute() : array
    {
        //ID special top section
        $links = [];
        foreach ($this->crawler->filter('#special > h1 > a') as $domElement)
            $links[] = $domElement->getAttribute('href');


        // main story
        $links[] = $this->crawler->filter('#main_story > h1 > a')->attr('href');

        foreach ($this->crawler->filter('.news_loop > h2 > a') as $domElement)
            $links[] = $domElement->getAttribute('href');


        foreach ($links as $item)
            (new SingleNews($item, $this->config))->execute();
    }
}