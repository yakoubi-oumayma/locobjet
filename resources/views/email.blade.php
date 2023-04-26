<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @php
        $user_id = 1;
    @endphp
    <form action="{{ route('sentEmail') }}" method="post">

        @csrf

        <div class="row mt-3">
            <div class="col-md-12">
                <label class="labels">Content</label>
                <input type="text" name="content" class="form-control">
            </div>
        </div>
        <input type="hidden" name="user_id" value="{{ $user_id }}">



        <div class="mt-5 text-center">
            <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
        </div>


        @method('put')
    </form>
</body>

</html>
