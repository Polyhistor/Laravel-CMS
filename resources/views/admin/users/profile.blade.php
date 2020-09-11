<x-admin-master>

    @section('content')

    <h1> {{ $user->name }} </h1>

    <div class="row">
        <div class="col-sm-6">
            <form method="post" action="{{ route('user.profile.update', $user) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4"><img height="100" class="img-profile rounded-circle" src="{{ $user->avatar }}" alt=""></div>

                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar">
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="" placeholder="enter username" value={{ $user->username }}>

                    @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid': '' }}" id="name" aria-describedby="" placeholder="enter name" value={{ $user->name }}>

                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid': '' }}" id="email" aria-describedby="" placeholder="enter email" value={{ $user->email }}>

                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid': '' }}" id="password" aria-describedby="" placeholder="enter password">

                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirmation">Password Confirm</label>
                    <input type="password" name="password-confirmation" class="form-control {{ $errors->has('password-confirmation') ? 'is-invalid': '' }}" id="password-confirmation" aria-describedby="" placeholder="enter password">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    @endsection

</x-admin-master>
