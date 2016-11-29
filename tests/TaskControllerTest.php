<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class TaskControllerTest
 */
class TaskControllerTest extends TestCase
{
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

        $response = $this->call('GET', '/tasques');
//        $response->content();
        $this->assertEquals(200, $response->status());


    }
}
