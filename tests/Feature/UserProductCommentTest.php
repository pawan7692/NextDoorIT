<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserProductCommentTest extends TestCase
{

    
    /** @test */
    public function test_guest_cannot_comment_on_products()
    {
        $this->json('POST', route('comment.save'))->assertStatus(401);
    }

    /** @test */
    public function test_validates_comments_required_fields()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->json('POST', route('user.product.comment.store'), [])
            ->assertJson(function(AssertableJson $json) {
                $json
                    ->has('errors');
            })
            ->assertStatus(422);
    }

    /** @test */
    public function test_user_can_adds_a_new_comment()
    {
        $user = User::factory()->create();
        $video = Product::factory()->create(['user_id' => $user->id]);

        $postData = [
            'user_id'  => $user->id,
            'product_id' => $video->id,
            'comment' => 'Nice Product',
        ];

        $this->actingAs($user)->json('POST', route('comment.store'), $postData)
            ->assertJson(function(AssertableJson $json) use ($postData) {
                $json
                    ->where('status', true)
                    ->etc();
            })->assertStatus(200);
    }
}
