<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif; 
            background-color: whitesmoke;
        background-color: #007849;
        }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .container{
        padding-top: 50px; 
        padding-bottom: 50px;
        padding-right:50px;
        padding-left:50px;
        background-color: #3D3D3D;
        border-radius:20px;
        color:white;
      }
      .form-control{
        border-radius:10px;
      }
      label{
        font-size:12px;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/dist/css/floating-labels.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
    <form class="form-signin" method="POST" action="cek_login.php">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      </div>
  <div class="form-label-group">
    <input type="text" class="form-control" name= "username" placeholder="Masukkan Username Anda!" required autofocus>
    <label>Masukkan Username Anda!</label>
  </div>
  <div class="form-label-group">
    <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda!" required>
    <label>Masukkan Password Anda!</label>
  </div>

  <div class="form-label-group">
    <select class="form-control" name="level">
      <option value="Siswa">Siswa</option>
      <option value="Guru">Guru</option>
      <option value="Admin">Admin</option>
    </select>
  </div>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy;Desy Ayurianti 2021-<?= date('Y')?></p>
    </div>
</form>
</body>
</html>
