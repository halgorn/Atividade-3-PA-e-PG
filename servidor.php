<?php

function escreverNoArquivo($nomeDoArquivo, $dados) {
	try {
		unset($dados->nomeDoArquivo);

		$arquivo = fopen($nomeDoArquivo, 'w') or die('Não foi possível abrir o arquivo');

		fwrite($arquivo, json_encode($dados));
		fclose($arquivo);

		$arquivo = file_get_contents($nomeDoArquivo);

		echo $arquivo;
	} catch (\Throwable $th) {
		echo $th->getMessage();
	}
}

$dados = json_decode(file_get_contents('php://input'));
$nomeDoArquivo =  './arquivos/' . $dados->nomeDoArquivo . '.json';

escreverNoArquivo($nomeDoArquivo, $dados);
