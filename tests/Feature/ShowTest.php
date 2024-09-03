<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ShowTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_leadbook_show_index()
    {
        Http::fake([
            'https://leadbook.ru/test-task-api/*' => Http::response([
                'response' => [
                    [
                        'id' => 1,
                        'name' => 'Show #1'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Show #2'
                    ]
                ]
            ])
        ]);

        $response = $this->get('api/shows');

        $this->assertEquals([
            'data' => [
                [
                    'id' => 1,
                    'name' => 'Show #1'
                ],
                [
                    'id' => 2,
                    'name' => 'Show #2'
                ]
            ]
        ], $response->json());
    }
}
