<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\PuskesmasController;

class typeToolController extends PuskesmasController
{
    private $endpoint = 'http://103.150.93.112:8021/api/type-tool';
    public function index()
    {
        $response = Http::withToken($this->token)->get($this->endpoint);
        $tools = json_decode($response->body());
        return view('pitik', compact('tools'));
    }

    public function store(Request $request)
    {
        $response = Http::withToken($this->token)->post($this->endpoint, [
            'name' => $request->input('name')
        ]);

        return redirect()->back()->with('success', 'haha berhasil');
    }

    public function update(Request $request, $id)
    {
        $response = Http::withToken($this->token)->put("{$this->endpoint}/{$id}", [
            'name' => $request->input('name')
        ]);

        return redirect()->back()->with('success', 'haha');
    }

    public function delete($idTypeTool)
    {
        $response = Http::withToken($this->token)->delete($this->endpoint, [
            'id_type_tool' => $idTypeTool
        ]);
        // dd($response->status());
        return redirect()->back()->with('success', 'uraaa');
    }
}
