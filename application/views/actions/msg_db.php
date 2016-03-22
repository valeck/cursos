<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Database</title>
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/normalize.css');?>">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<style type="text/css">

		.panel-heading
		{
			background-color: #fff;
		}

		.div_msg
		{

			margin-left: 5%;
			margin-right: 10%;
    		margin-top: 50px;
		}

		.div_shadow_red
		{
			box-shadow: 8px 8px 2px -3px #E80E0E;
			-webkit-box-shadow: 8px 8px 2px -3px #E80E0E;
			-moz-box-shadow: 8px 8px 2px -3px #E80E0E;
			-o-box-shadow: 8px 8px 2px -3px #E80E0E;
		}

		.div_shadow_green
		{
			box-shadow: 8px 8px 2px -3px #2AD408;
			-webkit-box-shadow: 8px 8px 2px -3px #2AD408;
			-moz-box-shadow: 8px 8px 2px -3px #2AD408;
			-o-box-shadow: 8px 8px 2px -3px #2AD408;
		}

		.div_shadow_yellow
		{
			box-shadow: 8px 8px 2px -3px #F2DF13;
			-webkit-box-shadow: 8px 8px 2px -3px #F2DF13;
			-moz-box-shadow: 8px 8px 2px -3px #F2DF13;
			-o-box-shadow: 8px 8px 2px -3px #F2DF13;
		}

		.div_shadow_blue
		{
			box-shadow: 10px 10px 2px -3px #1931E3;
			-webkit-box-shadow: 10px 10px 2px -3px #1931E3;
			-moz-box-shadow: 10px 10px 2px -3px #1931E3;
			-o-box-shadow: 10px 10px 2px -3px #1931E3;
		}


		.sprite 
		{
			background: url('../assets/images/glossy-data-icons-1.jpg') no-repeat 0 0;
			display: inline-block;
			width: 54px;
			height: 54px;
			padding: 26px; 
			float: right; 	

		}
		.sprite.badconection {
		    background-position-x: -352px;
		    background-position-y: -112px;
		}

		.sprite.tables{ 
		   	 background-position-x: -352px;
   			 background-position-x: 0px;
   		}

		.sprite.databaseOk{ 
   			 background-position-y: -55px;
   			 background-position-x: 0px;
		}

		.sprite.databaseBad{ 
			 background-position-x: -441px;
   			 background-position-y: 0px;
		}


</style>

<?php
switch ($tipo) {
	case 'badconection':
		$panel = "div_shadow_red";
		break;

	case 'databaseBad':
		$panel = "div_shadow_red";
		break;

	case 'databaseOk':
		$panel = "div_shadow_green";
		break;		
	default:
		# code...
		break;
}
?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="div_msg">
				<div class="panel panel-default <?=$panel?>">
					<div class="panel-heading">
						<img class="img-rounded sprite <?=$tipo?>"/>
						<h2 class="panel-title"><?=$header;?></h2>

					</div>
					<div class="panel-body">
					<center>
<?php foreach ($message as $value) {
	echo "<span>".$value."</span><br/>";
}?>
					</center>
  					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>