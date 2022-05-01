<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AcademicYearsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_can_create_academic_year()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->make();

        echo $user;

        $this->actingAs($user, 'api');
        $data = [
            'startYear' => 2022,
            'endYear' => 2023
        ];

        $response = $this->post('api/admin/academic-years', $data, ['HTTP_ACCEPT' => 'application/json']);
        $response->assertStatus(200);
    }
}
