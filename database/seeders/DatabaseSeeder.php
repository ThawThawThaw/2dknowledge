<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        \App\Models\Number::factory()
        ->count(8)
        ->state(new Sequence(
            ['content' => '00,00,00','description' => 'desc','type' => 'numbers','created_at' => now(),'updated_at' => now()],
            ['content' => '00,00,00','description' => 'desc','type' => 'one_number','created_at' => now(),'updated_at' => now()],
            ['content' => '00,00,00','description' => 'desc','type' => 'one_change','created_at' => now(),'updated_at' => now()],
            ['content' => '00,00,00','description' => 'desc','type' => 'lone_paing','created_at' => now(),'updated_at' => now()],
            ['content' => '00,00,00','description' => 'desc','type' => 'own_number','created_at' => now(),'updated_at' => now()],
            ['content' => '00,00,00','description' => 'desc','type' => 'ch_key','created_at' => now(),'updated_at' => now()],
            ['content' => '2D နှင့်ပတ်သက်သော သိမှတ်ဖွယ်ရာများ','description' => '2D အကြောင်းဒီမှာရေးပါ။','type' => 'about_2d','created_at' => now(),'updated_at' => now()],
            ['content' => 'APP အကြောင်း','description' => 'APP အကြောင်းဒီမှာရေးပါ။','type' => 'about_app','created_at' => now(),'updated_at' => now()],
        ))->create();
    }
}
