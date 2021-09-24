@extends('user.layouts.app')

@section('content')
<div class="dashboard">
    <a class="btn btn-primary" href="{{ route('course.create') }}">
        <i class="bi bi-plus-square-fill"></i> Ajouter un cours
    </a>
    <section class="courses">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Proffesseur</th>
                    <th>Titre</th>
                    <th>Nombre des niveaux</th>
                    <th>Nombre des heurs</th>
                    <th>Date de creation</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>{{ App\Models\User::find($course->users_id)->firstName  }} {{ App\Models\User::find($course->users_id)->lastName  }}</td>
                    <td>{{ $course->name  }}</td>
                    <td>{{ App\Models\Level::where('courses_id','=',$course->id)->count() }}</td>
                    <td>{{ $course->hours  }}</td>
                    <td>{{ $course->created_at  }}</td>
                    <td>{{ $course->status  }}</td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $course->id  }}">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                        <div class="modal fade" id="delete{{ $course->id  }}" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteLabel">Suprimer le cours "{{ $course->name  }}"</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Vous êtes sûr</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Fremer</button>
                                        <form action="{{ route('course.destroy', ['id' => $course->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submite" class="btn primary-btn">Suprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#more{{ $course->id  }}">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <div class="modal fade" id="more{{ $course->id  }}" tabindex="-1" aria-labelledby="moreLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="moreLabel">{{ $course->name  }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            {{ $course->description }}
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Fermer</button>
                                        <a href="{{ route('course.show', ['id' => $course->id]) }}" class="btn primary-btn">Plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Staff</th>
                    <th>Title</th>
                    <th>Levels</th>
                    <th>Hours</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </section>
</div>
@endsection
