<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <link rel="shortcut icon" href="/assets/img/favicon.png" sizes="32x32" type="image/png"> 
       
   
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <style>
      .box-login{
        display: block;
        margin: 0 auto;
        width: 30rem;      
        background-color: white;
      }

      .box-login .header-login{
        background-image: url('/assets/img/header_image-6920c61c.jpg');
        background-repeat: no-repeat;
        background-size: 100%;
         width: 100%;
         height: 20.7rem;
      }

      .box-login .form-login{
        background-color: rgb(255,255,255);
      }

      #icon-person-login{
        background-image: url('assets/icons/person-fill.svg') !important;
        background-repeat: no-repeat;
        background-size: 20px 20px;
        background-position: 10px 10px;
        padding: 8px 20px 8px 40px;
      }

      #icon-password-login{
        background-image: url('assets/icons/lock-fill.svg') !important;
        background-repeat: no-repeat;
        background-size: 20px 20px;
        background-position: 10px 10px;
        padding: 8px 20px 8px 40px;
      }

      .form-control:focus{
        outline: none;
        box-shadow: none;
      }
    </style>
       
    
    <title>Login</title>
    </head>
    <body style="background-image: url('/assets/img/bg_login-b0e1ddf9.jpg'); background-size:cover; background-position:center; background-repeat: no-repeat;
  background-attachment: fixed;" class="p-5 d-flex justify-content-center align-items-center">
      
      <div class="box-login">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="header-login">
          
        </div>
        <div class="form-login text-center py-3 px-5">
          <h3 class="mt-3 mb-4">USER LOGIN</h3>
          <form action="/auth" method="post">
            @csrf
            <div class="mb-3">
              <div class="input-group">
                <input type="text" class="form-control" id="icon-person-login" placeholder="Masukan NIP / NRP / Nomor Pegawai" aria-label="Username" aria-describedby="basic-addon1" autofocus name="username" value="{{old('username')}}">
              </div>
              @error('username')
                <div class="text-danger fs-6 fst-italic text-start">
                  {{$message}}
                </div>
              @enderror
            </div>
          <div class="mb-3">
            <div class="input-group">
              <input type="password" class="form-control" id="icon-password-login" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" name="password">
            </div>
            @error('password')
            <div class="text-danger fs-6 fst-italic text-start">
              {{$message}}
            </div>
          @enderror
          </div>
          <button class="btn btn-primary">Sign in</button>
        </form> 
        </div>
        
      </div>
    
                
      @include('sweetalert::alert')   
      <script src="{{url("assets/js/sweetalert2.js")}}"></script>
    <script src="{{url('assets/js/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="{{url("assets/js/sweetalert2.js")}}"></script>
    <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
    
</body>
</html>