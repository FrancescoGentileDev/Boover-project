<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            'Grafica e Design',
            'Marketing',
            'Scrittura e Traduzione',
            'Musica e Audio',
            'Programmazione e Tecnologia',
            'Lifestyle',
            'Medicina e Salute',
            'Sport e Hobby',
            'Altro',
        ];

        foreach ($categories as $category) {
            $addCategory = new Category();
            $addCategory->name = $category;
            $addCategory->slug = Str::slug($addCategory->name);
            $addCategory->save();
        }
    }
}
