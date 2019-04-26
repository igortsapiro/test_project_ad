@extends('components.main')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    @if(empty($ad))
                        Create Ad
                    @else
                        Save Ad
                    @endif
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ !empty($ad) ? route('ad.update', ['ad' => $ad->id]) : route('ad.update', ['ad' => null])}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Title <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="title" required placeholder="Type title" value="@if(!empty($ad)){{ $ad->title }}@endif">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <textarea class="form-control" required name="description" rows="5" placeholder="Type description">@if(!empty($ad)){{ $ad->description }}@endif</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @if(empty($ad))
                                        Create
                                    @else
                                        Save
                                    @endif
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
