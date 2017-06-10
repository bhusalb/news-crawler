<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $categories = [
        [
            'name' => 'News',
            'name_ne' => 'समाचार',
            'slug' => 'news'
        ],
        [
            'name' => 'Opinion',
            'name_ne' => 'विचार',
            'slug' => 'opinion'
        ],
        [
            'name' => 'Entertainment',
            'name_ne' => 'मनोरन्जन',
            'slug' => 'entertainment',
        ],
        [
            'name' => 'Business',
            'name_ne' => 'बिजनेस',
            'slug' => 'business'
        ],
        [
            'name' => 'Sports',
            'name_ne' => 'खेलकुद',
            'slug' => 'sports'
        ],
        [
            'name' => 'Prabas',
            'name_ne' => 'प्रवास',
            'slug' => 'prabas-news'
        ],
        [
            'name' => 'Bichitra World',
            'name_ne' => 'विचित्र संसार',
            'slug' => 'bichitra-world'
        ],
    ];

    public function run()
    {
        \App\Category::insert($this->categories);
    }
}
