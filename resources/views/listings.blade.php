@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Latest Business Listings
                <a class="btn btn-primary btn-sm float-right" href="/dashboard">User's Dashboard</a>
            </div>

            <div class="card-body">
                @if (count($listings))
                <ul class="list-group">
                    @foreach ($listings as $listing)
                        <li class="list-group-item"><a href="/listings/{{$listing->id}}">{{$listing->name}}</a></li>
                    @endforeach
                </ul>
                @else
                    <p>No Listings Found</p>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
