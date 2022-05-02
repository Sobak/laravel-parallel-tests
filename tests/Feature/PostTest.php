<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_creating_posts(): void
    {
        Post::factory()->count(50)->create();

        $this->assertDatabaseCount(Post::class, 50);
    }

    public function test_post_has_a_user(): void
    {
        $post = Post::factory()->create();

        $this->assertNotNull($post->user);
    }
}
