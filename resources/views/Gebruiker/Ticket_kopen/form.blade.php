@csrf


<div class="form-group row">
    <label for="last_name" class="col-md-4 col-form-label text-md-right">Last name</label>

    <div class="col-md-6">
        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $gebruiker->last_name) }}" required autocomplete="last_name" autofocus>

        @error('last_name')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="first_name" class="col-md-4 col-form-label text-md-right">first name</label>

    <div class="col-md-6">
        <input id="first_name" type="text" class="form-control @error('First_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $gebruiker->first_name) }}" required autocomplete="first_name" autofocus>

        @error('First_name')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">Email adress</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $gebruiker->email) }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="adress" class="col-md-4 col-form-label text-md-right">Adress</label>

    <div class="col-md-6">
        <input id="adress" type="text" class="form-control @error('Adress') is-invalid @enderror" name="adress" value="{{ old('adress ', $gebruiker->adress) }}"  autocomplete="adress" autofocus>

        @error('Adress')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

    <div class="col-md-6">
        <input id="city" type="text" class="form-control @error('City') is-invalid @enderror" name="city" value="{{ old('city', $gebruiker->city) }}"  autocomplete="city" autofocus>

        @error('City')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="phonenumber" class="col-md-4 col-form-label text-md-right">Phonenumber</label>

    <div class="col-md-6">
        <input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber', $gebruiker->phonenumber) }}"  autocomplete="phonenumber" autofocus>

        @error('phonenumber')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>
</div>
<h1>Winkelmand</h1>
<div class="row">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Qty</th>
                <th>Price</th>
                <th>Record</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach(Cart::getRecords() as $ticket)
                <tr>
                    <td>{{ $ticket['qty'] }}</td>
                    <td>€&nbsp;{{ $ticket['price'] }}</td>

                    <td class="recordCel">
                        {{ $ticket['naam']}}
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="/ticket_kopen/delete/{{ $ticket['id'] }}" class="btn btn-outline-secondary">-1</a>
                            <a href="/ticket_kopen/add/{{ $ticket['id'] }}" class="btn btn-outline-secondary">+1</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>

                </td>
                <td>
                    <p><b>Total</b>: € {{ Cart::getTotalPrice() }}</p>

                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<button type="submit" class="btn btn-success opslaan ">Buy</button>
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(3,1)}}
@endsection
