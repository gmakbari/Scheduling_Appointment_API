<?php

namespace Tests\Feature;
use App\Models\Clinician;
use App\Models\USer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test case for creating blocks of time correctly
     *
     * @return void
     */

    public function testsTimesAreCreatedCorrectly()
    {
        $user = User::find(2);
        $token = $user->createToken('test-token');
        $headers = ['Authorization' => "Bearer ".$token->plainTextToken];
        $payload = ['data' => [
                        [
                            'date'          => date("Y-m-d"),
                            'time'          => date("H:i"),
                            'clinician_id'  => 2
                        ]
                    ]
                ];

        $this->json('POST', '/api/create-time-block', $payload, $headers)
            ->assertStatus(200);
    }
}
