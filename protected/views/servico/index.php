<style type="text/css">
	td{
		font-size: 13px;
	}
	.btn-success{
		padding: 4px;
	}
</style>

<h1>Servicos</h1>

<div class="panel panel-default">
	<table class="table">
		<tr>
			<th>Nome</th>
			<th>Servico</th>
			<th>Valor(R$)</th>
			<th>Email</th>
			<th>Telefone</th>
			<th>Contratar</th>
		</tr>
		<?php foreach ($servicos as $serv) { 
				$link = Yii::app()->createUrl('pedidoservico/create')."?id=".$serv['id'];?>
				<tr>
					<td><?= $serv['name'] ?></td>
					<td><?= $serv['nomeServico'] ?></td>
					<td><?= $serv['preco'].",00" ?></td>
					<td><?= $serv['email'] ?></td>
					<td><?= $serv['telefone'] ?></td>
					<td><a href="<?=$link?>" type="button" class="btn btn-success">Contratar</a></td>
				</tr>
		<?php } ?>
	</table>
</div>