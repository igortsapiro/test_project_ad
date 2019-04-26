@extends('components.main')

@section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <span class="float-left">Ad #{{ $ad->id }}</span>
                    @guest
                        <!--nothing to do-->
                    @else
                        <a class="float-right nav-item nav-link p-1" href="{{ route('ad.edit', ['ad' => $ad->id]) }}">Edit Ad</a>
                     @endguest
                </div>

                <div class="card-body">

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Title</label>

                        <div class="col-md-6">
                            <label for="name" class="col-md-8 col-form-label text-md-left">{{ $ad->title }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                        <div class="col-md-6">
                            <label for="name" class="col-md-8 col-form-label text-md-left">{{ $ad->description }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Author Name</label>

                        <div class="col-md-6">
                            <label for="name" class="col-md-8 col-form-label text-md-left">{{ $ad->author_name }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Created At</label>

                        <div class="col-md-6">
                            <label for="name" class="col-md-8 col-form-label text-md-left">{{ date('d.m.Y H:i:s', strtotime($ad->created_at)) }}</label>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
