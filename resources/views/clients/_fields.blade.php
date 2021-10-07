{{ csrf_field() }}
<div class="col-md-6 form-group mb-3">
    <label for="cod">Codigo del cliente</label>
    <input class="form-control" id="cod" name="cod" value="{{ old('cod', $client->cod) }}" type="text"/>
</div>
<div class="col-md-6 form-group mb-3">
    <label for="code">Nombre del cliente</label>
    <input class="form-control" id="name" name="name" value="{{ old('cod', $client->name) }}" type="text"/>
</div>

<div class="col-md-12 form-group">
    <label for="city_id">Ciudada</label>
    <select name="city_id" id="city_id" class="form-control">
        <option value="">Selecciona una ciudad</option>
        @foreach($cities as $city)
            <option value="{{ $city->id }}"{{ old('city_id', $client->city->id) == $city->id ? ' selected' : '' }}>
                {{ $city->name }}
            </option>
        @endforeach
    </select>
</div>
