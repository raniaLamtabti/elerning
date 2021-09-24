@extends('user.layouts.app')

@section('content')
<div class="dashboard">
    <section class="addUser">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
            <i class="bi bi-plus-square-fill"></i> Ajouter Utilisateur
        </button>
        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addLabel">Title of the course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="g-3" action="{{ route('user.store') }}" method="POST">
                        {{ csrf_field() }}
                    <div class="modal-body row">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">Premon</label>
                                <input type="text" class="form-control" id="firstName" name="firstName">
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="lastName" name="lastName">
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <div class="col-6">
                                <label for="phone" class="form-label">Numéro de telephone</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="col-6">
                                <label for="dateBirth" class="form-label">Date de naissance</label>
                                <input type="date" class="form-control" id="dateBirth" name="dateBirth">
                            </div>
                            <div class="col-md-6">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-select">
                                    <option value="0">Personnelle</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="role" class="form-label">Mots de pass</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn primary-btn">
                            {{ __('Register') }}
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="courses">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Date de naissance</th>
                    <th>Numero de telephone</th>
                    <th>Email</th>
                    <th>Nombre des cours</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->firstName }} {{ $user->lastName }}</td>
                    <td>{{ $user->dateBirth }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ App\Models\Course::where('users_id','=',$user->id)->count() }}</td>
                    <td>
                        @if($user->is_admin)
                        admin
                        @else
                        personnelle
                        @endif
                    </td>
                    <td>
                        @if (Auth::user()->is_admin)
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $user->id }}">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                        <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('user.destroy', ['id' => $user->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteLabel">Suprimer l'utilisateur "{{ $user->firstName }} {{ $user->lastName }}"</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Vous êtes sûr</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn primary-btn">Suprimer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <button type="button" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#update{{ $user->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <div class="modal fade" id="update{{ $user->id }}" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateLabel">Suprimer l'utilisateur "{{ $user->firstName }} {{ $user->lastName }}"</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('userRole.update', ['id' => $user->id]) }}" method="post">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="col-md-6">
                                            <label for="role" class="form-label">Role</label>
                                            <select id="role" name="role" class="form-select">
                                                <option value="0">Personnelle</option>
                                                <option value="1">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn primary-btn">Modifier</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#more{{ $user->id }}">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <div class="modal fade" id="more{{ $user->id }}" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteLabel">{{ $user->firstName }} {{ $user->lastName }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>{{ $user->description }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Fermer</button>
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
                    <th>Nom</th>
                    <th>Date de naissance</th>
                    <th>Numero de telephone</th>
                    <th>Email</th>
                    <th>Nombre des cours</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </section>
</div>
@endsection
