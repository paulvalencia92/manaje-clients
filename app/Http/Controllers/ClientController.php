<?php

namespace App\Http\Controllers;

use App\City;
use App\Client;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::paginate(10);
        return view('clients.index', compact('clients'));
    }


    public function create()
    {
        $cities = City::all();
        $client = new Client();
        return view('clients.create', compact('cities', 'client'));
    }


    public function store(ClientRequest $request)
    {
        Client::create([
            'cod' => $request->cod,
            'name' => $request->name,
            'city_id' => $request->city_id,
        ]);

        session()->flash("message", ["success", __("Cliente registrado satisfactoriamente")]);
        return redirect()->route('clients.index');
    }


    public function edit(Client $client)
    {
        $cities = City::all();
        return view('clients.edit', compact('cities', 'client'));
    }


    public function update(ClientRequest $request, Client $client)
    {

        $client->cod = $request->cod;
        $client->name = $request->name;
        $client->city_id = $request->city_id;
        $client->save();
        session()->flash("message", ["success", __("Cliente actualizado satisfactoriamente")]);
        return redirect()->route('clients.index');
    }


    public function destroy(Client $client)
    {
        if (request()->ajax()) {
            $client->delete();
            session()->flash("message", [
                "success",
                __("El cliente :client ha sido eliminado correctamente", ["client" => $client->name])
            ]);

        }
    }
}
