<?php

$formSingin = array(
	'name'   => 'login',
	'id'     => 'login',
	'method' => 'Post',
);

$loginUser = array(
	'type'        => "text",
	'placeholder' => "Username",
	'class'       => "form-control top",
	'name'        => "usuario",
	'id'          => "usuario",
	'value'       => set_value('usuario')
);

$loginPass = array(
	'type'        => "password",
	'placeholder' => "Password",
	'class'       => "form-control bottom",
	'name'        => "password",
	'id'          => "password",
);

$loginSubmit = array(
	'class'   => "btn btn-lg btn-primary btn-block",
	'type'    => "submit",
	'content' => "Ingresar",
);

$formPassword = array(
	'name'   => 'passw',
	'id'     => 'passw',
	'method' => 'Post',
);

$recoverEmail = array(
	'type'        => "email",
	'placeholder' => "mail@domain.com",
	'class'       => "form-control",
);

$passSubmit = array(
	'class'   => "btn btn-lg btn-danger btn-block",
	'type'    => "submit",
	'content' => "Recupera Password",
);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title> Login </title>
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="<?=base_url('assets/img/metis-tile.png')?>" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="<?=base_url('assets/css/main.min.css')?>">
  </head>
  <body class="login">
    <div class="form-signin">
      <div class="text-center">
        <img src="<?=base_url('assets/img/logo.png')?>" alt="Metis Logo">
      </div>
      <hr>
      <div class="tab-content">
        <div id="login" class="tab-pane active">
<?php
echo '<p class="text-muted text-center">'.$respuesta.'</p>';
echo form_open('index.php/admin/login', $formSingin);
echo '<p class="text-muted text-center">Escriba su username y password</p>';
echo form_input($loginUser);
//echo form_error('usuario', '<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Tooltip on right">', '</button>');
echo form_input($loginPass);
//echo form_error('password', '<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Tooltip on right">', '</button>');
echo "<br>";
echo form_button($loginSubmit);
echo form_close();
?>
</div>
        <div id="forgot" class="tab-pane">
<?php
echo form_open('index.php/admin/password', $formPassword);
echo '<p class="text-muted text-center">Ingrese su correo e-mail</p>';
echo form_input($recoverEmail);
echo "<br>";
echo form_button($passSubmit);
echo form_close();
?>

        </div>
      </div>
      <hr>
      <div class="text-center">
        <ul class="list-inline">
          <li> <a class="text-muted" href="#login" data-toggle="tab">Ingresar</a>  </li>
          <li> <a class="text-muted" href="#forgot" data-toggle="tab">¿Olvido su Password?</a>  </li>
        </ul>
      </div>
    </div>

    <!--jQuery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!--Bootstrap -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      (function($) {
        $(document).ready(function() {

          $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          });

          $('.list-inline li > a').click(function() {
            var activeForm = $(this).attr('href') + ' > form';
            //console.log(activeForm);
            $(activeForm).addClass('animated fadeIn');
            //set timer to 1 seconds, after that, unload the animate animation
            setTimeout(function() {
              $(activeForm).removeClass('animated fadeIn');
            }, 1000);
          });
        });
      })(jQuery);
    </script>
  </body>
</html>