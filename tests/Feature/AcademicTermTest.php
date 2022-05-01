<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AcademicTermTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_creating_academic_term()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->make();


        $this->actingAs($user, 'api');
        $data = [
            'startYear' => 2022,
            'endYear' => 2023
        ];

        $this->post('api/admin/academic-years', $data, ['HTTP_ACCEPT' => 'application/json']);

        $data = [
            'semName' => 'First Semester',
            'academicYearId' => 1
        ];

        $response = $this->post('api/admin/academic-terms', $data, ['HTTP_ACCEPT' => 'application/json']);
        $response->assertStatus(200);
    }

    public function test_creating_incorrect_academic_term()
    {

        $this->withoutExceptionHandling();
        $user = User::factory()->make();


        $this->actingAs($user, 'api');
        $data = [
            'startYear' => 2022,
            'endYear' => 2023
        ];

        $this->post('api/admin/academic-years', $data, ['HTTP_ACCEPT' => 'application/json']);

        $data = [
            'semName' => 'First Semester',
            'academicYearId' => 2
        ];

        $response = $this->post('api/admin/academic-terms', $data, ['HTTP_ACCEPT' => 'application/json']);
        $response->assertStatus(400);
    }
}
