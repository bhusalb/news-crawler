<?php


namespace App\Services\Crawler;


class Crawler
{
    public function execute()
    {
        foreach (config('crawler') as $crawlingWebsite) {
            $className = __NAMESPACE__ . '\\Sources\\' . $crawlingWebsite['name'] . '\\Main';
            (new $className($crawlingWebsite))->execute();
        }
    }
}