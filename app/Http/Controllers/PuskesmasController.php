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
    protected $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IlVTMjQwMTEzMSIsInVzZXJuYW1lIjoiYWRtaW4iLCJyb2xlIjoiYWRtaW4iLCJpc3MiOiJteS1hcHAiLCJleHAiOjE3MDU5MTQ1MTQsImlhdCI6MTcwNTkxMDkxNH0.G_DSS8uSQpHbl09E9zdAh6EIZAThtGTrbqwiCXNZrD8';
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
    public function update(Request $request, $id)
    {
        $response = Http::withToken($this->token)
            ->put("{$this->apiUrl}/{$id}", [
                'username' => $request->input('username'),
            ]);

        return redirect()->back()->with('success', 'berhasil cooy');
    }
    public function destroy($id_user)
    {
        $response = Http::withToken($this->token)->delete($this->apiUrl, [
            'id_user' => $id_user
        ]);
        dd($response->json());

        return redirect()->back()->with('success', 'berhasil menghapus cooy');
    }
}
