<?php

?>
<style type="text/css">
	td{
		font-size: 13px;
	}

	.btn-danger, .btn-success {
		padding-top:    3px;
		padding-bottom: 3px;
		text-align: center;
	}

	.btn-danger {
		margin-left: 12px;
	}

	.doneAction {
		width: 100px;
		/*padding-left:0px;*/
	}
	.btn-danger.doneAction {
		margin-left: 0px;
	}

</style>

<h1>Pedidos de Serviço</h1>

<div class="panel panel-default">	
	<table class="table">
		<tr>
			<th>#</th>
			<th>Nome do Contrante</th>
			<th>Data para o serviço</th>
			<th>Mensagem</th>
			<th>Fechar acordo</th>
		</tr>
		<?php foreach ($pedidos as $oferta) {
				$flag = $oferta['flagAceito'];
				$date = date_format(date_create($oferta['dataServico']), "d/m/Y");?>
				<tr>
					<td><?= $oferta['id'] ?></td>
					<td><?= $oferta['name'] ?></td>
					<td><?= $date ?></td>
					<td><?= $oferta['mensagem']?></td>					
					<td>
						<?php if($flag == NULL || empty($flag) || $flag == "e") { ?>
							<a data-action="a" data-id="<?=$oferta['id']?>" type="button" class="btn btn-success deal col-md-3">Sim</a>
							<a data-action="n" data-id="<?=$oferta['id']?>" type="button" class="btn btn-danger deal col-md-3">Não</a>
						<?php } else { ?>
							<a type="button" class="<?= 'doneAction btn btn-'.($flag=='a' ? 'success':'danger')?>" disabled>
								<?=$flag=="a"?"Aceito":"Negado"?></a>
						<?php } ?>
					</td>
				</tr>
		<?php } ?>
	</table>
</div>

<script type="text/javascript">
	$(document).ready( _ => {
		$(".deal").on("click", event => {
			let id = $(event.target).attr("data-id");
			let action = $(event.target).attr("data-action");
			console.log(id, action);
			$.ajax({
				url: 'index',
				method: 'POST',
				data: {'id': id, 'action': action}
			}).done( _ => {
				location.reload();
			});
		});
	});
</script>
