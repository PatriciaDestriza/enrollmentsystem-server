<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class TeacherTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_teacher()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->make();


        $this->actingAs($user, 'api');
        $data = [
            'collegeName' => 'CCS',
            'collegeCode' => '1234'
        ];


        $this->post('api/admin/departments', $data, ['HTTP_ACCEPT' => 'application/json']);
        $data = [
            'firstName' => 'James',
            'middleName' => 'Baculanta',
            'lastName' => 'Jilhaney',
            'departmentID' => 1
        ];
        $response = $this->post('api/admin/teachers', $data, ['HTTP_ACCEPT' => 'application/json']);
        $response->assertStatus(200);
    }
}
