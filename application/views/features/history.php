
<div id="body">
	<h3>Histórico</h3>
	<div class="table-responsive">
		<table class="table">
		<thead>
			<tr>
				<th scope="col">Data</th>
				<th scope="col">Chegada na Empresa</th>
				<th scope="col">Sáida para Almoço</th>
				<th scope="col">Chegada do Almoço</th>
				<th scope="col">Saída da Empresa</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			for($i=0; $i<count($db_points); $i++){
				echo "<tr>
						<th>". $db_points[$i]->date ."</th>
						<td>". $db_points[$i]->company_in ."</td>
						<td>". $db_points[$i]->lunch_in ."</td>
						<td>". $db_points[$i]->lunch_out ."</td>
						<td>". $db_points[$i]->company_out ."</td>
					</tr>";
			}
			?>
		</tbody>
		</table>
	</div>
</div>
