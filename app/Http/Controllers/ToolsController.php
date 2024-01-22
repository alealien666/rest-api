<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ToolsController extends PuskesmasController
{
    private $endpoint = 'http://103.150.93.112:8021/api/tool';
    private $endpointTypeTools = 'http://103.150.93.112:8021/api/type-tool';
    public function index()
    {
        $response = Http::withToken($this->token)->get($this->endpoint);
        $apiTools = json_decode($response->body());

        $responsetype = Http::withToken($this->token)->get($this->endpointTypeTools);
        $types = json_decode($responsetype->body());


        return view('/tools', compact('apiTools', 'types'));
    }

    public function store(Request $request)
    {
        $response = Http::withToken($this->token)->post($this->endpoint,  [
            'name' => $request->input('name'),
            'id_type_tool' => $request->input('select')
        ]);
        // dd($response->json());

        return redirect()->back()->with('success', 'hahahah berhasil');
    }

    public function update(Request $request, $id)
    {
        $response = Http::withToken($this->token)->put("{$this->endpoint}/{$id}", [
            'name' => $request->input('name'),
            'id_type_tool' => $request->input('select')
        ]);


        return redirect()->back();
    }

    public function destroy($id)
    {
        $reponse = Http::withToken($this->token)->delete($this->endpoint, [
            'id_tool' => $id
        ]);

        return redirect()->back();
    }
}
