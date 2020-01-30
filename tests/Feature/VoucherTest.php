<?php

namespace Tests\Feature;

use App\User;
use App\Voucher;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;

class VoucherTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_all_users_can_access_homepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */

    public function a_logged_in_user_is_redirected_to_user_page_when_accessing_root()
    {

        $this->actingAs(factory(User::class)->create());
        $response = $this->get('/')->assertRedirect('/home');
    }

    /** @test */

    public function a_user_who_is_not_logged_in_cannot_access_user_page()
    {
        $response = $this->get('/user');
        $response->assertLocation('/login');
    }

    /** @test */

    public function a_user_who_is_logged_in_can_access_user_page()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/user');
        $response->assertStatus(200);
    }

    /** @test */
    public function logged_in_users_can_retrieve_active_vouchers()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/api/voucher/active');
        $response->assertSee('user_id')
            ->assertSee('id')
            ->assertSee('type')
            ->assertSee('code');

    }

    /** @test */
    public function unlogged_in_users_cannot_retrieve_active_vouchers()
    {

        $response = $this->get('/api/voucher/active');
        $response->assertStatus(302);

    }


    /** @test */
    public function logged_in_users_can_retrieve_their_vouchers()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/api/voucher/bought');
        $response->assertSee('user_id')
            ->assertSee('id')
            ->assertSee('type')
            ->assertSee('code');

    }

    /** @test */
    public function unlogged_in_users_cannot_retrieve_their_vouchers()
    {

        $response = $this->get('/api/voucher/bought');
        $response->assertStatus(302);

    }

}
