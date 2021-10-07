@extends('layouts.app-auth')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Formulario crear ciudad</div>
                    <form method="POST" action="{{ route('cities.update',$city) }}">
                        @component('components.errors')@endcomponent
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">Ciudad</label>
                                <input class="form-control" id="name" name="name" value="{{ old('name', $city->name) }}"
                                       type="text"
                                       placeholder="Ingresa el nombre de la ciudad"/>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
