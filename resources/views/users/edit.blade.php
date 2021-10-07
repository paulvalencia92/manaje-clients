@extends('layouts.app-auth')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Formulario actualizar usuarios</div>
                    <form method="POST" action="{{ route('users.update',$user) }}">
                        @component('components.errors')@endcomponent

                        {{ method_field('PUT') }}

                        <div class="row">

                            @include('users._fields')

                            <div class="col-md-12 text-right mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
