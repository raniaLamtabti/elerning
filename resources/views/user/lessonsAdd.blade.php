@extends('user.layouts.app')

@section('content')
<div class="profile">
    @foreach ($levels=App\Models\Level::where('courses_id','=',$id)->get() as $level)
    <div class="level d-flex justify-content-between">
        <h2>{{ $level->name }}</h2>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#add{{ $level->id  }}">
            <i class="bi bi-plus-square-fill"></i> Ajouter Lesson
        </button>
        <div class="modal fade" id="add{{ $level->id  }}" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteLabel">Ajouter un leçon pou le niveau "{{ $level->name  }}"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('lesson.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="text" hidden value="{{ $id  }}" name="courses_id">
                        <input type="text" hidden value="{{ $level->id  }}" name="levels_id">
                        <label for="name" class="form-label">Leçon titre</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <label for="videoPath" class="form-label">Leçon video</label>
                        <input type="file" class="form-control" id="videoPath" name="videoPath">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Fremer</button>
                        <button type="submite" class="btn primary-btn">Ajouter</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($lessons=App\Models\Lesson::where('levels_id','=',$level->id)->get() as $lesson)
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#video{{ $lesson->id }}">
        <i class="bi bi-play-circle-fill"></i>{{ $lesson->name }}
    </button>
    <div class="modal fade" id="video{{ $lesson->id }}" tabindex="-1" aria-labelledby="videoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoLabel">Title of video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <video width="100%" controls>
                        <source src="{{ asset($lesson->videoPath) }}" type="video/mp4">
                    </video>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('lesson.destroy', ['id' => $lesson->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submite" class="btn primary-btn">Suprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <br>
    @endforeach
</div>
@endsection
