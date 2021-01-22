@csrf
<div class="row">
    <div class="col-8">
        <div class="form-group">
            <label for="first_name">Voornaam:</label>
            <input type="text" name="first_name" id="first_name"
                   class="form-control @error('first_name') is-invalid @enderror"
                   placeholder="Voornaam"
                   value="{{ old('first_name', $user->first_name) }}">
            @error('first_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="last_name">Achternaam:</label>
            <input type="text" name="last_name" id="last_name"
                   class="form-control @error('last_name') is-invalid @enderror"
                   placeholder="Achternaam"
                   value="{{ old('last_name', $user->last_name) }}">
            @error('last_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="mail@mail.be"
                   value="{{ old('email', $user->email) }}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phonenumber">Telefoonnummer:</label>
            <input type="tel" name="phonenumber" id="phonenumber"
                   class="form-control @error('phonenumber') is-invalid @enderror"
                   placeholder="telefoonnummer"
                   value="{{ old('phonenumber', $user->phonenumber) }}">
            @error('phonenumber')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="adress">Adress:</label>
            <input type="text" name="adress" id="adress"
                   class="form-control @error('adress') is-invalid @enderror"
                   placeholder="Adress"
                   value="{{ old('adress', $user->adress) }}">
            @error('adress')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="city">Gemeente:</label>
            <input type="text" name="city" id="city"
                   class="form-control @error('city') is-invalid @enderror"
                   placeholder="stad"
                   value="{{ old('city', $user->city) }}">
            @error('city')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <p>
            <button type="submit" id="submit" class="btn btn-success">Medewerker opslaan</button>
        </p>
    </div>

</div>