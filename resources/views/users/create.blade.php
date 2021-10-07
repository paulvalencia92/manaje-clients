@extends('layouts.app-auth')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Formulario registrar usuario</div>

                    @component('components.errors')@endcomponent

                    <form method="POST" action="{{ route('users.store') }}">

                        <div class="row">

                            @include('users._fields')


                            <div class="col-md-12 text-right mt-4">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
