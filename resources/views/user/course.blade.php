@extends('user.layouts.app')

@section('content')
<div class="course">
    <section class="info">
        <div class="introduction">
            <video width="100%" controls>
                <source src="{{ asset($course->videoIntroPath) }}" type="video/mp4">
            </video>
        </div>
        <div class="information">
            <div class="videoInformation">
                <h1 class="title">{{ $course->name }}</h1>
                <p>{{ $course->description }}</p>
                <span class="date"><i class="bi bi-calendar3"></i>{{ $course->created_at }}</span>
                <span class="houres"><i class="bi bi-clock"></i>{{ $course->hours }}</span>
            </div>
        </div>
        <div class="action">
            @if($admin)
            <form action="{{ route('courseStatus.update', ['id' => $course->id]) }}" method="post">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <button type="submit" class="btn primary-btn" style="margin-bottom: 20px">Accepter</button>
            </form>
            @endif
            {{-- @if($id == $course->users_id) --}}
            <form action="{{ route('course.destroy', ['id' => $course->id]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submite" class="btn secondary-btn">Suprimer</button>
            </form>
            {{-- @endif --}}
        </div>
    </section>

    <section class="courseContents">
        {{-- @if($id == $course->users_id) --}}
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#level">
            <i class="bi bi-plus-square-fill"></i> Ajouter un niveau
        </button>
        {{-- @endif --}}
        <div class="modal fade" id="level" tabindex="-1" aria-labelledby="videoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videoLabel">Titre du niveau</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('level.store')}}" method="post">
                     @csrf
                    <div class="modal-body">
                        <input type="text" id="courses_id" name="courses_id" value="{{ $course->id }}">
                        <label for="level" class="form-label">Nom du niveaux</label>
                        <input type="text" class="form-control" id="level" name="level">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Close</button>
                        <button type="submite" class="btn primary-btn">Ajouter</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        @foreach ($levels as $level)
        <div class="level">
            <div class="header d-flex justify-content-between">
                <h3>{{ $level->name }}</h3>

                {{-- @if($id == $course->users_id) --}}
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#add{{ $level->id  }}">
                    <i class="bi bi-plus-square-fill"></i> Ajouter Lesson
                </button>
                {{-- @endif --}}
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
                                <input type="text" hidden value="{{ $course->id  }}" name="courses_id">
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
            <ul>
                @foreach (App\Models\Lesson::where('Levels_id','=',$level->id)->get() as $lesson)
                <li>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#video{{ $lesson->id }}">
                        <i class="bi bi-play-circle-fill"></i>{{ $lesson->name }}
                    </button>
                    <div class="modal fade" id="video{{ $lesson->id }}" tabindex="-1" aria-labelledby="videoLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoLabel">{{ $lesson->name }}</h5>
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
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </section>
</div>
@endsection
