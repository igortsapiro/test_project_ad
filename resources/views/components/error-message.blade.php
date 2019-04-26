@if (count($errors) > 0)
    <div class="alert alert-danger div-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger div-danger">
        <ul>
            <li>
                {{ session('error') }}
            </li>
        </ul>
    </div>
@endif