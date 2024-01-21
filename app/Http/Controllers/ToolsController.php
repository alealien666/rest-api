<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ToolsController extends PuskesmasController
{
    private $endpoint = 'http://103.150.93.112:8021/api/tool';
    public function index()
    {
        $response = Http::withToken($this->token)->get($this->endpoint);
        $apiTools = json_decode($response->body());


        return view('/tools', compact('apiTools'));
    }
}
