@extends('layouts.template')

@section('title','Profiel bekijken')
@section('main')
    @include('shared.alert')
    <div class="container emp-profile">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <i class="fas fa-campground fa-5x " id="logonav"></i>
                        <h3>Festival 2020</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                           {{$user->first_name . " " . $user->last_name}}
                        </h5>
                        <h6>
                           {{ucfirst($user->type->name)}}
                        </h6>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-secondary"  id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Password</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="/profiel/{{$user->id}}" class="btn profile-edit-btn disabled">Edit profile</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>Useful links</p>
                        <a href="shifts">Uurrooster</a><br/>
                        <a href="tickets">Tickets</a><br/>
                        <a href="festival">Festival</a><br/>
                        <a href="news">Nieuws</a><br/>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form action="/profiel/{{$user->id}}" method="post">
                                @method('put')
                                @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Type</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ucfirst($user->type->name)}}</p>
                                </div>
                                </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="first_name" id="first_name"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           placeholder="Voornaam"
                                           value="{{ old('first_name', $user->first_name) }}">
                                    @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="last_name" id="last_name"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           placeholder="Achternaam"
                                           value="{{ old('last_name', $user->last_name) }}">
                                    @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                        <input type="email" name="email" id="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="mail@mail.be"
                                               value="{{ old('email', $user->email) }}">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" name="phonenumber" id="phonenumber"
                                           class="form-control @error('phonenumber') is-invalid @enderror"
                                           placeholder="telefoonnummer"
                                           value="{{ old('phonenumber', $user->phonenumber) }}">
                                    @error('phonenumber')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="adress" id="adress"
                                           class="form-control @error('adress') is-invalid @enderror"
                                           placeholder="Adress"
                                           value="{{ old('adress', $user->adress) }}">
                                    @error('adress')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="city" id="city"
                                           class="form-control @error('city') is-invalid @enderror"
                                           placeholder="Stad"
                                           value="{{ old('adress', $user->city) }}">
                                    @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        <p>
                            <button type="submit" id="submit" class="btn btn-success">Profiel opslaan</button>
                        </p>
                            </form>
                        </div>


                        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                            <form action="/profiel/{{$user->id}}" method="post">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="current_password">Current password</label>
                                    <input type="password" name="current_password" id="current_password"
                                           class="form-control @error('current_password') is-invalid @enderror"
                                           placeholder="Current password"
                                           value="{{ old('current_password') }}"
                                           required>
                                    @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">New password</label>
                                    <input type="password" name="password" id="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="New password"
                                           value="{{ old('password') }}"
                                           minlength="8"
                                           required>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm new password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                           class="form-control"
                                           placeholder="Confirm new password"
                                           value="{{ old('password_confirmation') }}"
                                           minlength="8"
                                           required>
                                </div>
                                <button type="submit" class="btn btn-success">Update password</button>
                            </form>
                        </div>

                    </div>
                    </div>
                </div>
                </div>



@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(1,3)}}
@endsection