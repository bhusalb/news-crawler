<?php


namespace App\Services\Crawler\Sources\OnlineKhabar;

use App\Services\Crawler\Sources\Page;

class SingleNews extends Page
{
    public function execute() : self
    {
        $news['url'] = $this->url;
        $news['category_id'] = $this->category->id;
        $news['image'] = $this->crawler->filter('.ok-single-content img')->count() ? $this->crawler->filter('.ok-single-content img')->attr('src') : null;

        if ($news['image']) {
            $news['image'] = $this->downloadAndSave($news['image']);
            (new RemoveWatermark($news['image']))->crop()->save();
        }

        $news['title'] = $this->crawler->filter('#sing_cont .inside_head')->count() ? $this->crawler->filter('#sing_cont .inside_head')->text() : null;
        $news['intro'] = '';
        $firstItem = true;
        if ($this->crawler->filter('.ok-single-content p')->count() > 1)
            foreach ($this->crawler->filter('.ok-single-content p') as $node) {
                if (!$firstItem)
                    $news['intro'] .= $node->nodeValue;

                $firstItem = false;
            }
        
        $news['source'] = $this->config['source_name'];
        $this->news = $news;

        return $this;
    }
}