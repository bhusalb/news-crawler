<?php

namespace App\Console\Commands;

use App\Services\Crawler\Crawler;
use Illuminate\Console\Command;

class BhusalSpider extends Command
{
    protected $crawler;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawling in my skin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->crawler = new Crawler();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->crawler->execute();
    }
}
