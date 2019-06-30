<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['name' => 'Chocorramo'],
            ['name' => 'Coca-Cola 350ml'],
            ['name' => 'Galleta Festival'],
            ['name' => 'Agua con gas'],
        ];

        DB::table('products')->insert($products);
    }
}
