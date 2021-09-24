@extends('layouts.app')

@section('content')
<main class="pricing">
    <section class="hero">
        <div class="content">
            <h1 class="display">Obtenez la meilleure offre pour vous</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, eos. repellat libero sunt odit fugiat obcaecati in.</p>
        </div>
        <div class="image">
            <img src="{{ asset('siteImages/pricing.png')}}" alt=""/>
        </div>
    </section>
    <section class="pricingSection">
        <div class="card text-center">
            <div class="card-header">
                <h2>30$ / Month</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Get Access To All The Courses</h5>
                <p class="card-text">All the past and the future courses</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                </ul>
                @if (session()->get('LoggedClient'))
                <!-- Button trigger modal -->
                <button type="button" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#plan1">
                    Get Plan
                </button>

                <!-- Modal -->
                <div class="modal fade" id="plan1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">30$ / Month</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('plan.store') }}" method="post">
                            @csrf
                        <div class="modal-body row g-3">
                            <input type="text" hidden value="monthly" name="type">
                            <input type="text" hidden value="{{ $LoggedClientInfo['id'] }}" name="clients_id">
                            <div class="col-12">
                                <label for="cart" class="form-label">Numéro du cart</label>
                                <input type="text" class="form-control" id="cart" placeholder="0000 0000 0000 0000">
                            </div>
                            <div class="col-md-6">
                                <label for="date" class="form-label">Date d'exprirationail</label>
                                <input type="text" class="form-control" id="date" placeholder="MM/YY">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Code</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="****">
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                @else
                <a href="{{ route('authClient.login') }}" class="btn primary-btn">
                    Get Plan
                </a>
                @endif

            </div>
        </div>
        <div class="card text-center">
            <div class="card-header">
                <h2>100$ / Ans</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Get Access To All The Courses</h5>
                <p class="card-text">All the past and the future courses</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                </ul>
                @if (session()->get('LoggedClient'))
                <!-- Button trigger modal -->
                <button type="button" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#plan1">
                    Get Plan
                </button>

                <!-- Modal -->
                <div class="modal fade" id="plan1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('plan.store') }}" method="post">
                        @csrf
                            <div class="modal-body row g-3">
                                <input type="text" hidden value="annual" name="type">
                                <input type="text" hidden value="{{ $LoggedClientInfo['id'] }}" name="clients_id">
                                <div class="col-12">
                                    <label for="cart" class="form-label">Numéro du cart</label>
                                    <input type="text" class="form-control" id="cart" placeholder="0000 0000 0000 0000">
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="form-label">Date d'exprirationail</label>
                                    <input type="text" class="form-control" id="date" placeholder="MM/YY">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Code</label>
                                    <input type="password" class="form-control" id="inputPassword4" placeholder="****">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Confirmer</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                @else
                <a href="{{ route('authClient.login') }}" class="btn primary-btn">
                    Get Plan
                </a>
                @endif

            </div>
        </div>
        <div class="card text-center">
            <div class="card-header">
                <h2>900$ / Life</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Get Access To All The Courses</h5>
                <p class="card-text">All the past and the future courses</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                </ul>
                @if (session()->get('LoggedClient'))
                <!-- Button trigger modal -->
                <button type="button" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#plan1">
                    Get Plan
                </button>

                <!-- Modal -->
                <div class="modal fade" id="plan1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">

                        <form action="{{ route('plan.store') }}" method="post">
                            @csrf
                        <div class="modal-body row g-3">
                            <input type="text" hidden value="permanent" name="type">
                            <input type="text" hidden value="{{ $LoggedClientInfo['id'] }}" name="clients_id">
                            <div class="col-12">
                                <label for="cart" class="form-label">Numéro du cart</label>
                                <input type="text" class="form-control" id="cart" placeholder="0000 0000 0000 0000">
                            </div>
                            <div class="col-md-6">
                                <label for="date" class="form-label">Date d'exprirationail</label>
                                <input type="text" class="form-control" id="date" placeholder="MM/YY">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Code</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="****">
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                @else
                <a href="{{ route('authClient.login') }}" class="btn primary-btn">
                    Get Plan
                </a>
                @endif

            </div>
        </div>
    </section>
</main>
@endsection
