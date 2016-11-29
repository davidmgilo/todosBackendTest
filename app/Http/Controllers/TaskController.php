<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $client;

    /**
     * TaskController constructor.
     * @param $client
     */
    public function __construct(Guzzle $client)
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
