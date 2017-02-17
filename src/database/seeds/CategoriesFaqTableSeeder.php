<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Ourgarage\Faq\Models\Category;
use Ourgarage\Faq\Models\Faq;

class CategoriesFaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $index) {
            $category = Category::create([
                'status' => Category::STATUS_ACTIVE,
                'title' => $faker->unique()->word,
                'slug' => $faker->slug
            ]);

            $category_id[] = $category->id;
        }

        foreach (range(1, 30) as $faq) {
            Faq::create([
                'faq_category_id' => $faker->randomElement($category_id),
                'status' => $faker->randomElement([Faq::STATUS_DISABLED, Faq::STATUS_ACTIVE]),
                'title' => $faker->sentence,
                'slug' => $faker->slug,
                'answer' => $faker->text
            ]);
        }

    }
}
