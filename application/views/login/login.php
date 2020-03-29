<div class="access">

<?php if($this->session->flashdata("danger")) : ?>
	<p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
<?php endif ?>

<?php if($this->session->flashdata("user_created")) : ?>
	<p class="alert alert-success"><?= $this->session->flashdata("user_created") ?></p>
<?php endif ?>

<?php if($this->session->flashdata("create_error")) : ?>
	<p class="alert alert-danger"><?= $this->session->flashdata("create_error") ?></p>
<?php endif ?>

<?php 
echo form_open($main_form); 
	echo form_input(array(
		"name" => "user",
		"id" => "user",
		"class" => "form-control",
		"maxlength" => 255,
		"placeholder" => "Nome de usuário"
		
	));
	echo form_password(array(
		"name" => "password",
		"id" => "password",
		"class" => "form-control",
		"maxlength" => 255,
		"placeholder" => "Senha"
	));
	echo form_button(array(
		"class" => "btn btn-primary btn-access",
		"type" => "submit",
		"content" => $btn_action 
	));
echo form_close();

echo "<p class=access-switch>" .
	$switch_info;
	echo anchor(site_url($switch_url), $switch_text, 'title="Cadastre-se"');
echo "</p>";
?>
</div>

