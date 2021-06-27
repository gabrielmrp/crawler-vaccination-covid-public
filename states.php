<?php

include('functions.php');


$states = array(
    'ac' => [
        'name' => 'estado do <strong>Acre</strong>',
        'uri_refer' => 'https://g1.globo.com/ac/acre/noticia/2021/01/27/vacina-contra-covid-19-em-rio-branco-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>regex_content(),
        'pattern_age'=>'/Pessoas a partir dos \d\d anos sem comorbidades/',
        'pattern_age_all'=>'/Pessoas a partir dos \d\d anos sem comorbidades/',
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 66
    ],
    'al' => [
        'name' => 'estado de <strong>Alagoas</strong>',
        'uri_refer_before' => 'https://g1.globo.com/al/alagoas/noticia/2021/01/27/vacina-contra-covid-19-em-maceio-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'uri_refer' => 'https://vacina.maceio.al.gov.br/',
        'pattern_content'=>regex_content('','/Grupo Atual:.*?<.span>/'),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 60
    ],
    'am' => [
        'name' => 'estado do <strong>Amazonas</strong>',
        'uri_refer' => 'https://g1.globo.com/google/amp/am/amazonas/noticia/2021/01/27/vacina-contra-covid-19-em-manaus-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=> "/>Quem pode ser vacinado<.*?O que fazer se/",
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>'/Adultos sem doenças preexistentes a partir de \d\d anos/', 
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 60,
        'non_split'
    ],
    'ap' => [
        'name' => 'estado do <strong>Amapá</strong>',
        'uri_refer_before' => 'https://g1.globo.com/ap/amapa/noticia/2021/01/27/vacina-contra-covid-19-em-macapa-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'uri_refer' =>'https://www1.folha.uol.com.br/equilibrioesaude/2021/04/quem-pode-se-vacinar-agora-veja-o-cronograma-pelo-pais.shtml',
        'pattern_content'=>regex_content("MACAP"),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>'/Pessoas com \d\d anos/',  
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 60
    ],
    
    'ba' => [
        'name' => 'estado da <strong>Bahia</strong>',
        'uri_refer_before' => 'https://g1.globo.com/ba/bahia/noticia/2021/01/27/vacina-contra-covid-19-em-salvador-veja-quem-pode-ser-vacinado-hoje.ghtml',
        'uri_refer' =>'https://www1.folha.uol.com.br/equilibrioesaude/2021/04/quem-pode-se-vacinar-agora-veja-o-cronograma-pelo-pais.shtml',
        'pattern_content'=>regex_content("SALVADOR"),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>$regex_age, 
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 61
    ],
    'ce' => [
        'name' => 'estado do <strong>Ceará</strong>',
        'uri_refer' => 'https://www1.folha.uol.com.br/equilibrioesaude/2021/04/quem-pode-se-vacinar-agora-veja-o-cronograma-pelo-pais.shtml',
        'uri_refer_before' =>'https://www1.folha.uol.com.br/equilibrioesaude/2021/04/quem-pode-se-vacinar-agora-veja-o-cronograma-pelo-pais.shtml',
        'pattern_content'=>regex_content("FORTALEZA"),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>'/(entre \d\d e \d\d anos sem comorbidades|Pessoas com \d\d e \d\d anos)/',
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',         'state_age' => 62
    ],
    'df' => [
        'name' => '<strong>Distrito Federal</strong>',
        'uri_refer' => 'https://g1.globo.com/df/distrito-federal/noticia/2021/01/27/vacina-contra-covid-19-no-df-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>regex_content(),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>$regex_age, 
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 66
    ],
    'es' => [
        'name' => 'estado do <strong>Espírito Santo</strong>',
        'uri_refer_before' => 'https://g1.globo.com/es/espirito-santo/noticia/2021/04/08/vila-velha-es-comeca-a-agendar-vacinacao-de-pessoas-com-mais-60-anos-contra-covid-19.ghtml',
        'uri_refer' =>'https://g1.globo.com/es/espirito-santo/noticia/2021/01/27/vacina-contra-covid-19-em-vitoria-veja-quem-pode-ser-vacinado-e-o-que-fazer.ghtml',
        'pattern_content'=>regex_content(),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>$regex_age,#anos
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 65
    ],
    'go' => [
        'name' => 'estado de <strong>Goiás</strong>',
        'uri_refer' => 'https://g1.globo.com/go/goias/noticia/2021/01/27/vacina-contra-covid-19-em-goiania-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>regex_content(),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>$regex_age,  #Idosos a partir de 
        #A vacinação está suspensa até esta sexta-feira (16) por falta de doses.
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 64
    ],
    'ma' => [
        'name' => 'estado do <strong>Maranhão</strong>',
        'uri_refer_before' => 'https://g1.globo.com/ma/maranhao/noticia/2021/04/05/vacina-contra-a-covid-19-em-sao-luis-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'uri_refer' =>'https://www1.folha.uol.com.br/equilibrioesaude/2021/04/quem-pode-se-vacinar-agora-veja-o-cronograma-pelo-pais.shtml',
        'pattern_content'=>regex_content("SÃO LUÍS"),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>'/Pessoas com \d\d anos/',
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 67
    ],
    'mg' => [
        'name' => 'estado de <strong>Minas Gerais</strong>',
        'uri_refer' => 'https://g1.globo.com/mg/minas-gerais/noticia/2021/01/27/vacina-contra-covid-19-em-belo-horizonte-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'uri_refer_before'=>'https://prefeitura.pbh.gov.br/campanha-de-vacinacao-contra-covid-19',
        'pattern_content'=>regex_content(),#regex_content("","/das medidas de prote.*?Compartilhe no Facebook/"),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>'/Pessoas com \d\d /',#"/(?<=BLICO DE )\d\d.*?(?=ANOS)/", #Idosos de 
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 64
    ],
    
    'ms' => [
        'name' => 'estado do <strong>Mato Grosso do Sul</strong>',
        'uri_refer_before' => 'https://g1.globo.com/ms/mato-grosso-do-sul/noticia/2021/01/27/vacina-contra-covid-19-em-campo-grande-veja-quem-pode-ser-vacinado-nesta-primeira-etapa-e-o-que-fazer.ghtml',
        'uri_refer' =>'https://www1.folha.uol.com.br/equilibrioesaude/2021/04/quem-pode-se-vacinar-agora-veja-o-cronograma-pelo-pais.shtml',
        'pattern_content'=>regex_content("CAMPO GRANDE"),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>$regex_age, #pessoas com 
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 61
    ],
    'mt' => [
        'name' => 'estado do <strong>Mato Grosso</strong>',
        'uri_refer_before' => 'https://g1.globo.com/mt/mato-grosso/noticia/2021/01/27/vacina-contra-covid-19-em-cuiaba-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'uri_refer' =>'https://www1.folha.uol.com.br/equilibrioesaude/2021/04/quem-pode-se-vacinar-agora-veja-o-cronograma-pelo-pais.shtml',
        'pattern_content'=>regex_content("CUIABÁ"),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>'/Pessoas com \d\d anos/', 
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 65
    ],
    
    'pa' => [
        'name' => 'estado do <strong>Pará</strong>',
        'uri_refer_before' => 'https://g1.globo.com/pa/para/noticia/2021/01/27/vacina-contra-covid-19-em-belem-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'uri_refer' =>'https://www1.folha.uol.com.br/equilibrioesaude/2021/04/quem-pode-se-vacinar-agora-veja-o-cronograma-pelo-pais.shtml',
        'pattern_content'=>regex_content("BELÉM"),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>'/Pessoas com \d\d anos/',
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 60
    ],
    'pb' => [
        'name' => 'estado da <strong>Paraíba</strong>',
        'uri_refer' => 'https://g1.globo.com/pb/paraiba/noticia/2021/01/27/vacina-contra-covid-19-em-joao-pessoa-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>regex_content(),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 60
    ],
    'pe' => [
        'name' => 'estado de <strong>Pernambuco</strong>',
        'uri_refer' => 'https://g1.globo.com/pe/pernambuco/noticia/2021/01/27/vacina-contra-covid-19-no-recife-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>regex_content(),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>"/Pessoas sem comorbidades com idades a partir de \d\d anos/", #Idosos a partir de 
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 62
    ],
    'pi' => [
        'name' => 'estado do <strong>Piauí</strong>',
        'uri_refer' => 'https://g1.globo.com/pi/piaui/noticia/2021/01/27/vacina-contra-covid-19-em-teresina-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>regex_content(), #Quem está sendo vacinado em Teresina(.|)<
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>'/(Pessoas com mais de \d\d anos|pessoas com \d\d anos ou mais)/', # anos
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 68
    ],
    'pr' => [
        'name' => 'estado do <strong>Paraná</strong>',
        'uri_refer' => 'https://g1.globo.com/pr/parana/noticia/2021/01/27/vacina-contra-covid-19-em-curitiba-veja-quem-pode-ser-vacinado-nesta-primeira-etapa-e-o-que-fazer.ghtml',
        'pattern_content'=>regex_content(),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 67
    ],
    
    
    'rj' => [
        'name' => 'estado do <strong>Rio de Janeiro</strong>',
        'uri_refer' => 'https://g1.globo.com/rj/rio-de-janeiro/noticia/2021/01/27/vacina-contra-covid-19-no-rio-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>regex_content(),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>"/\(".$past_days."\).*?anos/",#'/(Dia ('.$past_days.')  - Pessoas com )\d\d(?= anos)/',
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 60
    ],
    'rn' => [
        'name' => 'estado do <strong>Rio Grande do Norte</strong>',
        'uri_refer' => 'https://g1.globo.com/rn/rio-grande-do-norte/noticia/2021/01/27/vacina-contra-covid-19-em-natal-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>'/Quem pode ser vacinado.*?Segunda dose/',
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>'/Pessoas com \d\d anos ou mais/',
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 63
    ],
    'rs' => [
        'name' => 'estado do <strong>Rio Grande do Sul</strong>',
        'uri_refer_before' => 'https://g1.globo.com/rs/rio-grande-do-sul/noticia/2021/01/27/vacina-contra-covid-19-em-porto-alegre-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'uri_refer' =>'https://prefeitura.poa.br/', 
        'pattern_content'=>regex_content("","/(?s)>Calendário de vacinação Covid-19.*?article>/"),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>'/com \d\d anos ou mai/',
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 63
    ],
    'ro' => [
        'name' => 'estado de <strong>Rondônia</strong>',
        'uri_refer' => 'https://g1.globo.com/ro/rondonia/noticia/2021/01/27/vacina-contra-covid-19-em-porto-velho-veja-quem-pode-ser-vacinado-hoje.ghtml',
        'pattern_content'=>regex_content(),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>'/Pessoas de \d\d a \d\d anos sem comorbidades/',
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
         'state_age' => 65
    ],
    'rr' => [
        'name' => 'estado de <strong>Roraima</strong>',
        'uri_refer' => 'https://g1.globo.com/rr/roraima/noticia/2021/01/28/vacina-contra-covid-19-em-boa-vista-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>regex_content(),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 60
    ],
    'sc' => [
        'name' => 'estado de <strong>Santa Catarina</strong>',
        'uri_refer' => 'https://g1.globo.com/sc/santa-catarina/noticia/2021/01/27/vacina-contra-covid-19-em-florianopolis-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>regex_content(),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>'/(pessoas de \d\d e \d\d anos sem comorbidades|pessoas com \d\d anos ou mais sem comorbidades)/',# Idosos de
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 66
    ],
    'sp' => [
        'name' => 'estado de <strong>São Paulo</strong>',
        'uri_refer_before' => 'https://www.prefeitura.sp.gov.br/cidade/secretarias/saude/vigilancia_em_saude/index.php?p=307599',
        'uri_refer'=>'https://www1.folha.uol.com.br/equilibrioesaude/2021/04/quem-pode-se-vacinar-agora-veja-o-cronograma-pelo-pais.shtml',
        'pattern_content'=>regex_content(">SÃO PAULO"),#regex_content('','/GRUPOS PRIORIT.*?POSTOS DE VACINA/'),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<= datetime=.).*?(?=">)/',
         'state_age' => 67
    ],
    'se' => [
        'name' => 'estado de <strong>Sergipe</strong>',
        'uri_refer' => 'https://g1.globo.com/se/sergipe/noticia/2021/01/27/vacina-contra-covid-19-em-aracaju-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>regex_content(),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>$regex_age,
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 61
    ],
    'to' => [
        'name' => 'estado do <strong>Tocantins</strong>',
        'uri_refer' => 'https://g1.globo.com/to/tocantins/noticia/2021/01/28/vacina-contra-covid-19-em-palmas-veja-quem-pode-ser-vacinado-hoje-e-o-que-fazer.ghtml',
        'pattern_content'=>regex_content(),
        'pattern_age_all'=>$regex_age_all,
        'pattern_age'=>'/Pessoas acima de \d\d anos sem comorbidades/',
        'pattern_updated_at'=>'/(?<="dateModified" datetime=").*?(?=">)/',
        'state_age' => 67
    ]
);

if(isset($_GET['verbose'])){
    echo $states['rs']['pattern_age'];
}
?>
