<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (isset($this->session->userdata['logged_in'])) {
header("location: ".base_url()."dologin");
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login YoutubeTool</title>
	<!-- Bootstrap -->
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
	<link rel="apple-touch-icon" href="<?php echo base_url()?>images/favicon_16.ico">
	<link rel="icon" type="image/png"  href="<?php echo base_url()?>images/favicon_16.ico">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url()?>images/favicon_16.ico">
	<meta name="theme-color" content="#ffffff">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	
	#main{
		width:310px;
		margin:5px auto;
		font-family:raleway;
	}

	span{
		color:red;
	}

	h2{
		background-color: #FEFFED;
		text-align:center;
		border-radius: 10px 10px 0 0;
		margin: -10px -40px;
		padding: 10px;
	}

	#login{
		width:300px;
		float: left;
		border-radius: 10px;
		font-family:raleway;
		border: 2px solid #ccc;
		padding: 10px 40px 25px;
		/*margin-top: 70px;*/
	}

	input[type=text],input[type=password], input[type=email]{
		width:99.5%;
		padding: 10px;
		margin-top: 8px;
		border: 1px solid #ccc;
		padding-left: 5px;
		font-size: 16px;
		font-family:raleway;
	}

	input[type=submit]{
		width: 100%;
		background-color:#FFBC00;
		color: white;
		border: 2px solid #FFCB00;
		padding: 10px;
		font-size:20px;
		cursor:pointer;
		border-radius: 5px;
		margin-bottom: 15px;
	}

	#profile{
		padding:50px;
		border:1px dashed grey;
		font-size:20px;
		background-color:#DCE6F7;
	}

	#logout{
		float:right;
		padding:5px;
		border:dashed 1px gray;
		margin-top: -168px;
	}

	a{
		text-decoration:none;
		color: cornflowerblue;
	}

	i{
	color: cornflowerblue;
	}

	.error_msg{
		color:red;
		font-size: 16px;
	}

	.message{
		position: absolute;
		font-weight: bold;
		font-size: 28px;
		color: #6495ED;
		left: 262px;
		width: 500px;
		text-align: center;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to YoutubeTool!</h1>

	<div id="body">
		<?php
		//$salt = '@#$sd$#2123';
		//echo MD5(MD5('123@abc'.$salt).$salt);
		if (isset($logout_message)) {
			echo "<div class='message'>";
			echo $logout_message;
			echo "</div>";
		}
		
		if (isset($message_display)) {
			echo "<div class='message'>";
			echo $message_display;
			echo "</div>";
		}
		?>
		<div id="main">
			<div id="login">
				<h2>Login Form</h2>
				<hr/>
				<?php echo form_open('dologin'); ?>
				<?php
				echo "<div class='error_msg'>";
					if (isset($error_message)) {
					echo $error_message;
				}
				echo validation_errors();
				echo "</div>";
				?>
				<div class="form-group">
					<label for="username">UserName:</label>
					<input type="text" name="username" id="name" class="form-control" placeholder="username"/>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="password" id="password" class="form-control" placeholder="**********"/>
				</div>
				<div class="form-group" style="text-align: center;">
					<button type="submit" class="btn btn-default">Login</button>
				</div>
				<?php echo form_close(); ?>
			</div>
			<div style="clear: both;"></div>
		</div>
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'YoutubeTool Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	<script src="<?php echo base_url()?>js/jquery-1.12.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
</div>

</body>
</html>