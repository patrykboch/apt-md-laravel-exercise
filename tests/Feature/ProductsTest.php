<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    /**
     * Test if endpoint with products works fine
     */
    public function test_products_endpoint(): void
    {
        $response = $this->get('/api/products');
    
        $response->assertStatus(200);
    }

    public function test_pages()
    {
        $response = $this->get('/api/products?page=2');

        $data = [
            'products' => [
                'current_page' => 2
            ]    
        ];

        $response->assertJson($data);
    }
}
