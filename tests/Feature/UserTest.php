<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    public function test_password_is_hashed()
    {
        $user = User::create([
                'username' => 'User',
                'email' => 'user@gh.com',
                'password' => 'password',
            ]);

        $this->assertTrue(Hash::check('password', $user->password));
    }
}
