<x-admin-master>
    @section('content')
    <h1>Users</h1>

    <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Registered date</th>
                <th>Updated At</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Registered date</th>
                <th>Updated At</th>
                <th>Delete</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td> {{ $user->id }} </td>
                <td> {{ $user->username }} </td>
                <td> <img height="70" src="{{ $user->avatar }}" alt=""> </td>
                <td> {{ $user->name }} </td>
                <td> {{ $user->created_at->diffForHumans() }}</td>
                <td> {{ $user->updated_at->diffForHumans()  }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>



    @endsection


    @section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-scripts.js') }}"></script>
    @endsection
</x-admin-master>
