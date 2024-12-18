<!DOCTYPE html>
<html>
<head>
    <title>Laravel webcam capture image and save from camera - Chirags.in</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>

<div class="container">
    <h1 class="text-center">Laravel webcam </h1>
    <div class="row">
        <div class="col-md-6">
            <p>Name : {{ $data->name }}</p>
            <p>Name : {{ $data->email }}</p>
        </div>
        <div class="col-md-6">
            <picture>
                <img src="{{ asset('storage/'.$data->photo_name) }}" class="img-fluid img-thumbnail" alt="User's image">
            </picture>
        </div>
    </div>
</div>

</body>
</html>
