<?php 
require('../../sql.php');
$sql = new sql();
if(isset($_POST['uname'])) {
  $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  $pass = crypt($pass, "KFGFPass");
  $user = $sql->get("select * FROM admin WHERE uname = \"". $uname. "\" and pass = \"". $pass. "\"");
  if(count($user)) {
    $_SESSION['id'] = $user[0]['id'];
    if($user[0]['rank'] == 'Admin') {
      $_SESSION['admin'] = true;
      echo('du är inloggad som admin');
    }
    if($user[0]['rank'] == 'Verksamhetschef') {
      $_SESSION['operator'] = true;
      echo('du är inloggad som verksamhetschef');
    }
    if($user[0]['rank'] == 'Föreståndare') {
      $_SESSION['director'] = true;
      echo('du är inloggad som föreståndare');
    }
    if($user[0]['rank'] == 'Fritidsledare'){
      $_SESSION['recreation'] = true;
      echo('du är inloggad som fritidsldare');
    }
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KFGF | Inloggning</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>KFGF</b>Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Logga in för att påbörja din dag.</p>

    <form action="#" method="post">
      <div class="form-group has-feedback">
        <input type="username" class="form-control" placeholder="Användarnamn" name="uname">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Lösenord" name="pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Håll mig inloggad
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Logga In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->

    <a href="#">Glömt lösenord</a><br>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>