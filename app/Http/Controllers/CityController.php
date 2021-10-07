<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }


    public function create()
    {
        return view('cities.create');
    }


    public function store(CityRequest $request)
    {
        City::create(['name' => $request->name]);
        session()->flash("message", ["success", __("Ciudad creada satisfactoriamente")]);
        return redirect()->route('cities.index');
    }


    public function edit(City $city)
    {
        return view('cities.edit', compact('city'));
    }


    public function update(CityRequest $request, City $city)
    {
        $city->name = $request->name;
        $city->save();
        session()->flash("message", ["success", __("Ciudad actualizada satisfactoriamente")]);
        return redirect()->route('cities.index');
    }


    public function destroy(City $city)
    {
        if (request()->ajax()) {
            $city->delete();
            session()->flash("message", [
                "success",
                __("La ciudad :code ha sido eliminado correctamente", ["code" => $city->name])
            ]);
        }
    }
}
