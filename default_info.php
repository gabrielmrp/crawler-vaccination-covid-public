<?php

include('states.php');

$dict_states = [
'ac'=>'ACRE',
'al'=>'ALAGOAS',
'ap'=>'AMAPÁ',
'am'=>'AMAZONAS',
'ba'=>'BAHIA',
'ce'=>'CEARÁ',
'df'=>'DISTRITO FEDERAL',
'es'=>'ESPÍRITO SANTO',
'go'=>'GOIÁS',
'ma'=>'MARANHÃO',
'mt'=>'MATO GROSSO',
'ms'=>'MATO GROSSO DO SUL',
'mg'=>'MINAS GERAIS',
'pa'=>'PARÁ',
'pb'=>'PARAÍBA',
'pr'=>'PARANÁ',
'pe'=>'PERNAMBUCO',
'pi'=>'PIAUÍ',
'rj'=>'RIO DE JANEIRO',
'rn'=>'RIO GRANDE DO NORTE',
'rs'=>'RIO GRANDE DO SUL',
'ro'=>'RONDÔNIA',
'rr'=>'RORAIMA',
'sc'=>'SANTA CATARINA',
'sp'=>'SÃO PAULO',
'se'=>'SERGIPE',
'to'=>'TOCANTINS'
];

$regex_age='/([pP]essoas (de|com idades a partir de|com)|([iI]|)dosos (com mais ||a partir |com|acima )(de|)) \d\d( (a (\d\d)|anos))|interrompida|(?<=<b>)\d\d(?= anos)|(?<=<b> de )\d\d(?= anos)/';

#([pP].?(<\/b><b>|)essoas(<\/b><b>|) (de|com idades a partir de|com)|([iI]|)dosos (com mais ||a partir |com|acima )(de|)) \d\d( (a (\d\d)|anos))|interrompida

$url = 'https://www1.folha.uol.com.br/equilibrioesaude/2021/04/quem-pode-se-vacinar-agora-veja-o-cronograma-pelo-pais.shtml';
$result = file_get_contents($url, false);




$data=[];

foreach ($dict_states as $key => $value) {

	$final_pattern = regex_content($value);

	preg_match($final_pattern, str_replace("\n","",$result), $matches);

	preg_match_all($regex_age,$matches[0],$years);

	$age = retrieveCurrentAge($years[0],$regex_age);
 
	$data[$key]= "<textarea>".$age."</textarea>"; 

	echo "<div style='flex'>$key<textarea>".$age."</textarea>$matches[0]</div>";

	# code...
}

echo "<pre>";
var_dump($data);
echo "</pre>";
