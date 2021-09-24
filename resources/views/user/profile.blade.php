@extends('user.layouts.app')

@section('content')
<div class="profile">
    <section class="profileSection">
        <div class="authorInformation">
            <img src="{{ asset($user->image) }}" alt="">
            <div class="info">
                <h4>{{ $user->firstName }} {{ $user->lastName }}</h4>
                <P>{{ $user->description }}</P>
            </div>
        </div>
        <form class="row g-3" action="{{ route('user.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <div class="col-md-6">
                <label for="firstName" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $user->firstName }}">
            </div>
            <div class="col-md-6">
                <label for="lastName" class="form-label">Nom</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $user->lastName }}">
            </div>
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $user->description }}</textarea>
            </div>
            <div class="col-6">
                <label for="phone" class="form-label">Numéro du telephone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
            </div>
            <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="col-6">
                <label for="dateBirth" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="dateBirth" name="dateBirth" value="{{ $user->dateBirth }}">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Mots de pass</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}">
            </div>
            <div class="col-md-12">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button class="btn primary-btn" type="submit">Update</button>
        </form>
    </section>
</div>
@endsection