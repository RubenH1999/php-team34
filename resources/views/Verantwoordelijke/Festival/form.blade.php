@csrf
<div class="row">
    <div class="col-8">
        <div class="form-group">
            <label for="name">Titel: </label>
            <input type="text" name="name" id="name"
                   class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                   placeholder="Titel"
                   value="{{ old('name', $festival->name) }}"
            >
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>


        <div class="form-group">
            <label for="description">descriptie: </label>
            <input type="text" name="description" id="description"
                   class="form-control"
                   placeholder="descriptie"
                   value="{{ old('description', $festival->description) }}"
            >
        </div>

        <div class="form-group">
            <label for="start_date">Start Datum</label>
            <input type="date" name="start_date" id="start_date" class="form-control
                    {{ $errors->first('start_date') ? 'is-invalid' : '' }}"
                   minlength="3"
                   maxlength="255"
                   required

                   value="{{ old('start_date', date('Y-m-d', strtotime($festival->start_date))) }}">


            <div class="invalid-feedback">{{ $errors->first('start_date') }}</div>



        </div>

        <div class="form-group">
            <label for="end_date">Eind datum</label>
            <input type="date" name="end_date" id="end_date" class="form-control
                    {{ $errors->first('end_date') ? 'is-invalid' : '' }}"
                   minlength="3"
                   maxlength="255"
                   required

                   value="{{ old('end_date', date('Y-m-d', strtotime($festival->end_date))) }}">
            <div class="invalid-feedback">{{ $errors->first('end_date') }}</div>


        </div>

        <div class="form-group">
            <label for="map">adres: </label>
            <input type="text" name="map" id="map"
                   class="form-control"
                   placeholder=""
                   value="{{ old('map', $festival->map) }}"
            >
        </div>



        <p>
            <button type="submit" id="submit" class="btn btn-success">Festival opslaan</button>
        </p>
    </div>

</div>

@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(2,3)}}
@endsection
