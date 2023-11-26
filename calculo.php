<?php

$mensagem = "";

if ($_POST){
    $distancia = $_POST["distancia"];
    $autonomia = $_POST["autonomia"];
    
    if (is_numeric($distancia) && is_numeric($autonomia)){
        if ($distancia > 0 && $autonomia > 0){
            $valorAlcool = 4.35;
            $valorGasolina = 5.80;
            $valorDiesel = 6.20;

            $calculoAlcool = ($distancia / $autonomia) * $valorAlcool;
            $calculoAlcool = number_format($calculoAlcool, 2, ",", ".");
            $calculoGasolina = ($distancia / $autonomia) * $valorGasolina;
            $calculoGasolina = number_format($calculoGasolina, 2, ",", ".");
            $calculoDiesel = ($distancia / $autonomia) * $valorDiesel;
            $calculoDiesel = number_format($calculoDiesel, 2, ",", ".");

            $mensagem.= "<div class='sucesso'>";
			$mensagem.= "O valor total gasto em combustível, considerando " . $distancia . "Km de distância e uma autonomia de " . $autonomia . "Km/l, será de:";
			$mensagem.= "<ul>";
			$mensagem.= "<li><p>Utilizando <b>alcool</b> = R$" . $calculoAlcool . "</p></li>";
			$mensagem.= "<li><p>Utilizando <b>gasolina</b> = R$" . $calculoGasolina . "</p></li>";
			$mensagem.= "<li><p>Utilizando <b>diesel</b> = R$" . $calculoDiesel . "</p></li>";
			$mensagem.= "</ul>";
			$mensagem.= "</div>";
        }else{
            $mensagem.= "<div class='erro'>";
            $mensagem.= "<h3>ERRO 101<h1><p><h3>Os números informados precisam ser maiores que zero!</h4></p>";
            $mensagem.= "</div>";
        }
    }else{
        $mensagem.= "<div class='erro'>";
        $mensagem = "<h3>ERRO 102<h3><p><h4>O valor inserido precisa ser númerico!</h4></p>";
        $mensagem.= "</div>";
    }
}else{
    $mensagem.= "<div class='erro'>";
    $mensagem = "<h3>ERRO 103<h3><p><h4>Nenhum calculo foi realizado, porque nenhum valor foi enviado ao formulário.</h4></p>";
    $mensagem.= "</div>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Calculo de Consumo de Combustível</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<main>
		<div class="painel">
			<h2>Resultado do cálculo de consumo</h2>
			<div class="conteudo-painel">
				<?php
				echo $mensagem;
				?>
				<a class="botao" href="index.php">Voltar</a>
			</div>
		</div>
	</main>
</body>
</html>