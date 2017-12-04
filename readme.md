# News Crawler
It's a laravel based web crawler for crawling [Onlinekhabar](http://www.onlinekhabar.com/).

## Features
- API for fetching crawled news
- Remove Watermark of Image( by cropping ).
- Complete OOP implementation 
- Can be easily extended for other news sites.

## Installation
- Cloning Repo
``` git clone https://github.com/bhusalb/news-crawler.git```
- Go to directory
```cd news-crawler```
- Composer install
    ```composer install```
- Configure .env file
``` cp .env.sample .env```
- Change .env file parameter
    You need to change ERROR_REPORTING_MAIL, DB_DATABASE, DB_USERNAME, DB_PASSWORD
- Run migrations and Seeder
``` php artisan migrate ```
```php artisan db:seed```
- Setup Cronjob
  [Please refer Laravel docs](https://laravel.com/docs/5.4/scheduling)
  For testing purpose, you can use ```php artisan crawl```
- Ready for use


## Using it
To start testing server, you can use ```php artisan serve```. After that you can check [localhost:8000](http://localhost:8000/)
For testing API, You can use tools like [Postman](https://www.getpostman.com/)
You need to specify custom header, for accessing API, ie```rock-on why-not``` 
You can remove custom header requirement by removing ```ApiMiddleware``` from routes.
```
