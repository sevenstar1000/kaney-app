<?php

use App\Http\Controllers\Api\QuotesController;
use App\Services\QuotesService;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

describe('Test all cases for quotes', function() {
    test('Testing quotes from Kanye API', function () {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. env('API_TOKEN'),
        ])->getJson('/api/quotes');

        expect($response->assertOk());
        $responseData = $response->json();
        expect($responseData['quotes'])->toBeArray()->toHaveCount(5);
    });

    test('refresh test', function() {
        $data = [
            'quotes' => [
                "I am the head of Adidas. I will bring Adidas and Puma back together and bring me and jay back together",
                "Life is the ultimate gift",
                "Artists are founders",
                "We are here to complete the revolution. We are building the future",
                "My first pillar when I'm on the board of adidas will be an adidas Nike collaboration to support community growth"
            ]
        ];

        $response = $response = $this->withHeaders([
            'Authorization' => 'Bearer '. env('API_TOKEN'),
        ])->postJson('/api/quotes/refresh', $data);

        $response->assertOk();
        $responseData = $response->json();
        expect($responseData['quotes'])->toBeArray()->toHaveCount(5);
    });

    test('API Token Authorisation missing test', function () {
        $response = $this->getJson('/api/quotes');

        $response->assertUnauthorized();
        $response->assertJson(['error' => 'Authorisation missing']);
    });
});
