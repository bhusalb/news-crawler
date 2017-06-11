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
            try {
                (new SingleNews($link, $this->config, $this->category))->execute()->saveNews();
            } catch (\Exception $e) {
                mail(config('app.error_reporting_mail'), 'Crawler has issue', $e->getMessage());
            }
        return $this;
    }
}