<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 22.05.2020
 * Time: 17:49
 */
class ArticleDummyDataSeed extends \Illuminate\Database\Seeder
{
    public function run() {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 20; $i++) {
            \App\Models\Category::create([
                'name' => $faker->name,
            ]);
        }
        for($i = 0; $i < 120; $i++) {
            \App\Models\Tag::create([
                'name' => $faker->text(25),
            ]);
        }
        for($i = 0; $i < 120; $i++) {
            \App\Models\Source::create([
                'name' => $faker->domainName,
                'link' => $faker->url,
            ]);
        }
        for($i = 0; $i < 120; $i++) {
            \App\Models\User::create([
                'name' => $faker->company,
                'email' => $faker->email,
                'password' => \Illuminate\Support\Facades\Hash::make($faker->password()),
            ]);
        }
        for($i = 0; $i < 420; $i++) {
            \App\Models\Article::create([
                'title' => $faker->text(255),
                'published_at' => $faker->dateTime,
                'description' => $faker->text,
                'content' => $faker->text,
                'image' => $faker->imageUrl(),
                'mini_desc' => $faker->text(400),
                'source_id' => \App\Models\Source::all()->random(1)->first()->id,
                'author_id' => \App\Models\User::all()->random(1)->first()->id,
                'category_id' => \App\Models\Category::all()->random(1)->first()->id,
            ]);
        }
        $artTags = [];
        for($i = 0; $i < 120; $i++) {
           array_push($artTags, [
                'tag_id' => \App\Models\Tag::all()->random(1)->first()->id,
                'article_id' => \App\Models\Article::all()->random(1)->first()->id,
            ]);
        }
        \Illuminate\Support\Facades\DB::table('articles_tags')->insert($artTags);
    }
}