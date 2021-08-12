<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		
		DB::table('articles')->insert([[
            'article_name' => "Article 1",
            'article_description' => "Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ",
            'author_id' => 1,
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ],
        [	
            'article_name' => "Article 2",
            'article_description' => "Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ",
            'author_id' => 1,
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ],
   		[
            'article_name' => "Article 3",
            'article_description' => "Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ",
            'author_id' => 1,
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ]]);

    }
}
