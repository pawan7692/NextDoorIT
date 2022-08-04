<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Testing\Fluent\AssertableJson;
use App\Models\Brand;
use Auth;
use Str;

class AdminBrandTest extends TestCase
{
    use WithFaker;
    /**
     * Testing that only admin can access the page. The other user or guest might redirect to login page
     *
     * @return void
     */
    public function test_guest_cannot_access_brand_page()
    {
        $response = $this->get('/admin/brands')->assertRedirect('admin/login');;
    }

    /** @test */
    public function test_validates_brands_required_fields()
    {
        $admin = $this->adminSignIn();
        $this->actingAs($admin)->json('POST', route('admin.brands.store'), [])
            ->assertJson(function (AssertableJson $json) {
                $json
                ->has('errors')
                    ->etc();
            })
            ->assertStatus(422);
    }

    /**
     * Check only admin can add new brands.
     *
     * @return void
     */
    public function test_admin_can_create_new_brands()
    {
        $admin = $this->adminSignIn();

       // $brand = Brand::factory()->create();
        
        $postData = [
            'brand_name' => $this->faker->name(),
            'status' =>1,
        ];

        $response = $this->actingAs($admin)->json('POST', route('admin.brands.store'), $postData)->assertStatus(200);

    }
}
