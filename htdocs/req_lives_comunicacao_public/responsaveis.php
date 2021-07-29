<?php
	// Força o valor 'recuperar' na variável ação
	$acao ='recuperar';

	// Inclusão do script de controle
	require 'form_controller.php';

	// Criação da conexão e criação do option dinamicamente
	$conexao2 = New Conexao();

	$consulta2 = 'SELECT id, evento FROM tb_eventos ORDER BY id';

	$connect2 = $conexao2->conectar();

	$con2 = $connect2->query($consulta2);

	$options = '';

	$options .= '<option value="0">Selecione um Evento</option>';

	foreach ($con2 as $row) {
		$options .= '<option value="'.$row['id'].'">'.$row['id'].' - '.$row['evento'].'</option>';
	}


	// Criação da conexão e criação do título do evento
	$conexao3 = New Conexao();

	$consulta3 = 'SELECT evento FROM tb_eventos ORDER BY id';

	$connect3 = $conexao3->conectar();

	$con3 = $connect3->query($consulta3);

	$textoID = '';

	if($_GET['id'] == 0) {
		$textoID = 'Selecione um evento';
	} else {
		$textoID = $responsaveisEvento[0]->{'id'}.' - '.$responsaveisEvento[0]->{'evento'};
	}

?>

<!DOCTYPE html>
<html lang="pt-BR">

	<head>
		<title>Responsáveis</title>
		<!-- Meta tags Obrigatórias-->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Favicon Icon -->
		<link rel="shortcut icon" href="./assets/media/PIB2.jpg" type="image/jpg">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="./assets/css/bootstrap.css">

		<!-- CSS Customizado -->
		<link rel="stylesheet" href="./assets/css/style.css">

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/e693c56b3c.js" crossorigin="anonymous"></script>

	</head>

    <body>
        <section class="container1">
		<a href="index.php" title="Voltar"><i class="far fa-arrow-alt-circle-left fa-3x mx-2 d-flex float-right"></i></a>
			<!-- Select para selecionar os eventos -->
			<aside class="ml-5 m-4">
				<form action="" method="get">
					<label class="mr-1" for="">Selecione o ID do seu Evento:</label>
					<select name="id" id="">
						<?php echo $options; ?>
					</select>
					<button class="btn btn-sm btn-success ml-1" type="submit">Confirmar</button>
				</form>
			</aside>
				<!-- Título e ID do evento dinâmico -->
				<h4 class="ml-5 mt-2" style="text-align: center;"><strong>Evento: <?php echo $textoID;?></strong></h4>
							
            <!-- Início Responsáveis -->
			<main class="m-5"> 
				<h4 class="text-center mt-5"><strong><em>Responsáveis</em></strong></h4>
				<div class="form-group">
					<label>Bruna Steudel - Rede Super (Comunicação)</label>
					<select id="sel1" class="form-control list-group" onchange="criaClasseSelectResp('sel1', this.value)" disabled>
						<option class="list-group-item">---</option>
						<option <?php echo $responsaveisEvento[0]->{'rede_super'} == 0  ? 'selected' : ''; ?> value="0" class="list-group-item-danger">Não Necessário</option>
						<option <?php echo $responsaveisEvento[0]->{'rede_super'} == 1  ? 'selected' : ''; ?> value="1" class="list-group-item-warning">Acionado</option>
						<option <?php echo $responsaveisEvento[0]->{'rede_super'} == 2  ? 'selected' : ''; ?> value="2" class="list-group-item-primary">Ciente/Em Andamento</option>
						<option <?php echo $responsaveisEvento[0]->{'rede_super'} == 3  ? 'selected' : ''; ?> value="3" class="list-group-item-dark">Mais Informações Solicitadas</option>
						<option <?php echo $responsaveisEvento[0]->{'rede_super'} == 4  ? 'selected' : ''; ?> value="4" class="list-group-item-success">Concluído</option>
					</select>
				</div>

				<br>

				<div class="form-group">
					<label>Tânia Machado - Operações (Comunicação)</label>
					<select id="sel2" class="form-control list-group" onchange="criaClasseSelectResp('sel2', this.value)" disabled>
						<option class="list-group-item">---</option>
						<option <?php echo $responsaveisEvento[0]->{'operacoes'} == 0  ? 'selected' : ''; ?> value="0" class="list-group-item-danger">Não Necessário</option>
						<option <?php echo $responsaveisEvento[0]->{'operacoes'} == 1  ? 'selected' : ''; ?> value="1" class="list-group-item-warning">Acionado</option>
						<option <?php echo $responsaveisEvento[0]->{'operacoes'} == 2  ? 'selected' : ''; ?> value="2" class="list-group-item-primary">Ciente/Em Andamento</option>
						<option <?php echo $responsaveisEvento[0]->{'operacoes'} == 3  ? 'selected' : ''; ?> value="3" class="list-group-item-dark">Mais Informações Solicitadas</option>
						<option <?php echo $responsaveisEvento[0]->{'operacoes'} == 4  ? 'selected' : ''; ?> value="4" class="list-group-item-success">Concluído</option>
					</select>
				</div>

				<br>

				<div class="form-group">
					<label>Emanuel - Engenharia (ADM)</label>
					<select id="sel3" class="form-control list-group" onchange="criaClasseSelectResp('sel3', this.value)" disabled>
						<option class="list-group-item">---</option>
						<option <?php echo $responsaveisEvento[0]->{'engenharia'} == 0  ? 'selected' : ''; ?> value="0" class="list-group-item-danger">Não Necessário</option>
						<option <?php echo $responsaveisEvento[0]->{'engenharia'} == 1  ? 'selected' : ''; ?> value="1" class="list-group-item-warning">Acionado</option>
						<option <?php echo $responsaveisEvento[0]->{'engenharia'} == 2  ? 'selected' : ''; ?> value="2" class="list-group-item-primary">Ciente/Em Andamento</option>
						<option <?php echo $responsaveisEvento[0]->{'engenharia'} == 3  ? 'selected' : ''; ?> value="3" class="list-group-item-dark">Mais Informações Solicitadas</option>
						<option <?php echo $responsaveisEvento[0]->{'engenharia'} == 4  ? 'selected' : ''; ?> value="4" class="list-group-item-success">Concluído</option>
					</select>
				</div>

				<br>

				<div class="form-group">
					<label>Morbeque - Sonotécnica (ADM)</label>
					<select id="sel4" class="form-control list-group" onchange="criaClasseSelectResp('sel4', this.value)" disabled>
						<option class="list-group-item">---</option>
						<option <?php echo $responsaveisEvento[0]->{'sonotecnica'} == 0  ? 'selected' : ''; ?> value="0" class="list-group-item-danger">Não Necessário</option>
						<option <?php echo $responsaveisEvento[0]->{'sonotecnica'} == 1  ? 'selected' : ''; ?> value="1" class="list-group-item-warning">Acionado</option>
						<option <?php echo $responsaveisEvento[0]->{'sonotecnica'} == 2  ? 'selected' : ''; ?> value="2" class="list-group-item-primary">Ciente/Em Andamento</option>
						<option <?php echo $responsaveisEvento[0]->{'sonotecnica'} == 3  ? 'selected' : ''; ?> value="3" class="list-group-item-dark">Mais Informações Solicitadas</option>
						<option <?php echo $responsaveisEvento[0]->{'sonotecnica'} == 4  ? 'selected' : ''; ?> value="4" class="list-group-item-success">Concluído</option>
					</select>
				</div>

				<br>

				<div class="form-group">
					<label>Naiana - Agenda (ADM)</label>
					<select id="sel5" class="form-control list-group" onchange="criaClasseSelectResp('sel5', this.value)" disabled>
						<option class="list-group-item">---</option>
						<option <?php echo $responsaveisEvento[0]->{'agenda_pib'} == 0  ? 'selected' : ''; ?> value="0" class="list-group-item-danger">Não Necessário</option>
						<option <?php echo $responsaveisEvento[0]->{'agenda_pib'} == 1  ? 'selected' : ''; ?> value="1" class="list-group-item-warning">Acionado</option>
						<option <?php echo $responsaveisEvento[0]->{'agenda_pib'} == 2  ? 'selected' : ''; ?> value="2" class="list-group-item-primary">Ciente/Em Andamento</option>
						<option <?php echo $responsaveisEvento[0]->{'agenda_pib'} == 3  ? 'selected' : ''; ?> value="3" class="list-group-item-dark">Mais Informações Solicitadas</option>
						<option <?php echo $responsaveisEvento[0]->{'agenda_pib'} == 4  ? 'selected' : ''; ?> value="4" class="list-group-item-success">Concluído</option>
					</select>
				</div>

				<br>

				<div class="form-group">
					<label>Albert - Grupo Gestor</label>
					<select id="sel6" class="form-control list-group" onchange="criaClasseSelectResp('sel6', this.value)" disabled>
						<option class="list-group-item">---</option>
						<option <?php echo $responsaveisEvento[0]->{'grupo_gestor'} == 0  ? 'selected' : ''; ?> value="0" class="list-group-item-danger">Não Necessário</option>
						<option <?php echo $responsaveisEvento[0]->{'grupo_gestor'} == 1  ? 'selected' : ''; ?> value="1" class="list-group-item-warning">Acionado</option>
						<option <?php echo $responsaveisEvento[0]->{'grupo_gestor'} == 2  ? 'selected' : ''; ?> value="2" class="list-group-item-primary">Ciente/Em Andamento</option>
						<option <?php echo $responsaveisEvento[0]->{'grupo_gestor'} == 3  ? 'selected' : ''; ?> value="3" class="list-group-item-dark">Mais Informações Solicitadas</option>
						<option <?php echo $responsaveisEvento[0]->{'grupo_gestor'} == 4  ? 'selected' : ''; ?> value="4" class="list-group-item-success">Concluído</option>
					</select>
				</div>

			</main> <!-- Fim Responsáveis -->
        </section>
        
    </body>

	<!-- JS Customizado -->
	<script src="./assets/js/script.js"></script>

</html>