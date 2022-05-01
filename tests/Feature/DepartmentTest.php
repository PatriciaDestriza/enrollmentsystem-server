<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class DepartmentTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_department()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->make();


        $this->actingAs($user, 'api');
        $data = [
            'collegeName' => 'CCS',
            'collegeCode' => '1234'
        ];


        $response = $this->post('api/admin/departments', $data, ['HTTP_ACCEPT' => 'application/json']);
        $response->assertStatus(200);
    }

    public function test_duplicate_department()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->make();


        $this->actingAs($user, 'api');
        $data = [
            'collegeName' => 'CCS',
            'collegeCode' => '1234'
        ];


        $response = $this->post('api/admin/departments', $data, ['HTTP_ACCEPT' => 'application/json']);
        $data = [
            'collegeName' => 'CCS',
            'collegeCode' => '1234'
        ];


        $response = $this->post('api/admin/departments', $data, ['HTTP_ACCEPT' => 'application/json']);
        $response->assertStatus(400);
    }
}
