@extends('layouts.auth')

@section('content')
    @if (auth()->user()->isAdmin())
        <birthdaytable></birthdaytable>
    @endif
    <userriderstable></userriderstable>
@stop
