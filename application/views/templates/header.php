<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css">
			<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/common.css">
			<script type="text/javascript"src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
			<script src="https://kit.fontawesome.com/cdb13e6035.js" crossorigin="anonymous"></script>
			<title>Sistema de Apontamentos - Solides</title>
		</head>
		<body>
		<?php if(!$this->session->userdata('user_data')) : ?>
			<nav class="navbar fixed-top navbar-light bg-light">	
				<h1 style="margin:15px auto 15px auto; font-size:24px">Sistema de Apontamentos</h1>
			</nav>
			<div class="container" style="margin-top: 100px">
		<?php endif ?>
		<?php if($this->session->userdata('user_data')) : ?>
			<nav class="navbar fixed-top navbar-light bg-light">	
				<div class="container">
					<div style="width:200px; margin: 15px 0px 15px 0px">
						<img src="<?php echo base_url(); ?>public/img/solides_icon.png" alt="">
						<?php
							echo anchor(site_url('features'), "<i class='fas fa-clock' style='font-size:25px'></i>", array('title' => "Horários", 'class' => "feature-select"));
							echo anchor(site_url('features/history'), "<i class='fas fa-history' style='font-size:25px'></i>", array('title' => "Histórico", 'class' => "feature-select"));
						?>
					</div>
					<?php
						echo anchor(site_url('features/logout'), "<i class='fas fa-power-off' style='font-size:25px'></i>", 'title="Desconectar"');
					?>
				</div>
			</nav>
			
			
			<div class="container" style="margin-top: 100px">
			<h3>Bem vindo, <?php echo $_SESSION['user_data']['user'] ?>!</h3>
			<hr>
		<?php endif ?>
			