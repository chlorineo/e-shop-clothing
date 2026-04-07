<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::query()->delete();

        Product::insert([
            ['name' => 'White T-Shirt', 'price' => 14.99, 'image' => 'mens/ManTshirtWhite.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pink T-Shirt', 'price' => 19.99, 'image' => 'mens/ManTshirtPink.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gray T-Shirt', 'price' => 14.99, 'image' => 'mens/ManTshirtGray.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dark Blue Suit', 'price' => 199.99, 'image' => 'mens/ManSuitDarkBlue.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Black Suit', 'price' => 199.99, 'image' => 'mens/ManSuitBlack.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Red Dress Shirt', 'price' => 39.99, 'image' => 'mens/ManDressShirtRed.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pink Dress Shirt', 'price' => 59.99, 'image' => 'mens/DressShirtPink.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Red Hoodie', 'price' => 29.99, 'image' => 'mens/ManRedHoodie.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Denim Coat', 'price' => 44.99, 'image' => 'mens/ManDenimCoat.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gray Jacket', 'price' => 50.00, 'image' => 'mens/ManGrayJacket.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Beige Coat', 'price' => 100.00, 'image' => 'mens/ManBeigeCoat.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Denim Jeans', 'price' => 30.00, 'image' => 'mens/ManDenimJeans1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Denim Jacket', 'price' => 80.00, 'image' => 'mens/ManDenimJacket.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Trousers', 'price' => 60.00, 'image' => 'mens/ManTrousers.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Yellow Hoodie', 'price' => 40.00, 'image' => 'mens/ManYellowHoodie.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Denim Jacket', 'price' => 50.00, 'image' => 'mens/ManDenimJacket2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Grey Dress Shirt', 'price' => 35.00, 'image' => 'mens/ManGreyDressShirt.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'White Dress Shirt', 'price' => 40.00, 'image' => 'mens/ManWhiteDressShirt.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'White-Blue Checkered Shirt', 'price' => 45.00, 'image' => 'mens/ManWhiteBlueShirt.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Red-Blue Checkered Shirt', 'price' => 25.00, 'image' => 'mens/ManRedBlueShirt.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
