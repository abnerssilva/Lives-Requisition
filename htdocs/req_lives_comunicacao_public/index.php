<?php

	// Inclusão do script de conexão com o Banco
	require "../../req_lives_comunicacao_private/conexao.php";



	// Criação da conexão e criação do feedback de inclusão com a informação do ID 
	$conexao = New Conexao();

	$consulta = 'SELECT id FROM tb_eventos ORDER BY id DESC LIMIT 1';

	$connect = $conexao->conectar();

	$con = $connect->query($consulta);

	foreach ($con as $row) {
		$id_evento = $row['id'];
	}

?>

<!DOCTYPE html>
<html lang="pt-BR">

	<head>
		<title>Requisição de Eventos</title>
		<!-- Meta tags Obrigatórias-->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Favicon Icon -->
		<link rel="shortcut icon" href="./assets/media/PIB2.jpg" type="image/jpg">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<!-- CSS Customizado -->
		<link rel="stylesheet" href="./assets/css/style.css">

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/e693c56b3c.js" crossorigin="anonymous"></script>
		<script src="./assets/js/jquery.inputmask.js"></script>
		<script src="./assets/js/jquery.maskMoney.js"></script>

	</head>

	<body>

		<section class="container1">
			<!-- Início Cabeçalho -->
			<header>
				<h1>Requisição para Eventos, Lives e Transmissões</h1><br><br>

				<?php
				 	if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
						<div class="bg-success pt-2 text-white d-flex justify-content-center">
							<h5>Seu evento foi registrado! Seu ID é nº: <?php echo $id_evento?>. Guarde esse número para consultas posteriores!</h5>
						</div>
				<?php
					} 
				?>

				<p class="ml-3">
					Quer planejar sua transmissão com as grades da TV Rede Super ou canais da PIBCuritiba?<br>
					Confira nesses dois links nossa grade de programação da TV e Lives.	
				</p>

				<ul class="ml-3">
					<li>
						<a target="_blank" href="https://pibcuritiba.org.br/comunicacao/rede-super/">Rede Super</a>
					</li>

					<li>
						<a target="_blank" href="https://pibcuritiba.org.br/igrejaonline/">Igreja On-line</a>
					</li>
				</ul>

				<p class="ml-3">Pretende usar o estúdio? Confira nossa disponibilidade <a target="_blank" href="https://docs.google.com/spreadsheets/d/e/2PACX-1vR3GdVDmD9GGgoqODVIpJTrZhS1ay-8jhUqD_rvKtdOnAAy637vKhdgJiWQ5MqsLAJn4de7OPXKkvNW/pubhtml?gid=0&amp;single=true&amp;widget=true&amp;headers=false">neste link</a>.</p>

				<span class="ml-3">Já planejou a divulgação do seu evento? Acione aqui os <a target="_blank" href="https://pibcuritiba.org.br/divulgacao">canais da PIB</a>.</span><br><br>
				
				<div class="mt-5" style="text-align: center;">
					<button style="border-radius: 25px;" class="btn btn-primary btn-lg mr-5" type="button" onclick="mostraFormulario('#form')"><a href="#">Cadastre um Novo Evento</a></button>
					<button style="border-radius: 25px;" class="btn btn-secondary btn-lg ml-5" type="button"><a href="responsaveis.php?id=0">Acompanhe seus Eventos</a></button>
				</div>
				
			</header> <!-- Fim Cabeçalho -->
		</section>
		<section class="container1">
			<main id="principal">
				<section id="form" style="display: none;">
					<!-- Início do Formulário -->
					<i id="fechado" class="close fas fa-times-circle fa-sm mx-2 d-flex float-right" aria-hidden="true" onClick="window.location.reload();"></i>
					<h4 class="text-center"><strong><em>Formulário de Solicitação de Eventos</em></strong></h4>

					<form class="secao1" action="form_controller.php?acao=inserir" method="post">

						<!-- Campo Evento -->
						<div class="input-group">
							<div class="input-group-prepend" style="width: 100%;">
								<span class="input-group-text">Evento:</span>
								<input class=" validar form-control form-control-lg" type="text" name="evento" placeholder="Informe o Título do seu Evento">
							</div>
						</div>

						<!-- Seção Requisitante -->
						<div class="secao2">
							<h5><strong>Requisitante:</strong></h5>

							<div class="input-group-prepend mt-4" style="width: 100%;">
								<label class="input-group-text" style="width: 19%;">Nome:</label>
								<input class=" validar form-control" name="nome_requisitante" type="text" placeholder="Digite seu nome">
							</div>

							<div class="input-group-prepend" style="width: 100%;">
								<label class="input-group-text" style="width: 19%;">Ministério:</label>
								<input class="form-control" name="ministerio_requisitante" type="text" placeholder="Informe o Ministério do Requisitante">
							</div>

							<div class="input-group-prepend" style="width: 100%;">
								<label class="input-group-text">Responsável Técnico:</label>
								<input class="form-control" name="resp_tec" type="text" placeholder="Nome do responsável técnico">
								<label class="input-group-text">Celular:</label>
								<input id="tel_resp_tec" class="form-control" name="tel_resp_tec" type="text" placeholder="Celular do responsável técnico">
							</div>

							<div class="input-group-prepend" style="width: 100%;">
								<label class="input-group-text" style="width: 40%;">Responsável Geral:</label>
								<input class=" validar form-control" name="resp_g" type="text" placeholder="Nome do responsável geral">
								<label class="input-group-text">Celular:</label>
								<input id="tel_resp_g" class="validar form-control" name="tel_resp_g" type="text" placeholder="Celular do responsável geral">
							</div>
						</div> <!-- Fim Seção Requisitante -->

						<!-- Seção Agenda -->
						<div id="agenda" class="secao2">
							<h5><strong>Agenda:</strong></h5>

							<label>Sessão Única?</label>
							<input onmouseup="mostraPergunta('SessaoUnica', '#agenda', 'data_ini', 'hora_ini')" onmousedown="escondePergunta('#novaDivSessoes'), escondePergunta('#novaDivHorarioAgenda')"
							class="ml-2" type="radio" name="sessao_unica" value="1"> Sim
							<input onmouseup="mostraPergunta('Sessoes', '#agenda'), mostraPergunta('HorarioAgenda', '#agenda')" onmousedown="escondePergunta('#novaDivSessaoUnica')"
							class="ml-2" type="radio" name="sessao_unica" value="0"> Não

							<div id="novaDivSessaoUnica" style="display: none;">							
								<div class="row">
									<ul id="divHorarioAgendaUnica">
										<br>
										<li class="entraDiv" style="opacity: 0;">
											Sessão Única
											<div class="input-group-prepend d-flex">
												<label class="input-group-text" style="width: 100%;">Data:</label>
												<input id="data_ini" class="form-control" type="date" name="data_sessao[]">								
											</div>
											<div class="input-group-prepend d-flex">
												<label class="input-group-text">&nbsp;Hora Início / Hora Final:</label>
												<input id="hora_ini" class="form-control" type="time" name="hora_inicio_sessao[]">
												<input id="hora_fim" class="form-control" type="time" name="hora_fim_sessao[]">
											</div>
										</li>
									</ul>
								</div>
							</div>
							
							<div id="novaDivSessoes" class="form-group" style="display: none;">
								<br>
								<label>Selecione o número de sessões:</label>
								<select id="numeroSessoes" class="form-control" onchange="criaSessoes(this.value)">
									<option value="">---</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
							</div>
							<div id="novaDivHorarioAgenda" style="display: none;">
								<div class="row">
									<ul id="ulHorarioAgenda">
									</ul>
								</div>
							</div>


						</div> <!-- Fim Seção Agenda -->

						<!-- Seção Local -->
						<div id="local" class="secao2">
							<h5><strong>Local da Transmissão:</strong></h5>
							
							<label>Seu evento é na PIB ou Externo?</label>
							<input onmouseup="mostraPergunta('LocalInt', '#local')" onmousedown="escondePergunta('#novaDivLocalExt')"
							class="ml-2" type="radio" name="local0" value="1"> Interno
							<input onmouseup="mostraPergunta('LocalExt', '#local', 'local_ext')" onclick="escondePergunta('#novaDivLocal')"
							onmousedown="escondePergunta('#novaDivLocalInt')" class="ml-2" type="radio" name="local0" value="0"> Externo
							
							<div id="novaDivLocalExt" style="display: none;">
								<br>							
								<div class="input-group" style="width: 40%;">
									<label for="local_ext" class="mb-0" style="width: 100%;">Externo à PIB:</label>
									<input id="local_ext" class="form-control" type="text" name="local_ext" placeholder="Digite o Local">
								</div>			
							</div>

							<div id="novaDivLocalInt" class="row justify-content-around" style="display: none;">
								<br>
								<h6 class="d-block ml-3 mt-2" style="width: 100%;">Dentro da PIB:</h6>
								<div class="col text-center">
									<label for="templo"><input id="templo" onclick="escondePergunta('#novaDivLocal')" type="radio" name="local_int" value="templo"> Templo</label>
								</div>
								<div class="col text-center">
									<label for="capela"><input id="capela" onclick="escondePergunta('#novaDivLocal')" type="radio" name="local_int" value="capela"> Capela</label>
								</div>
								<div class="col text-center">
									<label for="estudio"><input id="estudio" onclick="escondePergunta('#novaDivLocal')" type="radio" name="local_int" value="estudio"> Estúdio</label>
								</div>
								<div class="col text-center">
									<label for="estac"><input id="estac" onclick="escondePergunta('#novaDivLocal')" type="radio" name="local_int" value="estac"> Estacionamento</label>
								</div>
								<div class="col text-center">
									<label for="outro"><input id="outro" onclick="mostraPergunta('Local', '#local', 'local_int')" type="radio" name="local_int" value="outro"> Outro</label>
								</div>
																
							</div>

							<div id="novaDivLocal" style="display: none;">
								<br>							
								<div class="input-group" style="width: 40%;">
									<label for="local_int" class="mb-0" style="width: 100%;">Qual Local?</label>
									<input id="local_int" class="form-control" type="text" name="local_int2" placeholder="Digite o Local desejado">
								</div>			
							</div>
							
						</div> <!-- Fim Seção Local -->

						<!-- Seção Canais e Redes -->
						<div id="canais" class="secao2">
							<h5><strong>Canais e Redes:</strong></h5>
							<div class="row justify-content-around">
								<div class="col text-center">
									<label for="youtube"><input id="youtube" type="checkbox" name="midia[]" value="Youtube"> Youtube</label>
								</div>
								<div class="col text-center">
									<label for="facebook"><input id="facebook" type="checkbox" name="midia[]" value="Facebook"> Facebook</label>
								</div>
								<div class="col text-center">
									<label for="instagram"><input id="instagram" type="checkbox" name="midia[]" value="Instagram"> Instagram</label>
								</div>
								<div class="col text-center">
									<label for="zoom"><input id="zoom" type="checkbox" name="midia[]" value="Zoom"> Zoom</label>
								</div>
								<div class="col text-center">
									<label for="meeting"><input id="meeting" type="checkbox" name="midia[]" value="Meeting"> Meeting</label>
								</div>
								<div class="col text-center">
									<label for="r-super"><input id="r-super" type="checkbox" name="midia[]" value="R-super"> Rede Super</label>
								</div>
								<div class="col text-center">
									<label for="outras"><input onclick="verificaCheckbox('outras', '#midia_add')" 
									id="outras" type="checkbox" name="" value=""> Outra</label>
								</div>

							</div>

							<div id="divoutras" style="display: none;">
								<br>								
								<div class="input-group" style="width: 40%;">
									<label for="midia_add" class="mb-0" style="width: 100%;"> Qual Mídia?</label>
									<input id="midia_add" class="form-control" type="text" name="midia[]" placeholder="Digite o canal adicional">
								</div>
							</div>

						</div> <!-- Fim Seção Canais -->
						
						<!-- Seção Recursos -->
						<div id="recursos" class="secao2">
							<h5><strong>Recursos:</strong></h5>

							<div class="row justify-content-around">
								<div class="col text-center">
									<label for="som"><input class="recurso" id="som" type="checkbox" name="recurso[]" value="Som"> Som</label>
								</div>
								<div class="col text-center">
									<label for="cenario"><input id="cenario" type="checkbox" name="recurso[]" value="Cenario"> Cenário</label>
								</div>
								<div class="col text-center">
									<label for="m-camera"><input id="m-camera" type="checkbox" name="recurso[]" value="Multi-cam"> Multi-camera</label>
								</div>
								<div class="col text-center">
									<label for="mesa-c"><input id="mesa-c" type="checkbox" name="recurso[]" value="Mesa-corte"> Mesa de corte</label>
								</div>
								<div class="col text-center">
									<label for="iluminacao"><input id="iluminacao" type="checkbox" name="recurso[]" value="Iluminacao"> Iluminação</label>
								</div>
								<div class="col text-center">
									<label for="transporte"><input id="transporte" type="checkbox" name="recurso[]" value="Transporte"> Transporte</label>
								</div>
								<div class="col text-center">
									<label for="outros"><input onclick="verificaCheckbox('outros', '#recurso_add')"
									id="outros" type="checkbox" name="" value=""> Outro</label>
								</div>

							</div>
							
							<div id="divoutros" style="display: none;">
								<br>								
								<div class="input-group" style="width: 40%;">
									<label for="recurso_add" class="mb-0" style="width: 100%;"> Qual Recurso?</label>
									<input id="recurso_add" class="form-control" type="text" name="recurso[]" placeholder="Digite o recurso adicional">
								</div>
							</div>

						</div> <!-- Fim Seção Recursos -->

						<!-- Seção Equipe -->
						<div id="equipe" class="secao2">
							<h5><strong>Pessoal Envolvido:</strong></h5>
							<span>Tem Equipe Própria?</span>
							<input class="ml-2" type="radio" name="equipe_propria" value="1"> Sim
							<input class="ml-2" type="radio" name="equipe_propria" value="0"> Não

							<br><br>

							<span>Precisa de Voluntários?</span>
							<input onclick="mostraPergunta('Equipe', '#equipe', 'qtd_volunteer')" class="ml-2" type="radio" name="volunteer" value="1"> Sim
							<input onclick="escondePergunta('#novaDivEquipe')" class="ml-2" type="radio" name="volunteer" value="0"> Não

							<div id="novaDivEquipe" style="display: none;">
								<br>
								<div class="input-group" style="width: 40%;">
								<label for="qtd_volunteer" class="mb-0" style="width: 100%;"> Quantos Voluntários?</label>
									<input id="qtd_volunteer" class="form-control" type="text" name="qtd_volunteer" placeholder="Número">
								</div>
							</div>

						</div> <!-- Fim Seção Equipe -->

						<!-- Seção Verba -->
						<div id="verba" class="secao2">
							<h5><strong>Verba:</strong></h5>
							<span>Verba total do evento:</span>
							<div class="input-group" style="width: 26%;">
								<div class="input-group-prepend">
									<span class="input-group-text">R$</span>
								</div>
								<input id="verba_total" class="form-control" name="verba_total" type="text" placeholder="Valor em Reais">
							</div>

							<br>

							<span>Valor destinado a operação técnica:</span>
							<div class="input-group" style="width: 26%;">
								<div class="input-group-prepend">
									<span class="input-group-text">R$</span>
								</div>
								<input id="verba_op" class="form-control" name="verba_op" type="text" placeholder="Valor em Reais">
							</div>

							<br>

							<span>Haverá Cobrança de Inscrição?</span>
							<input onclick="mostraPergunta('Verba', '#verba', 'valor_insc')" class="ml-2" type="radio" name="inscricao" value="1"> Sim
							<input onclick="escondePergunta('#novaDivVerba')" class="ml-2" type="radio" name="inscricao" value="0"> Não

							<div id="novaDivVerba" style="display: none;">
								<br>
								<p class="mb-0">Qual será o valor cobrado na inscrição?</p>
								<div class="input-group" style="width: 26%;">
									<div class="input-group-prepend">
										<span class="input-group-text">R$</span>
									</div>
									<input id="valor_insc" class="form-control" name="valor_insc" type="text" placeholder="Valor em Reais">
								</div>
							</div>		

						</div> <!-- Fim Seção Verba -->

						<!-- Seção OBS -->
						<div class="secao2">
							<h5><strong>Observações:</strong></h5>
							<div class="input-group">
								<textarea class="form-control" name="obs" id="obs" rows="5"></textarea>
							</div>
						</div> <!-- Fim Seção OBS -->

						<div class="ml-auto d-block">
							<button type="reset" value="Reload Page" class="btn btn-lg btn-warning" style="color: #fff;">Limpar</button>
							<button type="submit" class="btn btn-lg btn-success float-right" style="color: #fff;">Salvar</button>
						</div>					
						
					</form> <!-- Fim Formulário -->
				</section>
			</main>
		</section>
	</body>

	<script>

		$(function() {
			$("#tel_resp_tec").inputmask("(99)99999-9999");
			$("#tel_resp_g").inputmask("(99)99999-9999");
		});

		$(document).ready(function () {
			$('#verba_total').maskMoney({allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 2});
			$('#verba_op').maskMoney({allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 2});
			$('#valor_insc').maskMoney({allowNegative: false, thousands:'', decimal:'.', affixesStay: false, precision: 2});
		})
	</script>


	<!-- JS Customizado -->
	<script src="./assets/js/main.js"></script>
	<script src="./assets/js/script.js"></script>

</html>
