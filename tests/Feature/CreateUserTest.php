<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_user_can_be_created() {

        // Arrange

        // Act
        $response = $this->post('/register', [
            'name' => 'Testy McTesterson',
            'email' => 'test@example.com',
            'password' => 'blahblah',
            'password_confirmation' => 'blahblah',
        ] );

        //Assert
        $response->assertRedirect( '/dashboard' );

        $this->assertDatabaseHas( 'users', [
            'name' => 'Testy McTesterson',
            'email' => 'test@example.com',
        ] );
    }

}
