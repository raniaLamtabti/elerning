@extends('user.layouts.app')

@section('content')
    <div class="dashboard">
        <section class="statistics">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Number Of Courses</h5>
                    <p class="card-text">{{ $coursesCount  }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Number Of Clients</h5>
                    <p class="card-text">{{ $clientsCount  }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Number Of Staffs</h5>
                    <p class="card-text">{{ $staffsCount  }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Number Of Admins</h5>
                    <p class="card-text">{{ $adminsCount  }}</p>
                </div>
            </div>
        </section>
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
                                            <p>Vous ??tes s??r</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Fremer</button>
                                            {{-- <form action="{{ route('course.destroy', ['id' => $course->id]) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submite" class="btn primary-btn">Suprimer</button>
                                            </form> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($admin)
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#accept{{ $course->id  }}">
                                <i class="bi bi-check"></i>
                            </button>
                            <div class="modal fade" id="accept{{ $course->id  }}" tabindex="-1" aria-labelledby="acceptLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="acceptLabel">Accepte le cours "{{ $course->name  }}"</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Vous ??tes s??r</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Fermer</button>
                                            <form action="{{ route('courseStatus.update', ['id' => $course->id]) }}" method="post">
                                                <input type="hidden" name="_method" value="PUT">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn primary-btn">Accepter</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
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
