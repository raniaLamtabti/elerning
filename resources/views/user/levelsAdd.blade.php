@extends('user.layouts.app')

@section('content')
<div class="profile">
    <form class="row g-3" action="{{ route('level.store')}}" method="post">
        @csrf
        <input type="text" hidden value="{{ $id }}" name="courses_id">
        @for($i = 0; $i < $levelsNbr; $i++)
        <div class="col-md-12">
            <label for="level" class="form-label">Nom du niveaux {{ $i }}</label>
            <input type="text" class="form-control" id="level{{ $i }}" name="level[]">
        </div>
        @endfor
        <button class="btn primary-btn" type="submit">Ajouter les niveaux</button>
    </form>
</div>
@endsection
