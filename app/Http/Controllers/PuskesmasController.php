<?php

namespace App\Http\Controllers;

use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $apiUrl = 'http://103.150.93.112:8021/api/user';
    private $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IlVTMjQwMTEzMSIsInVzZXJuYW1lIjoiYWRtaW4iLCJyb2xlIjoiYWRtaW4iLCJpc3MiOiJteS1hcHAiLCJleHAiOjE3MDU3NzYyNTYsImlhdCI6MTcwNTc3MjY1Nn0.loBaHnQU9PCe7OIFE-Do8jDR5nzeF3w1Tz8fElm20s0';
    public function index()
    {
        // reqres . in / api / users
        $response = Http::withToken($this->token)->get($this->apiUrl);
        $users = $response->json();
        return view('index', compact('users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $response = Http::withToken($this->token)->post($this->apiUrl, [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ]);
        // dd($response->json());

        return redirect()->back()->with('success', 'User added successfully.');
    }
    public function update(Request $request, Puskesmas $puskesmas, $id)
    {
        $response = Http::withToken($this->token)
            ->put("{$this->apiUrl}/{$id}", [
                'username' => $request->input('username'),
            ]);

        return redirect()->back()->with('success', 'berhasil cooy');
    }
    public function destroy(Puskesmas $puskesmas, $id)
    {
        $response = Http::withToken($this->token)->delete("{$this->apiUrl}/{$id}");
        dd($response->status());

        return redirect()->back()->with('success', 'berhasil menghapus cooy');
    }
}
