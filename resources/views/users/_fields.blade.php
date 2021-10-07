{{ csrf_field() }}

<div class="col-md-6 form-group mb-3">
    <label for="cod">Nombre de usuario</label>
    <input class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" type="text"/>
</div>
<div class="col-md-6 form-group mb-3">
    <label for="code">Correo electronico</label>
    <input class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" type="email"/>
</div>

