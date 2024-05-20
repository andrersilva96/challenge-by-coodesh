<?php

namespace Tests\Feature;

use App\Models\Food;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;

class FoodApiTest extends TestCase
{
    use DatabaseMigrations;

    private $dataModel = [
        'id',
        'code',
        'status',
        'url',
        'creator',
        'product_name',
        'quantity',
        'brands',
        'categories',
        'labels',
        'cities',
        'purchase_places',
        'stores',
        'ingredients_text',
        'traces',
        'serving_size',
        'serving_quantity',
        'nutriscore_score',
        'nutriscore_grade',
        'main_category',
        'image_url',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function test_store_product_from_api()
    {
        $food = Food::factory()->create();
        $res = $this->get(route('api.products.store'));
        $res->assertJsonCount($food->id, 'data');
    }

    public function test_store_product_bulk_from_api()
    {
        Food::factory(2)->create();
        $res = $this->get(route('api.products.store'));
        $res->assertJsonCount(2, 'data');
    }

    // public function test_get_product_data_valid_format()
    // {
    //     $this->json('get', route('api.products.show', '0000000000017'))
    //         ->assertStatus(Response::HTTP_OK)
    //         ->assertJsonStructure(
    //             [
    //                 'data' => $this->dataModel
    //             ]
    //         );
    // }

    public function test_get_product_bulk_data_valid_format()
    {
        $this->json('get', route('api.products.index'))
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => $this->dataModel
                    ],
                    'links' => ['first', 'last', 'prev', 'next'],
                    'meta' => [
                        'current_page',
                        'from',
                        'last_page',
                        'links' => [
                            ['url', 'label', 'active'],
                            ['url', 'label', 'active'],
                            ['url', 'label', 'active']
                        ],
                        'path',
                        'per_page',
                        'to',
                        'total',
                    ]
                ]
            );
    }
}
