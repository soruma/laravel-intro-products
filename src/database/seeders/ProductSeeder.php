<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(["category_id" => 1, "maker" => "ロッチ", "name" => "ミルクチョコレート", "price" => 120]);
        Product::create(["category_id" => 1, "maker" => "森氷", "name" => "キャラメルチョコ", "price" => 90]);
        Product::create(["category_id" => 1, "maker" => "Gligo", "name" => "Rocky", "price" => 140]);
        Product::create(["category_id" => 1, "maker" => "ロッチ", "name" => "GABAチョコレート", "price" => 130]);        
        Product::create(["category_id" => 2, "maker" => "ガルビー", "name" => "ポテトスナック", "price" => 140]);
        Product::create(["category_id" => 2, "maker" => "小池屋", "name" => "のり塩ポテト", "price" => 145]);
        Product::create(["category_id" => 2, "maker" => "小池屋", "name" => "リッチポテトWガーリック", "price" => 168]);        
        Product::create(["category_id" => 2, "maker" => "おかしカンパニー", "name" => "Bigラーメンスナック", "price" => 110]);
        Product::create(["category_id" => 3, "maker" => "赤成", "name" => "ゴリゴリくんソーダ", "price" => 98]);
        Product::create(["category_id" => 3, "maker" => "森氷", "name" => "チョコ最中ビッグ", "price" => 100]);
        Product::create(["category_id" => 3, "maker" => "Gligo", "name" => "PARICCOチョコ", "price" => 110]);
        Product::create(["category_id" => 4, "maker" => "やおさん", "name" => "うまいぞう", "price" => 20]);
        Product::create(["category_id" => 4, "maker" => "やおさん", "name" => "たっちゃんイカ", "price" => 40]);
        Product::create(["category_id" => 4, "maker" => "やおさん", "name" => "カボチャ太郎", "price" => 50]);
        Product::create(["category_id" => 4, "maker" => "マルダイ", "name" => "ハッピーラムネ", "price" => 40]);
        Product::create(["category_id" => 4, "maker" => "おかしカンパニー", "name" => "ラーメンスナック", "price" => 50]);
        Product::create(["category_id" => 4, "maker" => "おかしカンパニー", "name" => "ラーメンスナック辛口", "price" => 50]);
        
        for ($i = 1; $i <= 100; $i++) {
            Product::create([
                "category_id" => rand(1, 4), 
                "maker" => "おやつ王国",
                "name" => "謎のおやつ No.". $i,
                "price" => rand(4, 10) * 10,
            ]);
        }
    }
}
