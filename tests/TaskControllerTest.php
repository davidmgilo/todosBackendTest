<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class TaskControllerTest
 */
class TaskControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     * @group todo
     * @return void
     */
    public function testExample()
    {
        // 1. Prepare
        // 2. Execute
        // 3. Comprovacions/assercions/shoulds/expectations

        $this->login();

        $response = $this->call('GET', '/tasks');
//        $response->content();
        $this->assertEquals(200, $response->status());

        $this->assertViewHas('tasks');


    }

    protected function login()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user);
    }
}
