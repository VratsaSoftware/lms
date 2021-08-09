<?php

use Illuminate\Database\Seeder;

class TeamEventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Уеб сайт или уеб приложение','Мобилно приложение','Десктоп приложение', 'Embedded системи(хардуер)'];
        foreach ($categories as $key => $category) {
        		App\Models\Events\TeamCategory::create([
                'category' => $category,
            ]);
        }
        
    }
}
