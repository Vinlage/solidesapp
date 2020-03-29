<script type="text/javascript">

$(document).ready(function(){
	$("#company_in").click(function(){
		insert_point('company_in');
	});
	$("#lunch_out").click(function(){
		insert_point('lunch_out');
	});
	$("#lunch_in").click(function(){
		insert_point('lunch_in');
	});
	$("#company_out").click(function(){
		insert_point('company_out');
	});
});

function insert_point(time){
	
	$.ajax({
		url: 'features/insert_point',
		type: 'POST',
		data: {time: time},
		error: function() {
			alert('Something is wrong');
		},
		success: function(data) {
			if(data=="Este apontamento já foi atribuído!" || data=="O apontamento anterior precisa estar atribuído!"){
				alert(data);
			}else{
				var i = document.getElementById('input_'+time);
				i.value = data;
				var b = document.getElementById(time);
				b.disabled = true;
			}
			
		}
	});
}

</script>
<div id="body">
	<h3>Horários</h3>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-3 points-col">
				<div class="points-elements">Chegada na Empresa</div>
				<div class="points-elements"><input class="points-input" type="text" id="input_company_in" value=<?php echo "'" . $db_points['company_in'] . "'" ?> disabled></div>
				<div class="points-elements"><button class="btn btn-primary btn-points" id="company_in" name="c_in" value="c_in" <?php if($db_points['company_in']){echo "disabled";} ?>>Apontar</button></div>
			</div>
			<div class="col-sm-3 points-col">
				<div class="points-elements">Saída para Almoço</div>
				<div class="points-elements"><input class="points-input" type="text" id="input_lunch_out" value=<?php echo "'" . $db_points['lunch_out'] . "'" ?> disabled></div>
				<div class="points-elements"><button class="btn btn-primary btn-points" id="lunch_out" name="l_out" value="l_out" <?php if($db_points['lunch_out']){echo "disabled";} ?> >Apontar</button></div>
			</div>
			<div class="col-sm-3 points-col">
				<div class="points-elements">Chegada do Almoço</div>
				<div class="points-elements"><input class="points-input" type="text" id="input_lunch_in" value=<?php echo "'" . $db_points['lunch_in'] . "'" ?> disabled></div>
				<div class="points-elements"><button class="btn btn-primary btn-points" id="lunch_in" name="l_in" value="l_in" <?php if($db_points['lunch_in']){echo "disabled";} ?>>Apontar</button></div>
			</div>
			<div class="col-sm-3 points-col">
				<div class="points-elements">Saída da Empresa</div>
				<div class="points-elements"><input class="points-input" type="text" id="input_company_out" value=<?php echo "'" . $db_points['company_out'] . "'" ?> disabled></div>
				<div class="points-elements"><button class="btn btn-primary btn-points" id="company_out" name="c_out" value="c_out" <?php if($db_points['company_out']){echo "disabled";} ?>>Apontar</button></div>
			</div>
		</div>
	</div>
</div>
