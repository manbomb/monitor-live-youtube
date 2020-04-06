# Como monitorar uma live no YT sem API 
### Como monitorar o número de pessoas assistindo uma live no Youtube (sem API do youtube)

Eu achei pertinente compartilhar este conhecimento, que mais parece uma gambiarra, já que estou em um dia tão tedioso (meio da quarentena - Corona Vairus !) e não tenho nada melhor a contribuir para este mundo.

## Resumo funcionamento
Um script em loop (JS) rodando dentro da page da live, comunica com uma page de log (feita em PHP) que guarda os dados da maneira que você quiser, nesta aplicação, a minha, eu guardei os números na forma de log, com horário e quantidade de views, cada um adapte da sua melhor maneira.

## Como usar ?
- Tenha um servidor local apache, para poder usar a seguinte page (de log), ou uma parecida:
```
<?php

	date_default_timezone_set('America/Sao_Paulo');

	$fp = fopen('data.txt', 'a');

	if (isset($_GET['q'])) {
		$q = $_GET['q'];
		if ($q != '') {
			$data_hora = Date('d/m/Y - H:i:s');
			$txt = $data_hora." - ".$q."\n";
			echo $txt;
			fwrite($fp, $txt);
		}
	}

	fclose($fp);

?>
```
- Use o Chrome, de preferência.
- Abra a page da live e abra o DevTools no console.
- Rode o script JS: _(**Dica:** rode o script o mais rápido possível, de preferência, tecle F5 e em seguida já execute o script)_
``` 
body.innerHTML += '<iframe src="" id="iframe_stat"></iframe>';

function estatistica() {
  x = document.getElementsByClassName('view-count style-scope yt-view-count-renderer');
  v = x[0].innerText;
  v = parseInt(v.replace('.',''));

  ifra = document.getElementById('iframe_stat');
  ifra.src = 'http://127.0.0.1/path/index.php?q='+String(v);
}

var time = setInterval(function(){ estatistica() }, 30000)
```
**Obs.: o atributo src do objeto ifra dentro da função estatistica() depende de onde estiver alocado a sua page de log. O período do setInterval depende da frequência que você quiser a amostragem.

## Conclusão:

 - Nem só de grandes projetos se constrói a felicidade de um programador.
 - _Muito Obrigado pela leitura !_ :+1: :octocat:
