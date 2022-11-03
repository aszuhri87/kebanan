<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

        <link rel="icon" href="{{asset('logo/icon.png')}}" type="image/x-icon">
        <link rel="shortcut icon" href="{{asset('logo/icon.png')}}" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <title>KEBANAN</title>
    </head>
    <body>

        <div class="d-flex justify-content-center align-items-center" style="width: 100vw; height: 100vh;">
            <div class="" width="400px">
                <center>
                    <img src="{{asset('logo/logo.png')}}" class="mb-4" width="250px" alt="">
                    <h1 class="text-success">KEBANAN</h1>
                </center>
                <div class="card m-3">
                    <div class="card-body bg-light" style="width:320px">
                        @if($errors->has('message'))
                            <div class="alert alert-danger mt-3" style="text-align: left;" role="alert">
                                {{ $errors->first('pesan') }}
                            </div>
                        @endif
                        <form action="{{url('admin/login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-secondary">Email</label>
                                <input type="email" name="email" class="form-control text-secondary" value="{{old("email")}}" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-secondary">Password</label>
                                <input type="password" name="password" class="form-control text-secondary" placeholder="Passsword">
                            </div>
                            <center>
                                <button type="submit" class="btn btn-success btn-save" style="border-radius: 50px;">Masuk</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script src="{{asset('js/jquery.blockUI.js')}}"></script>

        <script>
            $(document).ready(function() {


            $('.btn-save').click(function() {
                $.blockUI({
                    message:
                    '<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Mohon Tunggu...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
                    css: {
                    backgroundColor: 'transparent',
                    color: '#fff',
                    border: '0'
                    },
                    overlayCSS: {
                    opacity: 0.5
                    },
                    timeout: 1000,
                });
            });
        });
        </script>
    </body>
</html>
