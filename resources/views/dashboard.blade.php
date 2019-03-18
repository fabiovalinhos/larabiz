@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Dashboard
                <span class="float-right">
                    <a href="/listings/create" class="btn btn-primary btn-sm">Add Listing</a>
                </span>
            </div>

            <div class="card-body">
                <h3>Your Listings</h3>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if (count($batatinhas))
                    <table class="table table-striped">
                        <tr>
                            <th>Company</th>
                            <th>Address</th>
                            <th>Website</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Bio</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($batatinhas as $listing)
                        <tr>
                            <td>{{$listing->name}}</td>
                            <td>{{$listing->address}}</td>
                            <td>{{$listing->website}}</td>
                            <td>{{$listing->email}}</td>
                            <td>{{$listing->phone}}</td>
                            <td>{{$listing->bio}}</td>
                            <td><a class="btn btn-secondary btn-sm" href="/listings/{{$listing->id}}/edit">Edit</a></td>
                            <td>
                                {!! Form::open(['action' => ['ListingsController@destroy', $listing->id], 'method' => 'POST', 'onsubmit' => 'return confirm ("Are you sure?")']) !!}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{Form::bsSubmit('Delete Listing', ['class' => 'btn btn-danger btn-sm'])}}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
