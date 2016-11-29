<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $client;

    protected $urlTodosBackend = "http://localhost:8082/api/v1/task";

    /**
     * TaskController constructor.
     * @param $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    public function index()
    {
        $tasks = [];

        $tasks = $this->client->request('GET',$this->urlTodosBackend);

        return view ('tasks')->with('tasks',$tasks);
    }
}
