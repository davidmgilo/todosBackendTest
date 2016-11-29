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

    protected $apiResult = '[{
"name": "Suscipit qui vitae voluptatem illo unde neque commodi.",
"done": true,
"priority": 5
},
{
    "name": "Quia et dolores et.",
"done": true,
"priority": 8
},
{
    "name": "Quaerat dicta aperiam unde dicta ut repellendus excepturi necessitatibus.",
"done": true,
"priority": 5
}]';

    public function __construct()
    {
        $this->mock = Mockery::mock('GuzzleHttp\Client');
    }


    public function tearDown()
    {
        Mockery::close();
    }

    /*
     * Overwrite createApplication to add Http Kernel
     * see: https://github.com/laravel/laravel/pull/3943
     *      https://github.com/laravel/framework/issues/15426
     */
    /**
     * TaskControllerTest constructor.
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Http\Kernel::class);

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * A basic test example.
     * @group todo
     * @return void
     */
    public function testExample()
    {
        // 1. Prepare
        // 1.1. Isolate
        // 2. Execute
        // 3. Comprovacions/assercions/shoulds/expectations

        $stream = \GuzzleHttp\Psr7\stream_for('{"data": '. $this->apiResult . ' }');

        $response = new \GuzzleHttp\Psr7\Response(
            200,
            ['Content-type' => 'application/json'],
            $stream
        );

        $this->login();
        $this->mock
            ->shouldReceive('request')
            ->once()
            ->andReturn($response);

        $this->app->instance('GuzzleHttp\Client',$this->mock);

        $response = $this->call('GET', '/tasks');
//        $response->content();
//        dd($response);
        $this->assertEquals(200, $response->status());

        $this->assertViewHas('tasks');


    }

    protected function login()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user);
    }
}
