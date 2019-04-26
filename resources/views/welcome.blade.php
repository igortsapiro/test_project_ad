@extends('components.main')

@section('content')

    @guest
        @include('auth.login')
    @endguest
    
@endsection

