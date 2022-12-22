<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){
        return response()->json([
            'clients' => Client::orderBy('fname')->get()
        ]);
    }

    public function show(Client $client){
        $client->load('loans');
        return response()->json($client);
    }

    public function store(Request $request){
        $request->validate([
            'fname' => 'string|required',
            'lname' => 'string|required',
            'age' => 'numeric|required',
            'address' => 'string|required'
        ]);

        $client = Client::create($request->all());

        return response()->json($client);
    }

    public function update(Client $client, Request $request){
        $client->update($request->all());

        return response()->json($client);
    }

    public function destroy(Client $client){
        $client->delete();
        return response()->json(['message' => 'Client has been deleted.']);
    }
}
