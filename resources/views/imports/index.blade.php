@extends('layouts.app-auth')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Formulario registrar usuario</div>

                    @component('components.errors')@endcomponent

                    <form method="POST" action="{{ route('imports.store') }}" enctype="multipart/form-data">

                        <div class="row">
                            {{ csrf_field() }}

                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text" id="inputGroupFileAddon01">Upload</span></div>
                                <div class="custom-file">
                                    <input class="custom-file-input" name="file" id="inputGroupFile01" type="file" aria-describedby="inputGroupFileAddon01" />
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>


                            <div class="col-md-12 text-right mt-4">
                                <button type="submit" class="btn btn-primary">Importar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

