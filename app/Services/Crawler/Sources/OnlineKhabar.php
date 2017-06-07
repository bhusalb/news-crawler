<?php


namespace App\Services\Crawler\Sources;

use Symfony\Component\DomCrawler\Crawler;

class OnlineKhabar
{
    const SOURCE = 'Online Khabar';
    protected $crawler;
    protected $news = [];

    public function __construct($html)
    {
        $this->crawler = new Crawler($html);
    }

    public function execute()
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
            $this->news[] = (new InternalNewsOnlineKhabar($item))->execute();

        foreach ($this->news as $key => $value)
            $this->news[$key]['source'] = self::SOURCE;

        return $this->news;
    }
}