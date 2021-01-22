@csrf
<div class="row">
    <div class="col-8">
        <div class="form-group">
            <label for="name">Naam taak:</label>
            <input type="text" name="name" id="name"
                   class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                   placeholder="Naam taak"
                   value="{{ old('name', $task->name) }}"
                   >
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>


        <p>
            <button type="submit" id="submit" class="btn btn-success">Taak toevoegen</button>
        </p>
    </div>

</div>
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(4,1)}}
@endsection
