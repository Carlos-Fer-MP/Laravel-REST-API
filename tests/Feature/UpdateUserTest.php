<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;

    public function a_user_is_updated()
    {
        $user = factory(User::class);

       $this->putJson("/api/user/$user->id", [
           'data' => [
               'name' => 'Name',
               'email' => 'Name@example.com'
           ]
       ])->assertStatus(200);

       $this->json('GET', "/api/user/$user->id")->assertStatus(200)->assertJson([
          'data' => [
              'name' => 'Name',
              'email' => 'Name@example.com',
              'emailVerifiedDate' => $user->emailVerifiedDate
          ]
       ]);
    }
}
