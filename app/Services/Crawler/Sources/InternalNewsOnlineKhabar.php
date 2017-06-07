<?php


namespace App\Services\Crawler\Sources;


class InternalNewsOnlineKhabar extends InternalPage
{
    public function execute() : array
    {
        $news['url'] = $this->url;
        $news['image'] = $this->crawler->filter('.ok-single-content img')->count() ? $this->crawler->filter('.ok-single-content img')->attr('src') : null;
        $news['title'] = $this->crawler->filter('#sing_cont .inside_head')->count() ? $this->crawler->filter('#sing_cont .inside_head')->text() : null;
        $news['intro'] = $this->crawler->filter('.ok-single-content p')->count() > 1 ? $this->crawler->filter('.ok-single-content p')->eq(1)->text() : null;

        return $news;
    }
}