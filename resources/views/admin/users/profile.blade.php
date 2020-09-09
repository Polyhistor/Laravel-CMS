<x-admin-master>


    @section('content')

    <h1> {{ $user->name }} </h1>

    <div class="row">
        <div class="col-sm-6">
            <form method="post" action="" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="" placeholder="enter name" value={{ $user->name }}>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" aria-describedby="" placeholder="enter email" value={{ $user->email }}>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" aria-describedby="" placeholder="enter password">
                </div>

                <div class="form-group">
                    <label for="password-confirmation">Password Confirm</label>
                    <input type="password" name="password-confirmation" class="form-control" id="password-confirmation" aria-describedby="" placeholder="enter password">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    @endsection

</x-admin-master>
