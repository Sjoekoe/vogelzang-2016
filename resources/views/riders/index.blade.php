@extends('layouts.auth')

@section('content')

    <my-riderstable></my-riderstable>

    @if(auth()->user()->isAdmin())
        <div class="row">
            <div class="col-sm-12">
                <riderstable></riderstable>
            </div>
        </div>
    @endif
@stop
