<?php


namespace App\Services\Crawler\Sources\OnlineKhabar;


class Main
{
    protected $config;


    public function getClassesConfig()
    {
        return [
            /* -- Samachar -- */
            [
                'class-name' => Samachar::class,
                'url' => 'http://www.onlinekhabar.com/content/news/',
                'category' => \App\Category::where('slug', 'news')->firstOrFail(),
            ],
            /* -- Opinion -- */
            [
                'class-name' => Opinion::class,
                'url' => 'http://www.onlinekhabar.com/content/opinion/',
                'category' => \App\Category::where('slug', 'opinion')->firstOrFail(),
            ],
            /* -- Sports -- */
            [
                'class-name' => Sports::class,
                'url' => 'http://www.onlinekhabar.com/content/sports/',
                'category' => \App\Category::where('slug', 'sports')->firstOrFail(),
            ],
            /* -- Prabas -- */
            [
                'class-name' => Prabas::class,
                'url' => 'http://www.onlinekhabar.com/content/prabas-news/',
                'category' => \App\Category::where('slug', 'prabas-news')->firstOrFail(),
            ],
            /* -- Bichitra World -- */
            [
                'class-name' => BichitraSansar::class,
                'url' => 'http://www.onlinekhabar.com/content/bichitra-world/',
                'category' => \App\Category::where('slug', 'bichitra-world')->firstOrFail(),
            ],
        ];

    }

    public function __construct($config)
    {
        $this->config = $config;
    }


    public function execute()
    {
        foreach ($this->getClassesConfig() as $class)
            (new $class['class-name']($class['url'], $this->config, $class['category']))->execute();

    }
}