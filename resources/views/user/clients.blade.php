@extends('user.layouts.app')

@section('content')
<div class="dashboard">
    <section class="courses">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Plan</th>
                    <th>Début du plan</th>
                    <th>Fin du plan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->firstName }} {{ $client->lastName }}</td>
                    <td>{{ $client->email }}</td>
                    <td>

                        @if(App\Models\Plan::where('clients_id','=',$client->id)->count() != 0)
                        {{ App\Models\Plan::where('clients_id','=',$client->id)->orderBy('id', 'desc')->first()->type }}
                        @endif
                    </td>
                    <td>@if(App\Models\Plan::where('clients_id','=',$client->id)->count() != 0)
                        {{ App\Models\Plan::where('clients_id','=',$client->id)->orderBy('id', 'desc')->first()->created_at }}
                        @endif</td>
                    <td>@if(App\Models\Plan::where('clients_id','=',$client->id)->count() != 0)
                        {{ App\Models\Plan::where('clients_id','=',$client->id)->orderBy('id', 'desc')->first()->finale_date }}
                        @endif</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Plan</th>
                    <th>Début du plan</th>
                    <th>Fin du plan</th>
                </tr>
            </tfoot>
        </table>
    </section>
</div>
@endsection
