@extends("master.navbar")
@section("link-style")
    <link rel="stylesheet" href="{{ asset('assets/css/settings.css') }}">
@endsection
@section("content")
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">

                @foreach ($user_infos as $user)
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px"
                             src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <span class="font-weight-bold">{{ $user->username }}</span>
                        <span class="text-black-50">{{ $user->email }}</span>
                        <span> </span>

                    </div>
            </div>
            @endforeach

            <div class="col-md-9">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    @foreach ($user_infos as $user)
                        <form action="{{ route('user.update', ['user' => $user->user_id]) }}" method="post">
                            @csrf

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Username</label>
                                    <input type="text" name="username" class="form-control"
                                           placeholder="{{ $user->username }}">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">First Name</label>
                                    <input type="text" name="f_name" class="form-control"
                                           placeholder="{{ $user->f_name }}">
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Last Name</label>
                                    <input type="text" name="l_name" class="form-control"
                                           placeholder="{{ $user->l_name }}">
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Email</label>
                                    <input type="text" name="email" class="form-control"
                                           placeholder="{{ $user->email }}">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="mt-5 text-center">
                                <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                            </div>


                            @method('put')
                        </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script>
        $('.favorite').on('click', function() {
            $(this).toggleClass('active');
        });
    </script>







@endsection
