<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_can_view_register_form()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_user_can_register_using_the_register_form() {

        $user = User::factory()->create()->toArray();

        $response = $this->post('/register', $user);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', $user);
    }
}
