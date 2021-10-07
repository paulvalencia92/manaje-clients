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
                    <h4 class="card-title mb-3">Lista de clientes</h4>
                    <p>Due to the widespread use of tables across third-party widgets like calendars and date pickers,
                        we&rsquo;ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any<code>table
                            tag</code>, then extend with custom styles or our various included modifier classes.</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Nombre archivo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exports as $key => $value )
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->file_name }}</td>
                                    <td>
                                        <a class="btn btn-success" href="storage/exports/{{$value->file_name}}" download="">Descargar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $exports->links() }}


                    </div>
                </div>
            </div>
        </div>
        <!-- end of col-->
    </div>

@endsection

