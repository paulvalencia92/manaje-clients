@extends('layouts.app-auth')

@section('content')

    <!-- course section -->
    @push('css')
        <link rel="stylesheet" href="{{ asset("css/jConfirm.css") }}"/>
    @endpush


    <div class="row mb-4">
        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Lista de ciudades</h4>
                    <p>Due to the widespread use of tables across third-party widgets like calendars and date pickers,
                        we&rsquo;ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any<code>table
                            tag</code>, then extend with custom styles or our various included modifier classes.</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cantidad de clientes</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cities as $city)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $city->name }}</td>
                                    <td>5</td>
                                    <td>
                                        <a class="text-success mr-2" href="{{ route('cities.edit',$city->id) }}"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                        <a class="text-danger mr-2 delete-record"
                                           data-route="{{ route("cities.destroy", ["city" => $city]) }}"
                                           href="#">
                                            <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>



                        </table>

                        <div class="text-right">
                            <a href="{{ route('cities.create') }}" class="btn btn-primary">Registrar ciudad</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end of col-->
    </div>

@endsection
