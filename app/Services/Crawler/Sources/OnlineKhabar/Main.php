<?php


namespace App\Services\Crawler\Sources\OnlineKhabar;


class Main
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }


    public function execute()
    {
        /* -- Samachar -- */
        (new Samachar('http://www.onlinekhabar.com/content/news/', $this->config, \App\Category::where('slug', 'news')->firstOrFail()))->execute();

        /* -- Opinion -- */
        (new Opinion('http://www.onlinekhabar.com/content/opinion/', $this->config, \App\Category::where('slug', 'opinion')->firstOrFail()))->execute();

        /* -- Sports -- */
        (new Sports('http://www.onlinekhabar.com/content/sports/', $this->config, \App\Category::where('slug', 'sports')->firstOrFail()))->execute();

        /* -- Prabas -- */
        (new Prabas('http://www.onlinekhabar.com/content/prabas-news/', $this->config, \App\Category::where('slug', 'prabas-news')->firstOrFail()))->execute();

        /* -- Bichitra World -- */
        (new BichitraSansar('http://www.onlinekhabar.com/content/bichitra-world/', $this->config, \App\Category::where('slug', 'prabas-news')->firstOrFail()))->execute();
    }
}