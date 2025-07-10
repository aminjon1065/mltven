<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Очищаем таблицу перед заполнением
        Category::truncate();

        Category::create([
            'name' => 'Электроника',
            'slug' => 'electronics',
            'children' => [
                [
                    'name' => 'Телефоны',
                    'slug' => 'smartphones',
                ],
                [
                    'name' => 'Ноутбуки',
                    'slug' => 'laptops',
                    'children' => [
                        [
                            'name' => 'Игровые ноутбуки',
                            'slug' => 'gaming-laptops',
                        ],
                        [
                            'name' => 'Ультрабуки',
                            'slug' => 'ultrabooks',
                        ],
                    ],
                ],
            ],
        ]);

        Category::create([
            'name' => 'Одежда',
            'slug' => 'clothing',
            'children' => [
                [
                    'name' => 'Мужская',
                    'slug' => 'mens-clothing',
                ],
                [
                    'name' => 'Женская',
                    'slug' => 'womens-clothing',
                ],
            ],
        ]);
    }
}
