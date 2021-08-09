<?php

use Illuminate\Database\Seeder;

class ShirtSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
        foreach ($sizes as $key => $size) {
            App\Models\Users\ShirtSize::create([
                'size' => $size,
            ]);
        }
    }
}
