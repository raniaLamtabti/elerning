@extends('user.layouts.app')

@section('content')
<div class="profile">
    <section class="profileSection">
        <form class="row g-3" action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label for="name" class="form-label">Titre</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="col-md-12">
                <label for="hours" class="form-label">Nombre des heurs</label>
                <input type="time" class="form-control" id="hours" name="hours">
            </div>
            <div class="col-md-12">
                <label for="videoIntroPath" class="form-label">video d'introduction</label>
                <input type="file" class="form-control" id="videoIntroPath" name="videoIntroPath">
            </div>
            <div class="col-md-12">
                <label for="image" class="form-label">Image du cours</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button class="btn primary-btn" type="submit">Crée un cours</button>
        </form>
    </section>
</div>
@endsection
