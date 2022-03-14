<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabaseState;


class GetUserTest extends TestCase
{
 use RefreshDatabase;

 public function a_created_user_is_retrieved()
 {

        $this->assertCount(1, User::all());

        $user = User::first();

        $this->json('GET', '/api/user/$user->id')->assertStatus(200)->assertJson([

            'data' => [
                'name' => $user->name,
                'email' => $user->email,
                'emailVerifiedDate' => $user->emailVerifiedDate
            ]

        ]);



 }
}
