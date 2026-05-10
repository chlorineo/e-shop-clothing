<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Models\TagCategory;
use Carbon\CarbonImmutable;
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
                'tags' => ['White', 'Cotton', 'Mens', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Pink T-Shirt',
                'description' => 'A soft pink cotton T-shirt with a relaxed casual fit.',
                'price' => 19.99,
                'images' => [
                    ['url' => 'mens/ManTshirtPink.jpg', 'alt' => 'Pink T-Shirt', 'position' => 1],
                ],
                'tags' => ['Pink', 'Cotton', 'Mens', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Pink Precision Graphic T-Shirt',
                'description' => 'An oversized pink cotton T-shirt with a white contrast collar and bold front lettering.',
                'price' => 24.99,
                'images' => [
                    ['url' => 'products/6a00a0c7b1cc1_bandar-baant-ZQqpq882kpk-unsplash.jpg', 'alt' => 'Pink Precision Graphic T-Shirt front view', 'position' => 1],
                    ['url' => 'products/6a00a0c7b2ebc_bandar-baant-EfWgpl_bkYI-unsplash.jpg', 'alt' => 'Pink Precision Graphic T-Shirt side view', 'position' => 2],
                    ['url' => 'products/6a00a0c7b3f6a_bandar-baant-9ldWUhmhQ98-unsplash.jpg', 'alt' => 'Pink Precision Graphic T-Shirt back view', 'position' => 3],
                ],
                'tags' => ['Pink', 'Cotton', 'Womans', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Gray T-Shirt',
                'description' => 'A neutral gray cotton T-shirt that layers easily.',
                'price' => 14.99,
                'images' => [
                    ['url' => 'mens/ManTshirtGray.jpg', 'alt' => 'Gray T-Shirt', 'position' => 1],
                ],
                'tags' => ['Gray', 'Cotton', 'Mens', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Dark Blue Suit',
                'description' => 'A formal dark blue suit designed for sharper occasions.',
                'price' => 199.99,
                'images' => [
                    ['url' => 'mens/ManSuitDarkBlue.jpg', 'alt' => 'Dark Blue Suit', 'position' => 1],
                ],
                'tags' => ['Dark Blue', 'Polyester', 'Mens', 'XS', 'S'],
            ],
            [
                'name' => 'Black Suit',
                'description' => 'A classic black suit with a polished structured silhouette.',
                'price' => 199.99,
                'images' => [
                    ['url' => 'mens/ManSuitBlack.jpg', 'alt' => 'Black Suit', 'position' => 1],
                ],
                'tags' => ['Black', 'Polyester', 'Mens', 'L', 'XL'],
            ],
            [
                'name' => 'Red Dress Shirt',
                'description' => 'A bold red dress shirt that stands out in smart looks.',
                'price' => 39.99,
                'images' => [
                    ['url' => 'mens/ManDressShirtRed.jpg', 'alt' => 'Red Dress Shirt', 'position' => 1],
                ],
                'tags' => ['Red', 'Cotton', 'Mens', 'S', 'M'],
            ],
            [
                'name' => 'Pink Dress Shirt',
                'description' => 'A tailored pink dress shirt with a clean refined finish.',
                'price' => 59.99,
                'images' => [
                    ['url' => 'mens/DressShirtPink.jpg', 'alt' => 'Pink Dress Shirt', 'position' => 1],
                ],
                'tags' => ['Pink', 'Cotton', 'Mens', 'M', 'L'],
            ],
            [
                'name' => 'Red Hoodie',
                'description' => 'A cozy red hoodie made for casual everyday wear.',
                'price' => 29.99,
                'images' => [
                    ['url' => 'mens/ManRedHoodie.jpg', 'alt' => 'Red Hoodie', 'position' => 1],
                ],
                'tags' => ['Red', 'Wool', 'Mens', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Denim Coat',
                'description' => 'A denim coat with a rugged look and versatile layering.',
                'price' => 44.99,
                'images' => [
                    ['url' => 'mens/ManDenimCoat.jpg', 'alt' => 'Denim Coat', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'Mens', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Gray Jacket',
                'description' => 'A gray jacket with a warm structured feel for cooler days.',
                'price' => 50.00,
                'images' => [
                    ['url' => 'mens/ManGrayJacket.jpg', 'alt' => 'Gray Jacket', 'position' => 1],
                ],
                'tags' => ['Gray', 'Wool', 'Mens', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Beige Coat',
                'description' => 'A beige coat with a clean minimal look and longer cut.',
                'price' => 100.00,
                'images' => [
                    ['url' => 'mens/ManBeigeCoat.jpg', 'alt' => 'Beige Coat', 'position' => 1],
                ],
                'tags' => ['Beige', 'Linen', 'Mens', 'XS', 'S'],
            ],
            [
                'name' => 'Denim Jeans',
                'description' => 'Classic blue denim jeans built for simple daily styling.',
                'price' => 30.00,
                'images' => [
                    ['url' => 'mens/ManDenimJeans1.jpg', 'alt' => 'Denim Jeans', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'Mens', 'L', 'XL'],
            ],
            [
                'name' => 'Denim Jacket',
                'description' => 'A staple denim jacket with a timeless casual silhouette.',
                'price' => 80.00,
                'images' => [
                    ['url' => 'mens/ManDenimJacket.jpg', 'alt' => 'Denim Jacket', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'Mens', 'S', 'M'],
            ],
            [
                'name' => 'Trousers',
                'description' => 'Smart gray trousers suited to dressy and casual outfits.',
                'price' => 60.00,
                'images' => [
                    ['url' => 'mens/ManTrousers.png', 'alt' => 'Trousers', 'position' => 1],
                ],
                'tags' => ['Gray', 'Cotton', 'Mens', 'M', 'L'],
            ],
            [
                'name' => 'Yellow Hoodie',
                'description' => 'A bright yellow hoodie that adds color to streetwear looks.',
                'price' => 40.00,
                'images' => [
                    ['url' => 'mens/ManYellowHoodie.jpg', 'alt' => 'Yellow Hoodie', 'position' => 1],
                ],
                'tags' => ['Yellow', 'Cotton', 'Mens', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Denim Jacket',
                'description' => 'A lighter denim jacket version for easy everyday layering.',
                'price' => 50.00,
                'images' => [
                    ['url' => 'mens/ManDenimJacket2.jpg', 'alt' => 'Denim Jacket', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'Mens', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Grey Dress Shirt',
                'description' => 'A grey dress shirt with a subtle tone and tailored finish.',
                'price' => 35.00,
                'images' => [
                    ['url' => 'mens/ManGreyDressShirt.jpg', 'alt' => 'Grey Dress Shirt', 'position' => 1],
                ],
                'tags' => ['Gray', 'Cotton', 'Mens', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'White Dress Shirt',
                'description' => 'A sharp white dress shirt for clean formal combinations.',
                'price' => 40.00,
                'images' => [
                    ['url' => 'mens/ManWhiteDressShirt.jpg', 'alt' => 'White Dress Shirt', 'position' => 1],
                ],
                'tags' => ['White', 'Cotton', 'Mens', 'XS', 'S'],
            ],
            [
                'name' => 'White-Blue Checkered Shirt',
                'description' => 'A white-blue checkered shirt with a relaxed smart-casual feel.',
                'price' => 45.00,
                'images' => [
                    ['url' => 'mens/ManWhiteBlueShirt.jpg', 'alt' => 'White-Blue Checkered Shirt', 'position' => 1],
                ],
                'tags' => ['White', 'Blue', 'Cotton', 'Mens', 'L', 'XL'],
            ],
            [
                'name' => 'Red-Blue Checkered Shirt',
                'description' => 'A red-blue checkered shirt built for casual layered outfits.',
                'price' => 25.00,
                'images' => [
                    ['url' => 'mens/ManRedBlueShirt.jpg', 'alt' => 'Red-Blue Checkered Shirt', 'position' => 1],
                ],
                'tags' => ['Red', 'Blue', 'Cotton', 'Mens', 'S', 'M'],
            ],

            // Placeholders
            [
                'name' => 'Navy Oxford Shirt',
                'description' => '',
                'price' => 34.99,
                'images' => [
                    ['url' => 'mens/ManTshirtWhite.jpg', 'alt' => 'Navy Oxford Shirt', 'position' => 1],
                ],
                'tags' => ['Dark Blue', 'Cotton', 'Mens', 'M', 'L'],
            ],
            [
                'name' => 'Stone Chino Trousers',
                'description' => '',
                'price' => 49.99,
                'images' => [
                    ['url' => 'mens/ManTshirtPink.jpg', 'alt' => 'Stone Chino Trousers', 'position' => 1],
                ],
                'tags' => ['Beige', 'Cotton', 'Mens', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Black Bomber Jacket',
                'description' => '',
                'price' => 89.99,
                'images' => [
                    ['url' => 'mens/ManTshirtGray.jpg', 'alt' => 'Black Bomber Jacket', 'position' => 1],
                ],
                'tags' => ['Black', 'Polyester', 'Mens', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Red Crewneck Sweatshirt',
                'description' => '',
                'price' => 29.99,
                'images' => [
                    ['url' => 'mens/ManSuitDarkBlue.jpg', 'alt' => 'Red Crewneck Sweatshirt', 'position' => 1],
                ],
                'tags' => ['Red', 'Cotton', 'Mens', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Blue Straight Jeans',
                'description' => '',
                'price' => 54.99,
                'images' => [
                    ['url' => 'mens/ManSuitBlack.jpg', 'alt' => 'Blue Straight Jeans', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'Mens', 'XS', 'S'],
            ],
            [
                'name' => 'Gray Wool Overcoat',
                'description' => '',
                'price' => 129.99,
                'images' => [
                    ['url' => 'mens/ManDressShirtRed.jpg', 'alt' => 'Gray Wool Overcoat', 'position' => 1],
                ],
                'tags' => ['Gray', 'Wool', 'Mens', 'L', 'XL'],
            ],
            [
                'name' => 'White Linen Shirt',
                'description' => '',
                'price' => 44.99,
                'images' => [
                    ['url' => 'mens/DressShirtPink.jpg', 'alt' => 'White Linen Shirt', 'position' => 1],
                ],
                'tags' => ['White', 'Linen', 'Mens', 'S', 'M'],
            ],
            [
                'name' => 'Black Formal Trousers',
                'description' => '',
                'price' => 59.99,
                'images' => [
                    ['url' => 'mens/ManRedHoodie.jpg', 'alt' => 'Black Formal Trousers', 'position' => 1],
                ],
                'tags' => ['Black', 'Polyester', 'Mens', 'M', 'L'],
            ],
            [
                'name' => 'Yellow Graphic Hoodie',
                'description' => '',
                'price' => 39.99,
                'images' => [
                    ['url' => 'mens/ManDenimCoat.jpg', 'alt' => 'Yellow Graphic Hoodie', 'position' => 1],
                ],
                'tags' => ['Yellow', 'Cotton', 'Mens', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Blue Denim Overshirt',
                'description' => '',
                'price' => 64.99,
                'images' => [
                    ['url' => 'mens/ManGrayJacket.jpg', 'alt' => 'Blue Denim Overshirt', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'Mens', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Pink Casual Shirt',
                'description' => '',
                'price' => 32.99,
                'images' => [
                    ['url' => 'mens/ManBeigeCoat.jpg', 'alt' => 'Pink Casual Shirt', 'position' => 1],
                ],
                'tags' => ['Pink', 'Cotton', 'Mens', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Gray Zip Hoodie',
                'description' => '',
                'price' => 42.99,
                'images' => [
                    ['url' => 'mens/ManDenimJeans1.jpg', 'alt' => 'Gray Zip Hoodie', 'position' => 1],
                ],
                'tags' => ['Gray', 'Cotton', 'Mens', 'XS', 'S'],
            ],
            [
                'name' => 'Dark Blue Tailored Blazer',
                'description' => '',
                'price' => 119.99,
                'images' => [
                    ['url' => 'mens/ManDenimJacket.jpg', 'alt' => 'Dark Blue Tailored Blazer', 'position' => 1],
                ],
                'tags' => ['Dark Blue', 'Wool', 'Mens', 'L', 'XL'],
            ],
            [
                'name' => 'White Tank Top',
                'description' => '',
                'price' => 16.99,
                'images' => [
                    ['url' => 'mens/ManTrousers.png', 'alt' => 'White Tank Top', 'position' => 1],
                ],
                'tags' => ['White', 'Cotton', 'Mens', 'S', 'M'],
            ],
            [
                'name' => 'Black Denim Jacket',
                'description' => '',
                'price' => 74.99,
                'images' => [
                    ['url' => 'mens/ManYellowHoodie.jpg', 'alt' => 'Black Denim Jacket', 'position' => 1],
                ],
                'tags' => ['Black', 'Denim', 'Mens', 'M', 'L'],
            ],
            [
                'name' => 'Beige Linen Trousers',
                'description' => '',
                'price' => 57.99,
                'images' => [
                    ['url' => 'mens/ManDenimJacket2.jpg', 'alt' => 'Beige Linen Trousers', 'position' => 1],
                ],
                'tags' => ['Beige', 'Linen', 'Mens', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Red Flannel Shirt',
                'description' => '',
                'price' => 35.99,
                'images' => [
                    ['url' => 'mens/ManGreyDressShirt.jpg', 'alt' => 'Red Flannel Shirt', 'position' => 1],
                ],
                'tags' => ['Red', 'Linen', 'Mens', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Gray Training Tee',
                'description' => '',
                'price' => 19.99,
                'images' => [
                    ['url' => 'mens/ManWhiteDressShirt.jpg', 'alt' => 'Gray Training Tee', 'position' => 1],
                ],
                'tags' => ['Gray', 'Polyester', 'Mens', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Blue Wool Cardigan',
                'description' => '',
                'price' => 69.99,
                'images' => [
                    ['url' => 'mens/ManWhiteBlueShirt.jpg', 'alt' => 'Blue Wool Cardigan', 'position' => 1],
                ],
                'tags' => ['Blue', 'Wool', 'Mens', 'XS', 'S'],
            ],
            [
                'name' => 'White Formal Shirt',
                'description' => '',
                'price' => 39.99,
                'images' => [
                    ['url' => 'mens/ManRedBlueShirt.jpg', 'alt' => 'White Formal Shirt', 'position' => 1],
                ],
                'tags' => ['White', 'Cotton', 'Mens', 'L', 'XL'],
            ],
            [
                'name' => 'Black Utility Vest',
                'description' => '',
                'price' => 49.99,
                'images' => [
                    ['url' => 'womens/beigeWomenTop.jpg', 'alt' => 'Black Utility Vest', 'position' => 1],
                ],
                'tags' => ['Black', 'Polyester', 'Mens', 'S', 'M'],
            ],
            [
                'name' => 'Beige Cotton Shorts',
                'description' => '',
                'price' => 26.99,
                'images' => [
                    ['url' => 'accessories/boots.jpg', 'alt' => 'Beige Cotton Shorts', 'position' => 1],
                ],
                'tags' => ['Beige', 'Cotton', 'Mens', 'M', 'L'],
            ],
            [
                'name' => 'Dark Blue Cargo Pants',
                'description' => '',
                'price' => 58.99,
                'images' => [
                    ['url' => 'mens/ManTshirtWhite.jpg', 'alt' => 'Dark Blue Cargo Pants', 'position' => 1],
                ],
                'tags' => ['Dark Blue', 'Cotton', 'Mens', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Yellow Rain Jacket',
                'description' => '',
                'price' => 84.99,
                'images' => [
                    ['url' => 'mens/ManTshirtWhite.jpg', 'alt' => 'Yellow Rain Jacket', 'position' => 1],
                ],
                'tags' => ['Yellow', 'Polyester', 'Mens', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Blue Slim Jeans',
                'description' => '',
                'price' => 52.99,
                'images' => [
                    ['url' => 'mens/ManTshirtPink.jpg', 'alt' => 'Blue Slim Jeans', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'Mens', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Gray Linen Shirt',
                'description' => '',
                'price' => 41.99,
                'images' => [
                    ['url' => 'mens/ManTshirtGray.jpg', 'alt' => 'Gray Linen Shirt', 'position' => 1],
                ],
                'tags' => ['Gray', 'Linen', 'Mens', 'XS', 'S'],
            ],
            [
                'name' => 'Red Cotton Polo',
                'description' => '',
                'price' => 28.99,
                'images' => [
                    ['url' => 'mens/ManSuitDarkBlue.jpg', 'alt' => 'Red Cotton Polo', 'position' => 1],
                ],
                'tags' => ['Red', 'Cotton', 'Mens', 'L', 'XL'],
            ],
            [
                'name' => 'Black Wool Coat',
                'description' => '',
                'price' => 139.99,
                'images' => [
                    ['url' => 'mens/ManSuitBlack.jpg', 'alt' => 'Black Wool Coat', 'position' => 1],
                ],
                'tags' => ['Black', 'Wool', 'Mens', 'S', 'M'],
            ],
            [
                'name' => 'White Oversized Tee',
                'description' => '',
                'price' => 21.99,
                'images' => [
                    ['url' => 'mens/ManDressShirtRed.jpg', 'alt' => 'White Oversized Tee', 'position' => 1],
                ],
                'tags' => ['White', 'Cotton', 'Mens', 'M', 'L'],
            ],
            [
                'name' => 'Pink Summer Shirt',
                'description' => '',
                'price' => 30.99,
                'images' => [
                    ['url' => 'mens/DressShirtPink.jpg', 'alt' => 'Pink Summer Shirt', 'position' => 1],
                ],
                'tags' => ['Pink', 'Linen', 'Mens', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Beige Wrap Dress',
                'description' => '',
                'price' => 69.99,
                'images' => [
                    ['url' => 'mens/ManRedHoodie.jpg', 'alt' => 'Beige Wrap Dress', 'position' => 1],
                ],
                'tags' => ['Beige', 'Linen', 'Womans', 'S', 'M', 'L'],
            ],
            [
                'name' => 'White Satin Blouse',
                'description' => '',
                'price' => 39.99,
                'images' => [
                    ['url' => 'mens/ManDenimCoat.jpg', 'alt' => 'White Satin Blouse', 'position' => 1],
                ],
                'tags' => ['White', 'Polyester', 'Womans', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Pink Knit Cardigan',
                'description' => '',
                'price' => 54.99,
                'images' => [
                    ['url' => 'mens/ManGrayJacket.jpg', 'alt' => 'Pink Knit Cardigan', 'position' => 1],
                ],
                'tags' => ['Pink', 'Wool', 'Womans', 'XS', 'S'],
            ],
            [
                'name' => 'Black Pencil Skirt',
                'description' => '',
                'price' => 44.99,
                'images' => [
                    ['url' => 'mens/ManBeigeCoat.jpg', 'alt' => 'Black Pencil Skirt', 'position' => 1],
                ],
                'tags' => ['Black', 'Polyester', 'Womans', 'L', 'XL'],
            ],
            [
                'name' => 'Blue Denim Midi Skirt',
                'description' => '',
                'price' => 49.99,
                'images' => [
                    ['url' => 'mens/ManDenimJeans1.jpg', 'alt' => 'Blue Denim Midi Skirt', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'Womans', 'S', 'M'],
            ],
            [
                'name' => 'Red Evening Dress',
                'description' => '',
                'price' => 119.99,
                'images' => [
                    ['url' => 'mens/ManDenimJacket.jpg', 'alt' => 'Red Evening Dress', 'position' => 1],
                ],
                'tags' => ['Red', 'Polyester', 'Womans', 'M', 'L'],
            ],
            [
                'name' => 'Gray Wool Coat',
                'description' => '',
                'price' => 129.99,
                'images' => [
                    ['url' => 'mens/ManTrousers.png', 'alt' => 'Gray Wool Coat', 'position' => 1],
                ],
                'tags' => ['Gray', 'Wool', 'Womans', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Yellow Linen Top',
                'description' => '',
                'price' => 32.99,
                'images' => [
                    ['url' => 'mens/ManYellowHoodie.jpg', 'alt' => 'Yellow Linen Top', 'position' => 1],
                ],
                'tags' => ['Yellow', 'Linen', 'Womans', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Dark Blue Wide-Leg Trousers',
                'description' => '',
                'price' => 59.99,
                'images' => [
                    ['url' => 'mens/ManDenimJacket2.jpg', 'alt' => 'Dark Blue Wide-Leg Trousers', 'position' => 1],
                ],
                'tags' => ['Dark Blue', 'Cotton', 'Womans', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'White Cotton Sundress',
                'description' => '',
                'price' => 64.99,
                'images' => [
                    ['url' => 'mens/ManGreyDressShirt.jpg', 'alt' => 'White Cotton Sundress', 'position' => 1],
                ],
                'tags' => ['White', 'Cotton', 'Womans', 'XS', 'S'],
            ],
            [
                'name' => 'Pink Pleated Skirt',
                'description' => '',
                'price' => 45.99,
                'images' => [
                    ['url' => 'mens/ManWhiteDressShirt.jpg', 'alt' => 'Pink Pleated Skirt', 'position' => 1],
                ],
                'tags' => ['Pink', 'Polyester', 'Womans', 'L', 'XL'],
            ],
            [
                'name' => 'Black Denim Jacket',
                'description' => '',
                'price' => 76.99,
                'images' => [
                    ['url' => 'mens/ManWhiteBlueShirt.jpg', 'alt' => 'Black Denim Jacket', 'position' => 1],
                ],
                'tags' => ['Black', 'Denim', 'Womans', 'S', 'M'],
            ],
            [
                'name' => 'Beige Trench Coat',
                'description' => '',
                'price' => 144.99,
                'images' => [
                    ['url' => 'mens/ManRedBlueShirt.jpg', 'alt' => 'Beige Trench Coat', 'position' => 1],
                ],
                'tags' => ['Beige', 'Cotton', 'Womans', 'M', 'L'],
            ],
            [
                'name' => 'Blue Floral Blouse',
                'description' => '',
                'price' => 37.99,
                'images' => [
                    ['url' => 'womens/beigeWomenTop.jpg', 'alt' => 'Blue Floral Blouse', 'position' => 1],
                ],
                'tags' => ['Blue', 'Cotton', 'Womans', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Gray Tailored Blazer',
                'description' => '',
                'price' => 92.99,
                'images' => [
                    ['url' => 'accessories/boots.jpg', 'alt' => 'Gray Tailored Blazer', 'position' => 1],
                ],
                'tags' => ['Gray', 'Wool', 'Womans', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Red Cotton Top',
                'description' => '',
                'price' => 24.99,
                'images' => [
                    ['url' => 'mens/ManTshirtWhite.jpg', 'alt' => 'Red Cotton Top', 'position' => 1],
                ],
                'tags' => ['Red', 'Cotton', 'Womans', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'White Linen Trousers',
                'description' => '',
                'price' => 58.99,
                'images' => [
                    ['url' => 'mens/ManTshirtWhite.jpg', 'alt' => 'White Linen Trousers', 'position' => 1],
                ],
                'tags' => ['White', 'Linen', 'Womans', 'XS', 'S'],
            ],
            [
                'name' => 'Black Evening Jumpsuit',
                'description' => '',
                'price' => 98.99,
                'images' => [
                    ['url' => 'mens/ManTshirtPink.jpg', 'alt' => 'Black Evening Jumpsuit', 'position' => 1],
                ],
                'tags' => ['Black', 'Polyester', 'Womans', 'L', 'XL'],
            ],
            [
                'name' => 'Pink Wool Sweater',
                'description' => '',
                'price' => 61.99,
                'images' => [
                    ['url' => 'mens/ManTshirtGray.jpg', 'alt' => 'Pink Wool Sweater', 'position' => 1],
                ],
                'tags' => ['Pink', 'Wool', 'Womans', 'S', 'M'],
            ],
            [
                'name' => 'Blue Skinny Jeans',
                'description' => '',
                'price' => 53.99,
                'images' => [
                    ['url' => 'mens/ManSuitDarkBlue.jpg', 'alt' => 'Blue Skinny Jeans', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'Womans', 'M', 'L'],
            ],
            [
                'name' => 'Yellow Summer Dress',
                'description' => '',
                'price' => 66.99,
                'images' => [
                    ['url' => 'mens/ManSuitBlack.jpg', 'alt' => 'Yellow Summer Dress', 'position' => 1],
                ],
                'tags' => ['Yellow', 'Cotton', 'Womans', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Beige Knit Vest',
                'description' => '',
                'price' => 38.99,
                'images' => [
                    ['url' => 'mens/ManDressShirtRed.jpg', 'alt' => 'Beige Knit Vest', 'position' => 1],
                ],
                'tags' => ['Beige', 'Wool', 'Womans', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Dark Blue Shirt Dress',
                'description' => '',
                'price' => 71.99,
                'images' => [
                    ['url' => 'mens/DressShirtPink.jpg', 'alt' => 'Dark Blue Shirt Dress', 'position' => 1],
                ],
                'tags' => ['Dark Blue', 'Cotton', 'Womans', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Gray Lounge Pants',
                'description' => '',
                'price' => 34.99,
                'images' => [
                    ['url' => 'mens/ManRedHoodie.jpg', 'alt' => 'Gray Lounge Pants', 'position' => 1],
                ],
                'tags' => ['Gray', 'Cotton', 'Womans', 'XS', 'S'],
            ],
            [
                'name' => 'Red Linen Blazer',
                'description' => '',
                'price' => 88.99,
                'images' => [
                    ['url' => 'mens/ManDenimCoat.jpg', 'alt' => 'Red Linen Blazer', 'position' => 1],
                ],
                'tags' => ['Red', 'Linen', 'Womans', 'L', 'XL'],
            ],
            [
                'name' => 'White Lace Top',
                'description' => '',
                'price' => 42.99,
                'images' => [
                    ['url' => 'mens/ManGrayJacket.jpg', 'alt' => 'White Lace Top', 'position' => 1],
                ],
                'tags' => ['White', 'Cotton', 'Womans', 'S', 'M'],
            ],
            [
                'name' => 'Black Wool Midi Dress',
                'description' => '',
                'price' => 83.99,
                'images' => [
                    ['url' => 'mens/ManBeigeCoat.jpg', 'alt' => 'Black Wool Midi Dress', 'position' => 1],
                ],
                'tags' => ['Black', 'Wool', 'Womans', 'M', 'L'],
            ],
            [
                'name' => 'Pink Cotton Hoodie',
                'description' => '',
                'price' => 46.99,
                'images' => [
                    ['url' => 'mens/ManDenimJeans1.jpg', 'alt' => 'Pink Cotton Hoodie', 'position' => 1],
                ],
                'tags' => ['Pink', 'Cotton', 'Womans', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Blue Linen Shorts',
                'description' => '',
                'price' => 31.99,
                'images' => [
                    ['url' => 'mens/ManDenimJacket.jpg', 'alt' => 'Blue Linen Shorts', 'position' => 1],
                ],
                'tags' => ['Blue', 'Linen', 'Womans', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Beige Cropped Jacket',
                'description' => '',
                'price' => 79.99,
                'images' => [
                    ['url' => 'mens/ManTrousers.png', 'alt' => 'Beige Cropped Jacket', 'position' => 1],
                ],
                'tags' => ['Beige', 'Polyester', 'Womans', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Black Oversized Hoodie',
                'description' => '',
                'price' => 49.99,
                'images' => [
                    ['url' => 'mens/ManYellowHoodie.jpg', 'alt' => 'Black Oversized Hoodie', 'position' => 1],
                ],
                'tags' => ['Black', 'Cotton', 'Unisex', 'XS', 'S'],
            ],
            [
                'name' => 'White Logo T-Shirt',
                'description' => '',
                'price' => 24.99,
                'images' => [
                    ['url' => 'mens/ManDenimJacket2.jpg', 'alt' => 'White Logo T-Shirt', 'position' => 1],
                ],
                'tags' => ['White', 'Cotton', 'Unisex', 'L', 'XL'],
            ],
            [
                'name' => 'Gray Relaxed Sweatshirt',
                'description' => '',
                'price' => 44.99,
                'images' => [
                    ['url' => 'mens/ManGreyDressShirt.jpg', 'alt' => 'Gray Relaxed Sweatshirt', 'position' => 1],
                ],
                'tags' => ['Gray', 'Cotton', 'Unisex', 'S', 'M'],
            ],
            [
                'name' => 'Blue Denim Utility Jacket',
                'description' => '',
                'price' => 84.99,
                'images' => [
                    ['url' => 'mens/ManWhiteDressShirt.jpg', 'alt' => 'Blue Denim Utility Jacket', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'Unisex', 'M', 'L'],
            ],
            [
                'name' => 'Red Track Pants',
                'description' => '',
                'price' => 42.99,
                'images' => [
                    ['url' => 'mens/ManWhiteBlueShirt.jpg', 'alt' => 'Red Track Pants', 'position' => 1],
                ],
                'tags' => ['Red', 'Polyester', 'Unisex', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Yellow Windbreaker',
                'description' => '',
                'price' => 74.99,
                'images' => [
                    ['url' => 'mens/ManRedBlueShirt.jpg', 'alt' => 'Yellow Windbreaker', 'position' => 1],
                ],
                'tags' => ['Yellow', 'Polyester', 'Unisex', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Beige Cargo Vest',
                'description' => '',
                'price' => 55.99,
                'images' => [
                    ['url' => 'womens/beigeWomenTop.jpg', 'alt' => 'Beige Cargo Vest', 'position' => 1],
                ],
                'tags' => ['Beige', 'Cotton', 'Unisex', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Dark Blue Crewneck',
                'description' => '',
                'price' => 39.99,
                'images' => [
                    ['url' => 'accessories/boots.jpg', 'alt' => 'Dark Blue Crewneck', 'position' => 1],
                ],
                'tags' => ['Dark Blue', 'Cotton', 'Unisex', 'XS', 'S'],
            ],
            [
                'name' => 'Pink Boxy Tee',
                'description' => '',
                'price' => 22.99,
                'images' => [
                    ['url' => 'mens/ManTshirtWhite.jpg', 'alt' => 'Pink Boxy Tee', 'position' => 1],
                ],
                'tags' => ['Pink', 'Cotton', 'Unisex', 'L', 'XL'],
            ],
            [
                'name' => 'Black Cargo Pants',
                'description' => '',
                'price' => 62.99,
                'images' => [
                    ['url' => 'mens/ManTshirtWhite.jpg', 'alt' => 'Black Cargo Pants', 'position' => 1],
                ],
                'tags' => ['Black', 'Cotton', 'Unisex', 'S', 'M'],
            ],
            [
                'name' => 'White Linen Overshirt',
                'description' => '',
                'price' => 57.99,
                'images' => [
                    ['url' => 'mens/ManTshirtPink.jpg', 'alt' => 'White Linen Overshirt', 'position' => 1],
                ],
                'tags' => ['White', 'Linen', 'Unisex', 'M', 'L'],
            ],
            [
                'name' => 'Gray Wool Beanie Set',
                'description' => '',
                'price' => 29.99,
                'images' => [
                    ['url' => 'mens/ManTshirtGray.jpg', 'alt' => 'Gray Wool Beanie Set', 'position' => 1],
                ],
                'tags' => ['Gray', 'Wool', 'Unisex', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Blue Relaxed Jeans',
                'description' => '',
                'price' => 59.99,
                'images' => [
                    ['url' => 'mens/ManSuitDarkBlue.jpg', 'alt' => 'Blue Relaxed Jeans', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'Unisex', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Red Plaid Overshirt',
                'description' => '',
                'price' => 46.99,
                'images' => [
                    ['url' => 'mens/ManSuitBlack.jpg', 'alt' => 'Red Plaid Overshirt', 'position' => 1],
                ],
                'tags' => ['Red', 'Cotton', 'Unisex', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Beige Sweat Shorts',
                'description' => '',
                'price' => 28.99,
                'images' => [
                    ['url' => 'mens/ManDressShirtRed.jpg', 'alt' => 'Beige Sweat Shorts', 'position' => 1],
                ],
                'tags' => ['Beige', 'Cotton', 'Unisex', 'XS', 'S'],
            ],
            [
                'name' => 'Dark Blue Raincoat',
                'description' => '',
                'price' => 93.99,
                'images' => [
                    ['url' => 'mens/DressShirtPink.jpg', 'alt' => 'Dark Blue Raincoat', 'position' => 1],
                ],
                'tags' => ['Dark Blue', 'Polyester', 'Unisex', 'L', 'XL'],
            ],
            [
                'name' => 'Yellow Graphic Tee',
                'description' => '',
                'price' => 25.99,
                'images' => [
                    ['url' => 'mens/ManRedHoodie.jpg', 'alt' => 'Yellow Graphic Tee', 'position' => 1],
                ],
                'tags' => ['Yellow', 'Cotton', 'Unisex', 'S', 'M'],
            ],
            [
                'name' => 'Black Fleece Jacket',
                'description' => '',
                'price' => 69.99,
                'images' => [
                    ['url' => 'mens/ManDenimCoat.jpg', 'alt' => 'Black Fleece Jacket', 'position' => 1],
                ],
                'tags' => ['Black', 'Polyester', 'Unisex', 'M', 'L'],
            ],
            [
                'name' => 'White Wide-Leg Pants',
                'description' => '',
                'price' => 52.99,
                'images' => [
                    ['url' => 'mens/ManGrayJacket.jpg', 'alt' => 'White Wide-Leg Pants', 'position' => 1],
                ],
                'tags' => ['White', 'Cotton', 'Unisex', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Gray Denim Shirt',
                'description' => '',
                'price' => 48.99,
                'images' => [
                    ['url' => 'mens/ManBeigeCoat.jpg', 'alt' => 'Gray Denim Shirt', 'position' => 1],
                ],
                'tags' => ['Gray', 'Denim', 'Unisex', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Pink Sweatpants',
                'description' => '',
                'price' => 41.99,
                'images' => [
                    ['url' => 'mens/ManDenimJeans1.jpg', 'alt' => 'Pink Sweatpants', 'position' => 1],
                ],
                'tags' => ['Pink', 'Cotton', 'Unisex', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Blue Quilted Vest',
                'description' => '',
                'price' => 64.99,
                'images' => [
                    ['url' => 'mens/ManDenimJacket.jpg', 'alt' => 'Blue Quilted Vest', 'position' => 1],
                ],
                'tags' => ['Blue', 'Polyester', 'Unisex', 'XS', 'S'],
            ],
            [
                'name' => 'Red Pullover Hoodie',
                'description' => '',
                'price' => 47.99,
                'images' => [
                    ['url' => 'mens/ManTrousers.png', 'alt' => 'Red Pullover Hoodie', 'position' => 1],
                ],
                'tags' => ['Red', 'Cotton', 'Unisex', 'L', 'XL'],
            ],
            [
                'name' => 'Beige Linen Shirt',
                'description' => '',
                'price' => 43.99,
                'images' => [
                    ['url' => 'mens/ManYellowHoodie.jpg', 'alt' => 'Beige Linen Shirt', 'position' => 1],
                ],
                'tags' => ['Beige', 'Linen', 'Unisex', 'S', 'M'],
            ],
            [
                'name' => 'Black Minimal Tee',
                'description' => '',
                'price' => 20.99,
                'images' => [
                    ['url' => 'mens/ManDenimJacket2.jpg', 'alt' => 'Black Minimal Tee', 'position' => 1],
                ],
                'tags' => ['Black', 'Cotton', 'Unisex', 'M', 'L'],
            ],
            [
                'name' => 'White Cotton Hoodie',
                'description' => '',
                'price' => 51.99,
                'images' => [
                    ['url' => 'mens/ManGreyDressShirt.jpg', 'alt' => 'White Cotton Hoodie', 'position' => 1],
                ],
                'tags' => ['White', 'Cotton', 'Unisex', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Gray Tech Jacket',
                'description' => '',
                'price' => 88.99,
                'images' => [
                    ['url' => 'mens/ManWhiteDressShirt.jpg', 'alt' => 'Gray Tech Jacket', 'position' => 1],
                ],
                'tags' => ['Gray', 'Polyester', 'Unisex', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Blue Everyday Shorts',
                'description' => '',
                'price' => 32.99,
                'images' => [
                    ['url' => 'mens/ManWhiteBlueShirt.jpg', 'alt' => 'Blue Everyday Shorts', 'position' => 1],
                ],
                'tags' => ['Blue', 'Cotton', 'Unisex', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Yellow Knit Sweater',
                'description' => '',
                'price' => 59.99,
                'images' => [
                    ['url' => 'mens/ManRedBlueShirt.jpg', 'alt' => 'Yellow Knit Sweater', 'position' => 1],
                ],
                'tags' => ['Yellow', 'Wool', 'Unisex', 'XS', 'S'],
            ],
            [
                'name' => 'Dark Blue Utility Shirt',
                'description' => '',
                'price' => 45.99,
                'images' => [
                    ['url' => 'womens/beigeWomenTop.jpg', 'alt' => 'Dark Blue Utility Shirt', 'position' => 1],
                ],
                'tags' => ['Dark Blue', 'Cotton', 'Unisex', 'L', 'XL'],
            ],
            [
                'name' => 'Black Leather Belt',
                'description' => '',
                'price' => 24.99,
                'images' => [
                    ['url' => 'accessories/boots.jpg', 'alt' => 'Black Leather Belt', 'position' => 1],
                ],
                'tags' => ['Black', 'Cotton', 'Accessories', 'S', 'M'],
            ],
            [
                'name' => 'Beige Canvas Tote',
                'description' => '',
                'price' => 29.99,
                'images' => [
                    ['url' => 'womens/beigeWomenTop.jpg', 'alt' => 'Beige Canvas Tote', 'position' => 1],
                ],
                'tags' => ['Beige', 'Cotton', 'Accessories', 'M', 'L'],
            ],
            [
                'name' => 'Gray Wool Scarf',
                'description' => '',
                'price' => 34.99,
                'images' => [
                    ['url' => 'mens/ManTshirtWhite.jpg', 'alt' => 'Gray Wool Scarf', 'position' => 1],
                ],
                'tags' => ['Gray', 'Wool', 'Accessories', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Blue Denim Cap',
                'description' => '',
                'price' => 19.99,
                'images' => [
                    ['url' => 'mens/ManTshirtPink.jpg', 'alt' => 'Blue Denim Cap', 'position' => 1],
                ],
                'tags' => ['Blue', 'Denim', 'Accessories', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Red Knit Beanie',
                'description' => '',
                'price' => 17.99,
                'images' => [
                    ['url' => 'mens/ManTshirtGray.jpg', 'alt' => 'Red Knit Beanie', 'position' => 1],
                ],
                'tags' => ['Red', 'Wool', 'Accessories', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'White Cotton Socks',
                'description' => '',
                'price' => 8.99,
                'images' => [
                    ['url' => 'mens/ManSuitDarkBlue.jpg', 'alt' => 'White Cotton Socks', 'position' => 1],
                ],
                'tags' => ['White', 'Cotton', 'Accessories', 'XS', 'S'],
            ],
            [
                'name' => 'Yellow Bucket Hat',
                'description' => '',
                'price' => 21.99,
                'images' => [
                    ['url' => 'mens/ManSuitBlack.jpg', 'alt' => 'Yellow Bucket Hat', 'position' => 1],
                ],
                'tags' => ['Yellow', 'Cotton', 'Accessories', 'L', 'XL'],
            ],
            [
                'name' => 'Dark Blue Backpack',
                'description' => '',
                'price' => 59.99,
                'images' => [
                    ['url' => 'mens/ManDressShirtRed.jpg', 'alt' => 'Dark Blue Backpack', 'position' => 1],
                ],
                'tags' => ['Dark Blue', 'Polyester', 'Accessories', 'S', 'M'],
            ],
            [
                'name' => 'Pink Hair Scarf',
                'description' => '',
                'price' => 14.99,
                'images' => [
                    ['url' => 'mens/DressShirtPink.jpg', 'alt' => 'Pink Hair Scarf', 'position' => 1],
                ],
                'tags' => ['Pink', 'Polyester', 'Accessories', 'M', 'L'],
            ],
            [
                'name' => 'Black Crossbody Bag',
                'description' => '',
                'price' => 49.99,
                'images' => [
                    ['url' => 'mens/ManRedHoodie.jpg', 'alt' => 'Black Crossbody Bag', 'position' => 1],
                ],
                'tags' => ['Black', 'Polyester', 'Accessories', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Beige Wool Gloves',
                'description' => '',
                'price' => 26.99,
                'images' => [
                    ['url' => 'mens/ManDenimCoat.jpg', 'alt' => 'Beige Wool Gloves', 'position' => 1],
                ],
                'tags' => ['Beige', 'Wool', 'Accessories', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Blue Canvas Wallet',
                'description' => '',
                'price' => 18.99,
                'images' => [
                    ['url' => 'mens/ManGrayJacket.jpg', 'alt' => 'Blue Canvas Wallet', 'position' => 1],
                ],
                'tags' => ['Blue', 'Cotton', 'Accessories', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Gray Travel Pouch',
                'description' => '',
                'price' => 22.99,
                'images' => [
                    ['url' => 'mens/ManBeigeCoat.jpg', 'alt' => 'Gray Travel Pouch', 'position' => 1],
                ],
                'tags' => ['Gray', 'Polyester', 'Accessories', 'XS', 'S'],
            ],
            [
                'name' => 'Red Canvas Belt',
                'description' => '',
                'price' => 16.99,
                'images' => [
                    ['url' => 'mens/ManDenimJeans1.jpg', 'alt' => 'Red Canvas Belt', 'position' => 1],
                ],
                'tags' => ['Red', 'Cotton', 'Accessories', 'L', 'XL'],
            ],
            [
                'name' => 'White Linen Bandana',
                'description' => '',
                'price' => 12.99,
                'images' => [
                    ['url' => 'mens/ManDenimJacket.jpg', 'alt' => 'White Linen Bandana', 'position' => 1],
                ],
                'tags' => ['White', 'Linen', 'Accessories', 'S', 'M'],
            ],
            [
                'name' => 'Black Wool Hat',
                'description' => '',
                'price' => 31.99,
                'images' => [
                    ['url' => 'mens/ManTrousers.png', 'alt' => 'Black Wool Hat', 'position' => 1],
                ],
                'tags' => ['Black', 'Wool', 'Accessories', 'M', 'L'],
            ],
            [
                'name' => 'Yellow Mini Tote',
                'description' => '',
                'price' => 27.99,
                'images' => [
                    ['url' => 'mens/ManYellowHoodie.jpg', 'alt' => 'Yellow Mini Tote', 'position' => 1],
                ],
                'tags' => ['Yellow', 'Cotton', 'Accessories', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Dark Blue Duffel Bag',
                'description' => '',
                'price' => 72.99,
                'images' => [
                    ['url' => 'mens/ManDenimJacket2.jpg', 'alt' => 'Dark Blue Duffel Bag', 'position' => 1],
                ],
                'tags' => ['Dark Blue', 'Polyester', 'Accessories', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Pink Cotton Socks',
                'description' => '',
                'price' => 9.99,
                'images' => [
                    ['url' => 'mens/ManGreyDressShirt.jpg', 'alt' => 'Pink Cotton Socks', 'position' => 1],
                ],
                'tags' => ['Pink', 'Cotton', 'Accessories', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Beige Straw-Style Hat',
                'description' => '',
                'price' => 23.99,
                'images' => [
                    ['url' => 'mens/ManWhiteDressShirt.jpg', 'alt' => 'Beige Straw-Style Hat', 'position' => 1],
                ],
                'tags' => ['Beige', 'Linen', 'Accessories', 'XS', 'S'],
            ],
            [
                'name' => 'Gray Laptop Sleeve',
                'description' => '',
                'price' => 39.99,
                'images' => [
                    ['url' => 'mens/ManWhiteBlueShirt.jpg', 'alt' => 'Gray Laptop Sleeve', 'position' => 1],
                ],
                'tags' => ['Gray', 'Polyester', 'Accessories', 'L', 'XL'],
            ],
            [
                'name' => 'Blue Knit Scarf',
                'description' => '',
                'price' => 33.99,
                'images' => [
                    ['url' => 'mens/ManRedBlueShirt.jpg', 'alt' => 'Blue Knit Scarf', 'position' => 1],
                ],
                'tags' => ['Blue', 'Wool', 'Accessories', 'S', 'M'],
            ],
            [
                'name' => 'Red Sport Bag',
                'description' => '',
                'price' => 54.99,
                'images' => [
                    ['url' => 'womens/beigeWomenTop.jpg', 'alt' => 'Red Sport Bag', 'position' => 1],
                ],
                'tags' => ['Red', 'Polyester', 'Accessories', 'M', 'L'],
            ],
            [
                'name' => 'White Canvas Cap',
                'description' => '',
                'price' => 18.99,
                'images' => [
                    ['url' => 'accessories/boots.jpg', 'alt' => 'White Canvas Cap', 'position' => 1],
                ],
                'tags' => ['White', 'Cotton', 'Accessories', 'XS', 'S', 'M'],
            ],
            [
                'name' => 'Black Boot Pair',
                'description' => '',
                'price' => 89.99,
                'images' => [
                    ['url' => 'mens/ManTshirtWhite.jpg', 'alt' => 'Black Boot Pair', 'position' => 1],
                ],
                'tags' => ['Black', 'Polyester', 'Accessories', 'S', 'M', 'L'],
            ],
            [
                'name' => 'Beige Drawstring Bag',
                'description' => '',
                'price' => 25.99,
                'images' => [
                    ['url' => 'mens/ManTshirtWhite.jpg', 'alt' => 'Beige Drawstring Bag', 'position' => 1],
                ],
                'tags' => ['Beige', 'Cotton', 'Accessories', 'M', 'L', 'XL'],
            ],
            [
                'name' => 'Gray Everyday Belt',
                'description' => '',
                'price' => 20.99,
                'images' => [
                    ['url' => 'mens/ManTshirtPink.jpg', 'alt' => 'Gray Everyday Belt', 'position' => 1],
                ],
                'tags' => ['Gray', 'Polyester', 'Accessories', 'XS', 'S'],
            ],
            [
                'name' => 'Blue Pattern Scarf',
                'description' => '',
                'price' => 28.99,
                'images' => [
                    ['url' => 'mens/ManTshirtGray.jpg', 'alt' => 'Blue Pattern Scarf', 'position' => 1],
                ],
                'tags' => ['Blue', 'Wool', 'Accessories', 'L', 'XL'],
            ],
            [
                'name' => 'Yellow Canvas Wallet',
                'description' => '',
                'price' => 15.99,
                'images' => [
                    ['url' => 'mens/ManSuitDarkBlue.jpg', 'alt' => 'Yellow Canvas Wallet', 'position' => 1],
                ],
                'tags' => ['Yellow', 'Cotton', 'Accessories', 'S', 'M'],
            ],
            [
                'name' => 'Pink Weekend Bag',
                'description' => '',
                'price' => 64.99,
                'images' => [
                    ['url' => 'mens/ManSuitBlack.jpg', 'alt' => 'Pink Weekend Bag', 'position' => 1],
                ],
                'tags' => ['Pink', 'Polyester', 'Accessories', 'M', 'L'],
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

        $newestProductDate = CarbonImmutable::parse('2022-05-10 12:00:00');

        foreach ($catalog as $productIndex => $productData) {
            $product = Product::query()->create([
                'name' => $productData['name'],
                'description' => $productData['description'],
                'price' => $productData['price'],
            ]);

            $product->forceFill([
                'created_at' => $newestProductDate->addDays($productIndex),
                'updated_at' => $newestProductDate->addDays($productIndex),
            ])->save();

            $product->images()->createMany($productData['images']);

            $product->tags()->sync(
                collect($productData['tags'])
                    ->map(fn (string $tagName): int => $tagIdsByName[$tagName])
                    ->all()
            );
        }
    }
}
