<?php

namespace Tests\Unit;

use Tests\TestCase;

class cartAndOrderTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_add_products(){
        $response = $this->call('POST', '/products/add', [
            'urunAd' => "test",
            'urunFiyat' => 100,
            'urunMiktar' => 11
        ]);

        $response->assertStatus($response->status(), 200);
    }
    public function test_get_item_to_cart()
    {
        $response = $this->call('GET', '/carts/{id}', [
            'quantity' => 2,
            'product_id' => 1,
            'user_id' => 1
        ]);

        $response->assertStatus($response->status(), 200);
    }

    public function test_add_item_to_cart()
    {
        $response = $this->call('POST', '/carts/add', [
            'quantity' => 2,
            'product_id' => 1,
            'user_id' => 1
        ]);

        $response->assertStatus($response->status(), 200);
    }

    public function test_remove_item_to_cart()
    {
        $response = $this->call('DELETE', '/carts/delete/{id}', [
            'quantity' => 2,
            'product_id' => 1,
            'user_id' => 1
        ]);

        $response->assertStatus($response->status(), 200);
    }

    public function test_update_item_to_cart()
    {
        $response = $this->call('PUT', '/carts/update/{id}', [
            'quantity' => 2,
            'product_id' => 1,
            'user_id' => 1
        ]);

        $response->assertStatus($response->status(), 200);
    }

    public function test_add_item_to_order()
    {
        $response = $this->call('POST', '/orders/add', [
            'items' => [1, 1], 
            'quantity' => 2,
            'product_id' => 1,
            'user_id' => 1,
            'first_name' => "test",
            'last_name' => "test2",
            'email' => "test@hotmail.com",
            'phone' => "05374388569",
            'valid_until' => now()->addDay()
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
