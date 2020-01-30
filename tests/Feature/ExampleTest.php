<?php

namespace Tests\Feature;

use App\User;
use App\Voucher;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
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

    public function a_logged_in_user_is_redirected_to_user_page_when_accessing_root()
    {

        $this->actingAs(factory(User::class)->create());
$response=$this->get('/')->assertRedirect('/home');
    }

//    /** @test */
//
//    public function a_logged_in_user_can_buy_voucher()
//    {
//
//    }

    /** @test */
    public function admin_can_generate_vouchers(){
        $this->actingAs(factory(User::class)->create());

        $response = $this->post('/',[
            'amount'=>2000,
            'number'=>3,
            'expiry'=>now(),
            'product'=>'product',

        ]);
        $this->assertCount(3,Voucher::all());
    }
}
