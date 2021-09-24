@extends('layouts.app')

@section('content')
<div class="">
    <section class="introVideo">
        <div class="video">
            <video width="100%" controls>
                <source src="{{ asset($course->videoIntroPath) }}" type="video/mp4">
            </video>
        </div>
    </section>
    <div class="course">
        <section class="information">
            <div class="videoInformation">
                <h1 class="title">{{ $course->name }}</h1>
                <p>{{ $course->description }}</p>
                <span class="date"><i class="bi bi-calendar3"></i>{{ $course->created_at }}</span>
                <span class="houres"><i class="bi bi-clock"></i>{{ $course->hours }}</span>
            </div>
            <div class="authorInformation">
                <img src="{{ asset($user->image) }}" alt="">
                <div class="info">
                    <h4>{{ $user->firstName }} {{ $user->lastName }}</h4>
                    <P>{{ $user->description }}</P>
                </div>
            </div>
        </section>
        <section class="courseContents">

            @foreach ($levels as $level)
            <div class="level">
                <div class="header d-flex justify-content-between">
                    <h3>{{ $level->name }}</h3>
                </div>
                <ul>
                    @foreach (App\Models\Lesson::where('Levels_id','=',$level->id)->get() as $lesson)
                    <li>
                        @if (session()->get('LoggedClient'))
                            @if(App\Models\Plan::where('clients_id','=',session('LoggedClient'))->count() != 0)
                                @php( $plan = App\Models\Plan::where('clients_id','=',session('LoggedClient'))->orderBy('id', 'desc')->take(1)->get() )
                                @if($plan[0]['finale_date']>= Carbon\Carbon::now())
                                    <a href="{{ route('lesson.show', ['id' => $lesson->id]) }}" class="btn">
                                        <i class="bi bi-play-circle-fill"></i>{{ $lesson->name }}
                                    </a>
                                @else
                                    <a href="" class="btn">
                                        <i class="bi bi-play-circle-fill"></i>{{ $lesson->name }}
                                    </a>
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <div>
                                        Votre plan est terminer
                                        </div>
                                    </div>
                                @endif
                            @else
                            <a href="" class="btn">
                                <i class="bi bi-play-circle-fill"></i>{{ $lesson->name }}
                            </a>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    vous n'avez aucune plan
                                </div>
                            </div>
                            @endif
                        @else
                        <a href="{{ route('authClient.login') }}" class="btn">
                            <i class="bi bi-play-circle-fill"></i>{{ $lesson->name }}
                        </a>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </section>
    </div>
</div>
@endsection
