<?php

namespace Tests\Feature;

use App\User;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserDeleteTest extends TestCase
{
    use RefreshDatabase;

    public function a_user_is_deleted()
    {
        $user = factory(User::class)->create();

        $this->assertCount(1, User::all());

        $this->json('DELETE', "/api/user/$user->id" )->assertStatus(204);

        $this->assertCount(0, User::all());

    }

}
