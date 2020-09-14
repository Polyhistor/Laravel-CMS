<x-admin-master>
    @section('content')
    Edit: {{ $permission->name }}

    @if(session('permission-updated'))
    <div class="alert alert-success">{{ session('permission-updated') }}</div>
    @endif

    <div class="row">
        <div class="col-sm-6">

            <h1>Edit Permission. {{ $permission->name }}</h1>

            <form method="post" action="{{ route('permissions.update', $permission->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name"></label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $permission->name }}">
                </div>

                <button class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>

    @endsection
</x-admin-master>
