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
<!--
<iframe src="" id="iframe_stat"></iframe>
<script type="text/javascript">
	function estatistica() {
		x = document.getElementsByClassName('view-count style-scope yt-view-count-renderer');
		v = x[0].innerText;
		v = parseInt(v.replace('.',''));

		ifra = document.getElementById('iframe_stat');
		ifra.src = 'http://127.0.0.1/ccb/index.php?q='+String(v);
	}

	var time = setInterval(function(){ estatistica() }, 30000)
</script>
-->
