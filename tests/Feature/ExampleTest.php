<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */

    public function a_logged_in_users_can_access_the_users_route()
    {
$response=$this->get('/users')->assertForbidden();
    }

//    /** @test */
//
//    public function a_logged_in_user_can_buy_voucher()
//    {
//
//    }
}
