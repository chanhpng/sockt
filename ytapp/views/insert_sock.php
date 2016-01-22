<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (isset($this->session->userdata['logged_in'])) {
	$uname = ($this->session->userdata['logged_in']['loggeduser']);
	$email = ($this->session->userdata['logged_in']['email']);
} else {
	header("location: login.png");
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insert Sock</title>
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
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to YoutubeTool!</h1>

	<div id="body">
		<?php echo validation_errors(); ?>

		<?php echo form_open('setsock'); ?>
			<div class="form-group">
				<label for="socktype">Sock Type:</label>
				<select name="socktype">
					<option value="5">Sock 5</option>
					<option value="4">Sock 4</option>
				</select>
			</div>
			<div class="form-group">
				<label for="socklist">IP List:</label>
				<textarea class="form-control" rows="8" name="socklist"></textarea>
			</div>
			<?php
			if($rcode!='')
			{
				if($rcode=='success')
				{?>
				<div class="form-group">
					<label for="detail">Detail:</label>
					<div class="alert alert-success" role="alert">Add success: <?php echo number_format($response["success"])?></div>
					<div class="alert alert-danger" role="alert">Add error: <?php echo number_format($response["error"])?></div>
				</div>	
				<?php }else{?>
				<div class="form-group">
					<label for="detail">Detail:</label>
					<div class="alert alert-danger" role="alert">Please fill all fields!</div>
				</div>
				<?php }
			}
			?>
			<div class="form-group" style="text-align:center;">
				<button type="submit" class="btn btn-primary">Submit</button>
				<button type="reset" class="btn btn-default">Reset</button>
			</div>
		</form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'YoutubeTool Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	<script src="<?php echo base_url()?>js/jquery-1.12.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
</div>

</body>
</html>