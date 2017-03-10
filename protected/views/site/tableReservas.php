<table class="table">
	<tr>
		<th><a class="orderQuery" href="#orderId">#</a></th>
		<th><a class="orderQuery" href="#orderSpace">Espaço</a></th>
		<th><a class="orderQuery" href="#orderDate">Data</a></th>
	</tr>			
	<?php
		foreach ($reservas as $reserva) {
			$date = date_format(date_create($reserva['dataInicio']), "d/m/Y");
			echo "<tr><td>".$reserva['id']."</td><td>".$reserva['nomeEspaco']."</td><td>".$date."</td></tr>";
		}
	?>
</table>

<script type="text/javascript">
$(".orderQuery").on("click", event => {
		let order = $(event.target).attr("href");			
		if(order !== null && typeof order == "string") {
			order = order.trim().replace("#", "");

			$.ajax({
				method: "POST",
				url: "index",
				data: {"order": order},
			}).done( data => {
				$("#tableReservas").html(data);
			});
		}
	});
</script>