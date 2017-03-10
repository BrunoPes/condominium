<?php
/* @var $this SiteController */
$userName = Yii::app()->user->nome;
$this->pageTitle=Yii::app()->name;
?>

<style type="text/css">
	th{
		/*width:50%;
		float: left;*/
	}
	td{
		font-size: 13px;
	}
</style>

<h4>Bem vindo, <?=$userName?></h4>
<ul class="nav nav-tabs nav-justified">
	<li role="presentation" class="active tabClass"><a href="#inicio">Reservas</a></li>
	<li role="presentation" class="tabClass"><a href="#reclamacoes">Reclamações</a></li>
	
	<div class="panel panel-default inicio" style="display: block;">
		<div class="panel-heading">Suas reservas</div>
		<div id="tableReservas">
			<?php $this->renderPartial("tableReservas", array("reservas" => $reservas)); ?>
		</div>
	</div>

	<div class="panel panel-default reclamacoes" style="display: none;">
		<div class="panel-heading">Suas reclamações</div>
		<table class="table">
			<tr>
				<th>#</th>
				<th>Descrição</th>
			</tr>
			<?php
				foreach ($reclamacoes as $reclam) {
					echo "<tr><td>".$reclam['id']."</td><td>".$reclam['descricao']."</td></tr>";
				}
			?>
		</table>
	</div>
</ul>

<script type="text/javascript">
	$(document).ready( _ => {

		toggleTable = _ => {
			if($(".inicio").css("display") == "block") {
				$(".inicio").css({"display": "none"});
				$(".reclamacoes").css({"display": "block"});
			} else {
				$(".inicio").css({"display": "block"});
				$(".reclamacoes").css({"display": "none"});
			}
		}

		$(".tabClass").on("click", e => {
			$("li").each((i,ele) => { if($(ele).hasClass("active")) $(ele).toggleClass("active") });
			$(e.target).parent().toggleClass("active");

			toggleTable();
		});		
	});
</script>