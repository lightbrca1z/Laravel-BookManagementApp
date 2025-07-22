<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\AuthorDetail;

class AuthorsTableSeeder extends Seeder
{
    public function run(): void
    {
        //ファクトリによって5件の著者情報を作成
        Author::factory(5)->create();
        //合わせて著者情報も5件作成される。
        AuthorDetail::factory(5)->create();
    }
}