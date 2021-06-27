<?php 

$day =  explode('-',date('d-m-Y'))[0];
 
$past_days = '';

for($i=1;$i<=(int)$day;$i++){
    $char_i = (String)$i;
    if(strlen($char_i)==1){$char_i='0'.$char_i;}
    $past_days.=$char_i."|";
}


function retrieveCurrentAge($textArray,$patern_age){ 
    
    #sem informação de idade

      
    if($patern_age=='/./' || implode(" ",$textArray)=="Idosos"){return 60;}

    #remove informação espúria de dia
    $textArray = preg_replace('/Dia \d\d/', '', $textArray);
     
    preg_match_all('/\d\d/',implode(" ",$textArray),$ages);
 

    #sentinela   
    $min_age = 1000;

    #coleta o menor valor na listagem, espera-se que o regex separe apenas informações sobre idosos
    foreach ($ages[0] as $key => $value) {
        $value = (int)$value;
        if($value < $min_age){
            $min_age = $value;
        }
    }
    if($min_age==1000){return 'checar';}
    return $min_age;
}


function retrieveCurrentAgeAll($textArray,$patern_age){ 
    
    #sem informação de idade
      
    #if($patern_age=='/./' || implode(" ",$textArray)=="Idosos"){return 60;}

    #remove informação espúria de dia
    #$textArray = preg_replace('/Dia \d\d/', '', $textArray);
     
    preg_match_all('/\d\d/',implode(" ",$textArray),$ages);
 
    #sentinela   
    $min_age = 1000;

    #coleta o menor valor na listagem, espera-se que o regex separe apenas informações sobre idosos
    foreach ($ages[0] as $key => $value) {
        $value = (int)$value;
        if($value < $min_age){
            $min_age = $value;
        }
    }
    if($min_age==1000){return 'checar';}
    return $min_age;
}

#


function  getRegexResult($regexResult){

    if(sizeof($regexResult)==0) {
        return $regexResult;
    } 
    return $regexResult[0]; 

}

 
$all_states_regex="(?=MACAPÁ|BOA VISTA|MANAUS|RIO BRANCO|PORTO VELHO|PALMAS|BEL.EM|S.O LU.S|TERESINA|JO.O PESSOA|RECIFE|FORTALEZA|NATAL|ARACAJ|MACEI|SALVADOR|BELO HORIZONT|RIO DE JANEIRO|S.O PAULO|FLORIAN.POLIS|PORTO ALEGRE|CURITIBA|VIT.RIA|BRAS.LIA|GOI.NIA|CUIAB.|CAMPO GRANDE|RONDÔNIA)";





function regex_content($state=False,$regex=False){

    $all_states_regex="(?=MACAPÁ|BOA VISTA|MANAUS|RIO BRANCO|PORTO VELHO|PALMAS|BEL.EM|S.O LU.S|TERESINA|JO.O PESSOA|RECIFE|FORTALEZA|NATAL|ARACAJU|MACEI|SALVADOR|BELO HORIZONT|RIO DE JANEIRO|S.O PAULO|FLORIAN.POLIS|PORTO ALEGRE|CURITIBA|VIT.RIA|BRAS.LIA|GOI.NIA|CUIAB.|CAMPO GRANDE|RONDÔNIA)";

    if($regex){
        return $regex;
    }

    if($state){
        $state.="|";
    }
    else{
        $state='';
    }

    $regex_content="/(?s)(.h2>|)(".$state."Idosos em geral<|Quem está entre os grupos vacinados|Veja o calendário para a primeira dose|Quem está sendo vacinado|Grupos vacinados|Divisão por data, até|Grupos prioritários|Veja quem pode ser vacinado<|Quem pode ser vacinado(<|)|Veja quem poderá receber 1ª dose:|Grupos que podem se vacinar por agendamento:|Quem pode receber a 1ª dose|Grupo Atual|(Quais grupos( já|) (começaram a |estão (se vacinando|sendo vacinados))))(|\?|:).*?(<h2|Quem pode receber a 2ª dose|<div>|".$all_states_regex.")/";

      
     
    return $regex_content;

}
  

$regex_age='/([pP]essoas (de|com idades a partir de|a partir de|com)|([iI]|)dosos (que completam|com mais ||a partir |com|acima )(de|)) \d\d( (a (\d\d)|anos(?! (ou mais (com defici|residentes)|de idade com defici|que tenham as seguintes doen|que vivem em asilos))))|. sem doenças preexistentes|interrompida|Idosos(?=;)(^ de idade)/';

$regex_age='/((([pP]essoas|[aA]dultos|homens é mulheres) (de|com(| mais de)|sem comorbidades com|a partir de|acima de|com idades a partir de) |tanto homens quanto mulheres de )\d\d anos(?! (ou mais )com comorbidade)|Pessoas com \d\d anos (ou mais|) sem comorbidades)/';

$regex_age_all='/pessoas entre \d\d e /';


#(?s)(.h2>|)(Idosos em geral<|Quem está entre os grupos vacinados|Veja o calendário para a primeira dose|Quem está sendo vacinado|Quem pode ser vacinado|Quem pode receber a 1ª dose|Grupo Atual|(Quais grupos( já|) (começaram a |estão (se vacinando|sendo vacinados))))(|\?|:).*?(<h2|Quem pode receber a 2ª dose|<div>)