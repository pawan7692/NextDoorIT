<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Category;

class CategoriesTest extends TestCase
{

    //use DatabaseMigrations;

    /**
     * Check no guest can access the category page.
     *
     * @return void
     */
    public function test_guest_cannot_access_categories()
    {
        $response = $this->get('/admin/categories')->assertRedirect('/login');
    }

    /**
     * Check only admin can create new categories.
     *
     * @return void
     */
    public function test_admin_can_create_new_Categories()
    {
        $this->adminSignIn();

        $category = Category::factory()->create()->toArray();

        $response = $this->post('/admin/categories', $category);

        $response->assertStatus(200);
     

    }
}
