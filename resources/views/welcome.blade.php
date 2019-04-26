@extends('components.main')

@section('content')

    @guest
        @include('auth.login')
    @endguest

    @foreach($ads as $ad)
        <div class="row justify-content-center mt-3">
            <div class="col-md-5">
                <div class="card">

                    <div class="card-header">
                        <span class="float-left nav-item nav-link p-1">Ad №{{ $ad->id }}</span>

                        @guest
                            <!--nothing to do-->
                        @else
                            @if($user->id == $ad->user_id)
                                <a class="float-right nav-item nav-link p-1" href="{{ route('ad.delete', ['ad' => $ad->id]) }}" onclick="event.preventDefault();
                                                         document.getElementById('delete-ad').submit();">
                                    Delete Ad
                                </a>
                                <form id="delete-ad" action="{{ route('ad.delete', ['ad' => $ad->id]) }}" method="post" style="display: none;">
                                    @csrf
                                    {{ method_field('delete') }}
                                </form>
                            @endif

                            <a class="float-right nav-item nav-link p-1" href="{{ route('ad.edit', ['ad' => $ad->id]) }}">Edit Ad</a>
                        @endguest
                    </div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <label class="col-md-4 col-form-label text-md-left">
                                    <a href="{{ route('ad.show', ['ad' => $ad->id]) }}">{{ $ad->title }}</a>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <label class="col-md-8 col-form-label text-md-left">{{ $ad->description }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Author Name</label>

                            <div class="col-md-6">
                                <label class="col-md-8 col-form-label text-md-left">{{ $ad->author_name }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Created At</label>

                            <div class="col-md-6">
                                <label class="col-md-8 col-form-label text-md-left">{{ date('d.m.Y H:i:s', strtotime($ad->created_at)) }}</label>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <div class="row justify-content-center mt-3">
        <div class="col-md-5">
            <div class="form-group ">
                {{ $ads->links() }}
            </div>
        </div>
    </div>
    
@endsection

