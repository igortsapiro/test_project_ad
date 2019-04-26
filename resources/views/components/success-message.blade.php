@if (session('message'))
    <div class="alert alert-success">
        <ul>
            <li>
                {{ session('message') }}
            </li>
        </ul>
    </div>
@endif