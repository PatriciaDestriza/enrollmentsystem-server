<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_register_user()
    {
        $this->withoutExceptionHandling();

        $data = [
            'accountType' => 'admin',
            'universityID' => 2021,
            'firstName' => 'James',
            'middleName' => 'Baculanta',
            'lastName' => 'Jilhaney',
            'birthDate' => '2000-09-04',
            'address' => 'test address',
            'phoneNumber' => 'test phone number',
            'email' => 'test@email.com',
            'username' => 'test username',
            'password' => 'testpass',
        ];



        $response = $this->post('api/signup', $data);

        $user =  User::first();

        // echo var_dump($user);

        $response->assertStatus(200);
        $this->assertEquals('admin', $user['accountType']);
        $this->assertEquals(2021, $user['universityID']);
        $this->assertEquals('James', $user['firstName']);
        $this->assertEquals('Baculanta', $user['middleName']);
        $this->assertEquals('Jilhaney', $user['lastName']);
        $this->assertEquals('2000-09-04', $user['birthDate']);
        $this->assertEquals('test address', $user['address']);
        $this->assertEquals('test phone number', $user['phoneNumber']);
        $this->assertEquals('test@email.com', $user['email']);
        $this->assertEquals('test username', $user['username']);
    }

    public function test_student_cant_do_admin_taskts()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->make();

        echo $user;

        $this->actingAs($user, 'api');

        $data = [
            'startYear' => 2022,
            'endYear' => 2023
        ];

        $response = $this->post('api/academic-years', $data, ['HTTP_ACCEPT' => 'application/json']);
        $response->assertStatus(200);
    }
}
