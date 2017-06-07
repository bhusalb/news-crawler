<?php


namespace App\Services\Crawler\Sources;


use Symfony\Component\DomCrawler\Crawler;

class InternalNewsOnlineKhabar extends InternalPage
{
    public function execute() : array
    {
        $news['url'] = $this->url;
        $news['image'] = $this->crawler->filter('.ok-single-content p img') ? $this->crawler->filter('.ok-single-content p img') ->attr('src') : null;
        $news['title'] = $this->crawler->filter('#sing_cont .inside_head')->text();
        $news['intro'] = $this->crawler->filter('.ok-single-content p')->eq(1)->text();

        return $news;
    }
}