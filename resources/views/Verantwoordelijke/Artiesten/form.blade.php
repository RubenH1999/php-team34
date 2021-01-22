@csrf

<div class="row">
    <div class="col-8">
        <div class="form-group">
            <label for="name">Naam artiest:</label>
            <input type="text" name="name" id="name"
                   class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                   placeholder="Naam artiest"
                   value="{{ old('name', $artist->name) }}"

            >
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>
        <div class="form-group">
            <label for="name">Genre:</label>
            <input type="text" name="genre" id="genre"
                   class="form-control {{ $errors->first('genre') ? 'is-invalid' : '' }}"
                   placeholder="Genre"
                   value="{{ old('genre', $artist->genre) }}"
            >
            <div class="invalid-feedback">{{ $errors->first('genre') }}</div>
        </div>
        {{-- List van maken als de rest werkt --}}
        <div class="form-group">
            <label for="name">Rider:</label>
            <input type="text" name="rider" id="rider"
                   class="form-control"
                   placeholder="rider"
                   value="{{ old('rider', $artist->rider) }}"
            >
        </div>
        {{-- Datum & uur later nog opsplitsen, datum met date picker --}}


        <div class="form-group">
            <label for="spotify">Spotify URI: <a href="{!! url('/help#spotifyURI') !!}"><i class="fas fa-question-circle"></i></a></label>
            <input type="text" name="spotify" id="spotify"
                   class="form-control {{ $errors->first('spotify') ? 'is-invalid' : '' }}"
                   placeholder="Spotify URI"
                   value="{{ old('spotify', $artist->spotify) }}"
            >
            <div class="invalid-feedback">{{ $errors->first('spotify') }}</div>
        </div>
        <div class="form-group">
            <label for="img">Afbeelding link: <a href="{!! url('/help#afbeeldingLink') !!}"><i class="fas fa-question-circle"></i></a></label>
            <input type="text" name="img" id="img"
                   class="form-control {{ $errors->first('img') ? 'is-invalid' : '' }}"
                   placeholder="Afbeelding"
                   value="{{ old('img', $artist->img) }}">
            <div class="invalid-feedback">{{ $errors->first('img') }}</div>
        </div>



        <div class="form-group">
            <label for="name">Omscrijving:</label>
            <input type="text" name="description" id="description"
                   class="form-control {{ $errors->first('description') ? 'is-invalid' : '' }}"
                   placeholder="Omschrijving"
                   value="{{ old('description', $artist->description) }}">
            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
        </div>



        <p>
            <button type="submit" id="submit" class="btn btn-success">Artiest opslaan</button>
        </p>
    </div>

</div>
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(4,2)}}
@endsection
