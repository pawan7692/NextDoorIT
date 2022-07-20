<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

use App\Models\Admin;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setup(): void {

    	parent::setUp();
    }

    public function adminSignIn($admin = null) {

    	$admin = $admin ?: Admin::factory()->create();

    	//Here second argument is the guard to decide with type of user to authenticate
    	$this->actingAs($admin, 'admin');

    	return $this;
    }
}
