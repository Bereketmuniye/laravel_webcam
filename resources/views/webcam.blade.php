<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Webcam Capture</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
            margin-bottom: 30px;
        }
        #results {
            width: 250px;
            height: 190px;
            border: 2px solid #007bff;
            background: #e9ecef;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #results img {
            width: 250px;
            height: 190px;
            border-radius: 5px;
        }
        .btn {
            width: 100%;
        }
        .form-control {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center">Webcam Image Capture</h1>

    <form method="POST" action="{{ route('webcam.capture') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Name" required />
                <input type="email" name="email" class="form-control" placeholder="Email Address" required />
                <input type="password" name="password" class="form-control" placeholder="Password" required />
                <input type="button" class="btn btn-primary" id="open_camera" value="Open Camera" />
                <div id="my_camera" class="d-none"></div>
                <input type="button" id="take_snap" value="Take Snapshot" onClick="take_snapshot()" class="d-none btn btn-info" />
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results" class="d-flex align-items-center justify-content-center"></div>
            </div>
            <div class="col-md-12 text-center">
                <button class="btn btn-success mt-3">Submit</button>
            </div>
        </div>
    </form>
</div>

<script>
    $("#open_camera").click(function() {
        $("#my_camera").removeClass('d-none');
        $("#take_snap").removeClass('d-none');

        Webcam.set({
            width: 500,
            height: 190,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');
    });

    function take_snapshot() {
        $("#my_camera").addClass('d-none');
        $("#take_snap").addClass('d-none');
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        });
    }
</script>

</body>
</html>