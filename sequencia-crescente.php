<?php

function SequenciaCrescente($array){
	$ant_maior = 0; // variavel para armazenar ocorrencias de valor anterior maior que o da próxima posição do vetor

	//Verificando se o vetor já é uma sequencia crescente
	for($i = 0; $i < count($array)-1; $i++){ //varre vetor até sua penultima posição
		//compara valor da posição do vetor atual com o próximo, se maior ou igual, registra ocorrencia
		if($array[$i] >= $array[$i+1]){
			$ant_maior++;
		}
	}
	
	/*Verificando se ouve ocorrencia de número maior em posições anteriores do vetor
	**Se não houve, sequencia crescente identificada
	**Se houver ocorrencia, remover um elemento do array e verificar sequencia crescente novamente (para cada posição do vetor)
	*/
	if($ant_maior == 0){
		echo json_encode($array)." true</br>";
	}else{
		//remover um elemento do array

		$sequencia = false; //variavel boloana para verificar se houve sequencia com eliminação de um elemento do vetor

		
		
		for($x = 0; $x < count($array); $x++){
			$ant_maior = 0;

			$array_aux = $array; //variavel auxiliar
			unset($array_aux[$x]); //remove uma posição do vetor


			//Varre o vetor verificando se elementos restantes formam uma sequencia
			for($i = 0; $i < count($array_aux); $i++){
				//verificação para não dar erro quando se tratar da mesma posição do vetor que foi removida
				if($i != $x){
					//Verifica se a posição de comparação não é a mesma posição do vetor que foi removida
					if($i+1 != $x){
						//Se não for realiza comparação entre posição atual e a próxima
						if($array_aux[$i] >= $array_aux[$i+1]){
							$ant_maior++;
						}
					}else{
						//Se for, verifica se o vetor já acabou, e se não acabou, pula a posição do vetor que foi removida para executar vefificação com o próximo
						if($i+1 != count($array_aux)){ 
							if($array_aux[$i] >= $array_aux[$i+2]){
								$ant_maior++;
							}
						}
					}
				}

			}
			//Verifica se houve alguma ocorrencia de número maior, 
			/*Verificando se ouve ocorrencia de número maior em posições anteriores do vetor
			**Se não houve, sequencia crescente identificada
			*/
			if($ant_maior == 0){
				$sequencia = true;
				$x = count($array); //forçar saida do for
			}
		}


		if($sequencia){
			echo json_encode($array)." true</br>";
		}else{
			echo json_encode($array)." false</br>";
		}
	}

	

	

}

//Vetores para teste
$a = [1, 3, 2, 1];
$b = [1, 3, 2];
$c = [1, 2, 1, 2];
$d = [3, 6, 5, 8, 10, 20, 15];
$e = [1, 1, 2, 3, 4, 4];
$f = [1, 4, 10, 4, 2];
$g = [10, 1, 2, 3, 4, 5];
$h = [1, 1, 1, 2, 3];
$i = [0, -2, 5, 6];
$j = [1, 2, 3, 4, 5, 3, 5, 6];
$k = [40, 50, 60, 10, 20, 30];
$l = [1, 1];
$m = [1, 2, 5, 3, 5];
$n = [1, 2, 5, 5, 5];
$o = [10, 1, 2, 3, 4, 5, 6, 1];
$p = [1, 2, 3, 4, 3, 6];
$q = [1, 2, 3, 4, 99, 5, 6];
$r = [123, -17, -5, 1, 2, 3, 12, 43, 45];
$s = [3, 5, 67, 98, 3];

//Chamadas de teste da função
SequenciaCrescente($a);
SequenciaCrescente($b);
SequenciaCrescente($c);
SequenciaCrescente($d);
SequenciaCrescente($e);
SequenciaCrescente($f);
SequenciaCrescente($g);
SequenciaCrescente($h);
SequenciaCrescente($i);
SequenciaCrescente($j);
SequenciaCrescente($k);
SequenciaCrescente($l);
SequenciaCrescente($m);
SequenciaCrescente($n);
SequenciaCrescente($o);
SequenciaCrescente($p);
SequenciaCrescente($q);
SequenciaCrescente($r);
SequenciaCrescente($s);
?>
