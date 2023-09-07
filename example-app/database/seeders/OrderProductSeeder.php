<?php
namespace Database\Seeders;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\Product;

use Illuminate\Database\Seeder;
use Database\Factories\OrderProductFactory;

class OrderProductSeeder extends Seeder
{
    public function run()
    {


        OrderProductFactory::new()->count(50)->create();
    }}


        
