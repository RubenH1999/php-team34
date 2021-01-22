@csrf
<div class="row">
    <div class="col-8">
        <div class="form-group">
            <label for="name">Ticket naam: </label>
            <input type="text" name="ticket_name" id="ticket_name"
                   class="form-control"
                   placeholder="Titcket naam"
                   value="{{ old('ticket_name', $ticket->ticket_name) }}"
            >
        </div>


        <div class="form-group">
            <label for="name">prijs : </label>
            <input type="text" name="price" id="price"
                   class="form-control"
                   placeholder="0"
                   value="{{ old('price', $ticket->price) }}"
            >
        </div>

        <div class="form-group">
            <label for="name">maximum : </label>
            <input type="text" name="max_available" id="max_available"
                   class="form-control"
                   placeholder="0"
                   value="{{ old('max_available', $ticket->max_available) }}"
            >
        </div>


        <p>
            <button type="submit" id="submit" class="btn btn-success">Ticket updaten</button>
        </p>
    </div>

</div>

@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(2,3)}}
@endsection
