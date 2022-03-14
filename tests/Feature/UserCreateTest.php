<?php

namespace Tests\Feature;

use App\User;
use JetBrains\PhpStorm\ArrayShape;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabaseState;

class UserCreateTest extends TestCase
{
    public function a_new_user_is_created(){

        $this->postJson('/api/user', $this->data())->assertStartus(201);

        $this->assertCount(1, User::all());

        $this->json('GET', '/api/user/$user->id')->assertStartus(201)->assertJson([

            'data' => [

                'name' => "Name",
                'email' => "Name@email.com",
            ]
        ]);
    }

    #[ArrayShape(['name' => "string", 'email' => "string", 'password' => "string"])] private function data(): array
    {

        return[
            'name' => "Name",
            'email' => "Name@email.com",
            'password' => "password_example"
        ];
    }
}
