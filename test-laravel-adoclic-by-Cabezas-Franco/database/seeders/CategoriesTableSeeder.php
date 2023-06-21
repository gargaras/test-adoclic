<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'category' => 'Animals',
            ],
            [
                'category' => 'Security',
            ],
            // Agrega más categorías si es necesario
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
