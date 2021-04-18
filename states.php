<?php


$day =  explode('-',date('d-m-Y'))[0];
 
$past_days = '';

for($i=1;$i<=(int)$day;$i++){
    $char_i = (String)$i;
    if(strlen($char_i)==1){$char_i='0'.$char_i;}
    $past_days.=$char_i."|";
}
 
$all_states_regex="(?=ACRE|ALAGOAS|AMAPÁ|AMAZONAS|BAHIA|CEARÁ |DISTRITO FEDERAL|ESPÍRITO SANTO|GOIÁS|MARANHÃO|MATO GROSSO|MATO GROSSO DO SUL|MINAS GERAIS|PARÁ|PARAÍBA|PARANÁ|PERNAMBUCO|PIAUÍ|RIO DE JANEIRO|RIO GRANDE DO NORTE|RIO GRANDE DO SUL|RONDÔNIA|RORAIMA|SANTA CATARINA|SÃO PAULO|SERGIPE|TOCANTINS)";

$regex_age='/([pP]essoas (de|com idades a partir de|com)|([iI]|)dosos (com mais ||a partir |com|acima )(de|)) \d\d(?= (a (?=\d\d)|anos))|interrompida/';

$states = array(
    'ac' => [
        'name' => 'estado do <strong>Acre</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/ac/acre/noticia/2021/01/27/vacina-contra-covid-19-em-rio-branco-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/<h2>Quem pode ser vacinado(|\?).*?<h2/',
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 66
    ],
    'al' => [
        'name' => 'estado de <strong>Alagoas</strong>',
        'uri_refer_before' => 'https://g1.globo.com/google/amp/al/alagoas/noticia/2021/01/27/vacina-contra-covid-19-em-maceio-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'uri_refer' => 'https://vacina.maceio.al.gov.br/',
        'pattern_content'=>'/Grupo Atual:.*?\/span/',
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 60
    ],
    'ap' => [
        'name' => 'estado do <strong>Amapá</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/ap/amapa/noticia/2021/01/27/vacina-contra-covid-19-em-macapa-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem pode ser vacinado(.|)<.*?(?=<\/ul)/',
        'pattern_age'=>'/(?<=Idosos com )\d\d(?= anos)/',  
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 60
    ],
    'am' => [
        'name' => 'estado do <strong>Amazonas</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/am/amazonas/noticia/2021/01/27/vacina-contra-covid-19-em-manaus-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem pode ser vacinado.*?(?=<h2)/',
        'pattern_age'=>'/./', 
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 60
    ],
    'ba' => [
        'name' => 'estado da <strong>Bahia</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/ba/bahia/noticia/2021/01/27/vacina-contra-covid-19-em-salvador-veja-quem-pode-ser-vacinado-hoje.ghtml',
        'pattern_content'=>'/(?s)Quem pode ser vacinado.*?(?=<h2)/',
        'pattern_age'=>'/(?<=Idosos com )\d\d(?= anos)/', 
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 61
    ],
    'ce' => [
        'name' => 'estado do <strong>Ceará</strong>',
        'uri_refer_before' => 'https://g1.globo.com/google/amp/ce/ceara/noticia/2021/01/27/vacina-contra-covid-19-em-fortaleza-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'uri_refer' =>'https://www1.folha.uol.com.br/equilibrioesaude/2021/04/quem-pode-se-vacinar-agora-veja-o-cronograma-pelo-pais.shtml',
        'pattern_content'=>'/(?s)(?<=CEAR).*?'.$all_states_regex.'/',
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',         'state_age' => 62
    ],
    'df' => [
        'name' => '<strong>Distrito Federal</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/df/distrito-federal/noticia/2021/01/27/vacina-contra-covid-19-no-df-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem pode ser vacinado(.|)<.*?(?=<h2)/',
        'pattern_age'=>'/(?<=Idosos de )\d\d(?= anos ou)/', 
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 66
    ],
    'es' => [
        'name' => 'estado do <strong>Espírito Santo</strong>',
        'uri_refer_before' => 'https://g1.globo.com/google/amp/es/espirito-santo/noticia/2021/04/08/vila-velha-es-comeca-a-agendar-vacinacao-de-pessoas-com-mais-60-anos-contra-covid-19.ghtml',
        'uri_refer' =>'https://www1.folha.uol.com.br/equilibrioesaude/2021/04/quem-pode-se-vacinar-agora-veja-o-cronograma-pelo-pais.shtml',
        'pattern_content'=>'/(?s)(?<=SANTO).*?'.$all_states_regex.'/',
        'pattern_age'=>'/(?<=Pessoas de )\d\d(?= a)/',#anos
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 65
    ],
    'go' => [
        'name' => 'estado de <strong>Goiás</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/go/goias/noticia/2021/01/27/vacina-contra-covid-19-em-goiania-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem pode receber a 1.*?(?=Quem pode receber a 2)/',
        'pattern_age'=>'/(?<=Idosos a partir de )\d\d(?= anos)/',  #Idosos a partir de 
        #A vacinação está suspensa até esta sexta-feira (16) por falta de doses.
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 64
    ],
    'ma' => [
        'name' => 'estado do <strong>Maranhão</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/ma/maranhao/noticia/2021/04/05/vacina-contra-a-covid-19-em-sao-luis-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem está sendo vacinado agora, segundo a Prefeitura(.|)<.*?(?=<h2)/',
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 67
    ],
    'mt' => [
        'name' => 'estado do <strong>Mato Grosso</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/mt/mato-grosso/noticia/2021/01/27/vacina-contra-covid-19-em-cuiaba-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem pode ser vacinado no município atualmente(.|)<.*?(?=<h2)/',
        'pattern_age'=>'/(?<=Idosos acima de )\d\d(?= a)/', 
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 65
    ],
    'ms' => [
        'name' => 'estado do <strong>Mato Grosso do Sul</strong>',
        'uri_refer_before' => 'https://g1.globo.com/google/amp/ms/mato-grosso-do-sul/noticia/2021/01/27/vacina-contra-covid-19-em-campo-grande-veja-quem-pode-ser-vacinado-nesta-primeira-etapa-e-o-que-fazer.ghtml',
        'uri_refer' =>'https://www1.folha.uol.com.br/equilibrioesaude/2021/04/quem-pode-se-vacinar-agora-veja-o-cronograma-pelo-pais.shtml',
        'pattern_content'=>'/MATO GROSSO DO SUL.*?'.$all_states_regex.'/',
        'pattern_age'=>'/(?<=Pessoas de )\d\d(?= anos)|interrompida/', #pessoas com 
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 61
    ],
    'mg' => [
        'name' => 'estado de <strong>Minas Gerais</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/mg/minas-gerais/noticia/2021/01/27/vacina-contra-covid-19-em-belo-horizonte-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem pode receber a 1.*?(?=Quem pode receber a 2)/',
        'pattern_age'=>'/(?<=idosos a partir de )\d\d(?= anos)/', #Idosos de 
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 64
    ],
    'pa' => [
        'name' => 'estado do <strong>Pará</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/pa/para/noticia/2021/01/27/vacina-contra-covid-19-em-belem-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem pode ser vacinado(.|)<.*?(?=<h2)/',
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 60
    ],
    'pb' => [
        'name' => 'estado da <strong>Paraíba</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/pb/paraiba/noticia/2021/01/27/vacina-contra-covid-19-em-joao-pessoa-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem pode ser vacinado(.|)<.*?(?=<h2)/',
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 60
    ],
    'pr' => [
        'name' => 'estado do <strong>Paraná</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/pr/parana/noticia/2021/01/27/vacina-contra-covid-19-em-curitiba-veja-quem-pode-ser-vacinado-nesta-primeira-etapa-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem pode ser vacinado(.|)<.*?(?=<h2)/',
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 67
    ],
    'pe' => [
        'name' => 'estado de <strong>Pernambuco</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/pe/pernambuco/noticia/2021/01/27/vacina-contra-covid-19-no-recife-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem pode ser vacinado(.|)<.*?(?=<h2)/',
        'pattern_age'=>'/(?<=Pessoas com idades a partir de )\d\d(?= anos)/', #Idosos a partir de 
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 62
    ],
    'pi' => [
        'name' => 'estado do <strong>Piauí</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/pi/piaui/noticia/2021/01/27/vacina-contra-covid-19-em-teresina-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)>Quem pode receber a 1.*?(?=>Quem pode receber a 2)/', #Quem está sendo vacinado em Teresina(.|)<
        'pattern_age'=>'/(?<=Idosos com mais de )\d\d(?= )/', # anos
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 68
    ],
    'rj' => [
        'name' => 'estado do <strong>Rio de Janeiro</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/rj/rio-de-janeiro/noticia/2021/01/27/vacina-contra-covid-19-no-rio-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Idosos em geral<.*?(?=<h2)/',
        'pattern_age'=>'/(Dia ('.$past_days.')  - Pessoas com )\d\d(?= anos)/',
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 60
    ],
    'rn' => [
        'name' => 'estado do <strong>Rio Grande do Norte</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/rn/rio-grande-do-norte/noticia/2021/01/27/vacina-contra-covid-19-em-natal-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem pode ser vacinado(.|)<.*?(?=<h2)/',
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 63
    ],
    'rs' => [
        'name' => 'estado do <strong>Rio Grande do Sul</strong>',
        'uri_refer_before' => 'https://g1.globo.com/google/amp/rs/rio-grande-do-sul/noticia/2021/01/27/vacina-contra-covid-19-em-porto-alegre-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'uri_refer' =>'https://www1.folha.uol.com.br/equilibrioesaude/2021/04/quem-pode-se-vacinar-agora-veja-o-cronograma-pelo-pais.shtml',
        'pattern_content'=>'/(?s)RIO GRANDE DO SUL.*?'.$all_states_regex.'/',
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 63
    ],
    'ro' => [
        'name' => 'estado de <strong>Rondônia</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/ro/rondonia/noticia/2021/01/27/vacina-contra-covid-19-em-porto-velho-veja-quem-pode-ser-vacinado-hoje.ghtml',
        'pattern_content'=>'/(?s)Quais grupos( já|) estão (se vacinando|sendo vacinados)(.|)<.*?(?=<h2)/',
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 65
    ],
    'rr' => [
        'name' => 'estado de <strong>Roraima</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/rr/roraima/noticia/2021/01/28/vacina-contra-covid-19-em-boa-vista-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem pode ser vacinado em Boa Vista<.*?(?=<h2)/',
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 60
    ],
    'sc' => [
        'name' => 'estado de <strong>Santa Catarina</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/sc/santa-catarina/noticia/2021/01/27/vacina-contra-covid-19-em-florianopolis-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem pode receber a 1.*?(?=<h2)/',
        'pattern_age'=>'/(?<=idosos de )\d\d(?= anos)/',# Idosos de
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 66
    ],
    'sp' => [
        'name' => 'estado de <strong>São Paulo</strong>',
        'uri_refer' => 'https://www.prefeitura.sp.gov.br/cidade/secretarias/saude/vigilancia_em_saude/index.php?p=307599',
        'pattern_content'=>'/GRUPOS PRIORIT.*?POSTOS DE VACINA/',
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<= datetime=.).*?(?=">)/',
         'state_age' => 67
    ],
    'se' => [
        'name' => 'estado de <strong>Sergipe</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/se/sergipe/noticia/2021/01/27/vacina-contra-covid-19-em-aracaju-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem pode ser vacinado(.|)<.*?(?=<h2)/',
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 61
    ],
    'to' => [
        'name' => 'estado do <strong>Tocantins</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/to/tocantins/noticia/2021/01/28/vacina-contra-covid-19-em-palmas-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/(?s)Quem pode ser vacinado atualmente(.|)<.*?(?=<h2)/',
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 67
    ]
);
?>