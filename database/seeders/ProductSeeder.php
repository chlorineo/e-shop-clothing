<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Models\TagCategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $catalog = [
            [
                'name' => 'White T-Shirt',
                'description' => 'A lightweight white cotton T-shirt for everyday outfits.',
                'price' => 14.99,
                'images' => [
                    ['url' => 'mens/ManTshirtWhite.jpg', 'alt' => 'White T-Shirt', 'position' => 1],
                ],
                'tags' => ['White', 'Cotton', 'M', 'Mens'],
            ],
            [
                'name' => 'Pink T-Shirt',
                'description' => 'A soft pink cotton T-shirt with a relaxed casual fit.',
                'price' => 19.99,
                'images' => [
                    ['url' => 'mens/ManTshirtPink.jpg', 'alt' => 'Pink T-Shirt', 'position' => 1],
                ],
                'tags' => ['Pink', 'Cotton', 'M', 'Mens'],
            ],
            [
                'name' => 'Gray T-Shirt',
                'description' => 'A neutral gray cotton T-shirt that layers easily.',
                'price' => 14.99,
                'images' => [
                    ['url' => 'mens/ManTshirtGray.jpg', 'alt' => 'Gray T-Shirt', 'position' => 1],
                ],
                'tags' => ['Gray', 'Cotton', 'L', 'Mens'],
            ],
            [
                'name' => 'Dark Blue Suit',
                'description' => 'A formal dark blue suit designed for sharper occasions.',
                'price' => 199.99,
                'images' => [
                    ['url' => 'mens/ManSuitDarkBlue.jpg', 'alt' => 'Dark Blue Suit', 'position' => 1],
                ],
                'tags' => ['Dark Blue', 'Polyester', 'L', 'Mens'],
            ],
            [
                'name' => 'Black Suit',
                'description' => 'A classic black suit with a polished structured silhouette.',
                'price' => 199.99,
                'images' => [
                    ['url' => 'mens/ManSuitBlack.jpg', 'alt' => 'Black Suit', 'position' => 1],
                ],
                'tags' => ['Black', 'Polyester', 'L', 'Mens'],
            ],
            [
                'name' => 'Red Dress Shirt',
                'description' => 'A bold red dress shirt that stands out in smart looks.',
                'price' => 39.99,
                'images' => [
                    ['url' => 'mens/ManDressShirtRed.jpg', 'alt' => 'Red Dress Shirt', 'position' => 1],
                ],
                'tags' => ['Red', 'Cotton', 'M', 'Mens'],
            ],
            [
                'name' => 'Pink Dress Shirt',
                'description' => 'A tailored pink dress shirt with a clean refined finish.',
                'price' => 59.99,
                'images' => [
                    ['url' => 'mens/DressShirtPink.jpg', 'alt' => 'Pink Dress Shirt', 'position' => 1],
                ],
                'tags' => ['Pink', 'Cotton', 'M', 'Mens'],
            ],
            [
                'name' => 'Red Hoodie',
                'description' => 'A cozy red hoodie made for casual everyday wear.',
                'price' => 29.99,
                'images' => [
                    ['url' => 'mens/ManRedHoodie.jpg', 'alt' => 'Red Hoodie', 'position' => 1],
                ],
                'tags' => ['Red', 'Cotton', 'L', 'Mens'],
            ],
            [
                'name' => 'Denim Coat',
                'description' => 'A denim coat with a rugged look and versatile layering.',
                'price' => 44.99,
                'images' => [
                    ['url' => 'mens/ManDenimCoat.jpg', 'alt' => 'Denim Coat', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'L', 'Mens'],
            ],
            [
                'name' => 'Gray Jacket',
                'description' => 'A gray jacket with a warm structured feel for cooler days.',
                'price' => 50.00,
                'images' => [
                    ['url' => 'mens/ManGrayJacket.jpg', 'alt' => 'Gray Jacket', 'position' => 1],
                ],
                'tags' => ['Gray', 'Wool', 'L', 'Mens'],
            ],
            [
                'name' => 'Beige Coat',
                'description' => 'A beige coat with a clean minimal look and longer cut.',
                'price' => 100.00,
                'images' => [
                    ['url' => 'mens/ManBeigeCoat.jpg', 'alt' => 'Beige Coat', 'position' => 1],
                ],
                'tags' => ['Beige', 'Linen', 'XL', 'Mens'],
            ],
            [
                'name' => 'Denim Jeans',
                'description' => 'Classic blue denim jeans built for simple daily styling.',
                'price' => 30.00,
                'images' => [
                    ['url' => 'mens/ManDenimJeans1.jpg', 'alt' => 'Denim Jeans', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'M', 'Mens'],
            ],
            [
                'name' => 'Denim Jacket',
                'description' => 'A staple denim jacket with a timeless casual silhouette.',
                'price' => 80.00,
                'images' => [
                    ['url' => 'mens/ManDenimJacket.jpg', 'alt' => 'Denim Jacket', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'L', 'Mens'],
            ],
            [
                'name' => 'Trousers',
                'description' => 'Smart gray trousers suited to dressy and casual outfits.',
                'price' => 60.00,
                'images' => [
                    ['url' => 'mens/ManTrousers.png', 'alt' => 'Trousers', 'position' => 1],
                ],
                'tags' => ['Gray', 'Cotton', 'M', 'Mens'],
            ],
            [
                'name' => 'Yellow Hoodie',
                'description' => 'A bright yellow hoodie that adds color to streetwear looks.',
                'price' => 40.00,
                'images' => [
                    ['url' => 'mens/ManYellowHoodie.jpg', 'alt' => 'Yellow Hoodie', 'position' => 1],
                ],
                'tags' => ['Yellow', 'Cotton', 'L', 'Mens'],
            ],
            [
                'name' => 'Denim Jacket',
                'description' => 'A lighter denim jacket version for easy everyday layering.',
                'price' => 50.00,
                'images' => [
                    ['url' => 'mens/ManDenimJacket2.jpg', 'alt' => 'Denim Jacket', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'M', 'Mens'],
            ],
            [
                'name' => 'Grey Dress Shirt',
                'description' => 'A grey dress shirt with a subtle tone and tailored finish.',
                'price' => 35.00,
                'images' => [
                    ['url' => 'mens/ManGreyDressShirt.jpg', 'alt' => 'Grey Dress Shirt', 'position' => 1],
                ],
                'tags' => ['Gray', 'Cotton', 'M', 'Mens'],
            ],
            [
                'name' => 'White Dress Shirt',
                'description' => 'A sharp white dress shirt for clean formal combinations.',
                'price' => 40.00,
                'images' => [
                    ['url' => 'mens/ManWhiteDressShirt.jpg', 'alt' => 'White Dress Shirt', 'position' => 1],
                ],
                'tags' => ['White', 'Cotton', 'L', 'Mens'],
            ],
            [
                'name' => 'White-Blue Checkered Shirt',
                'description' => 'A white-blue checkered shirt with a relaxed smart-casual feel.',
                'price' => 45.00,
                'images' => [
                    ['url' => 'mens/ManWhiteBlueShirt.jpg', 'alt' => 'White-Blue Checkered Shirt', 'position' => 1],
                ],
                'tags' => ['White', 'Blue', 'Cotton', 'M', 'Mens'],
            ],
            [
                'name' => 'Red-Blue Checkered Shirt',
                'description' => 'A red-blue checkered shirt built for casual layered outfits.',
                'price' => 25.00,
                'images' => [
                    ['url' => 'mens/ManRedBlueShirt.jpg', 'alt' => 'Red-Blue Checkered Shirt', 'position' => 1],
                ],
                'tags' => ['Red', 'Blue', 'Cotton', 'M', 'Mens'],
            ],
        ];

        $tagCategories = [
            'Color' => ['White', 'Pink', 'Gray', 'Dark Blue', 'Red', 'Blue', 'Yellow', 'Black', 'Beige'],
            'Material' => ['Cotton', 'Denim', 'Wool', 'Polyester', 'Linen'],
            'Size' => ['XS', 'S', 'M', 'L', 'XL'],
            'Type' => ['Mens', 'Womans', 'Unisex', 'Accessories'],
        ];

        Product::query()->delete();
        ProductImage::query()->delete();
        Tag::query()->delete();
        TagCategory::query()->delete();

        $tagIdsByName = [];

        foreach ($tagCategories as $categoryName => $tagNames) {
            $category = TagCategory::query()->create([
                'name' => $categoryName,
            ]);

            foreach ($tagNames as $tagName) {
                $tag = Tag::query()->create([
                    'name' => $tagName,
                    'tag_category_id' => $category->id,
                ]);

                $tagIdsByName[$tagName] = $tag->id;
            }
        }

        foreach ($catalog as $productData) {
            $product = Product::query()->create([
                'name' => $productData['name'],
                'description' => $productData['description'],
                'price' => $productData['price'],
            ]);

            $product->images()->createMany($productData['images']);

            $product->tags()->sync(
                collect($productData['tags'])
                    ->map(fn (string $tagName): int => $tagIdsByName[$tagName])
                    ->all()
            );
        }
    }
}
