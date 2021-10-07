@extends('layouts.app-auth')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Formulario registrar cliente</div>

                    @component('components.errors')@endcomponent

                    <form method="POST" action="{{ route('clients.store') }}">

                        <div class="row">


                        {{ csrf_field() }}


                            <div class="col-md-6 form-group mb-3">
                                <label for="cod">Codigo del cliente</label>
                                <input class="form-control" id="cod" name="cod" type="text"/>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="code">Nombre del cliente</label>
                                <input class="form-control" id="name" name="name" type="text"/>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="city_id">Ciudada</label>
                                <select name="city_id" id="city_id" class="form-control">
                                    <option value="">Selecciona una ciudad</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 text-right mt-4">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
