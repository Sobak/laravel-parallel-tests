<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_creating_users(): void
    {
        User::factory()->count(50)->create();

        $this->assertDatabaseCount(User::class, 50);
    }

    public function test_user_can_have_posts(): void
    {
        $user = User::factory()->create();

        $posts = Post::factory()->count(10)->create(['user_id' => $user->id]);

        $this->assertSame($user->id, $posts->first()->user_id);
        $this->assertCount(10, $user->posts);
    }
}
