<x-admin-master>

    @section('content')

    @if(session('role-updated'))
    <div class="alert alert-success">{{ session('role-updated') }}</div>
    @endif

    <div class="row">
        <div class="col-sm-6">

            <h1>Edit role. {{ $role->name }}</h1>

            <form method="post" action="{{ route('roles.update', $role->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name"></label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $role->name }}">
                </div>

                <button class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            @if($permissions->isNotEmpty())

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Options</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Attach</th>
                        <th>Detach</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Options</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Attach</th>
                        <th>Detach</th>
                    </tr>
                </tfoot>
                <tbody>

                    @foreach($permissions as $permission)

                    <tr>
                        <td><input type="checkbox" @foreach($role->permissions as $role_permission)
                            @if($role_permission->slug == $permission->slug)
                            checked
                            @endif
                            @endforeach></td>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->slug }}</td>
                        <td>
                            <form method="post" action="{{ route('roles.permission.attach', $role) }}">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="permission" value="{{ $permission->id }}">
                                <button class="btn btn-primary" @if ($role->permissions->contains($permission)) disabled @endif>Attach</button>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="{{ route('roles.permission.detach', $role) }}">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="permission" value="{{ $permission->id }}">
                                <button class="btn btn-danger" @if (!$role->permissions->contains($permission)) disabled @endif>Detach</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>

            @endif

        </div>
    </div>

    @endsection

</x-admin-master>
