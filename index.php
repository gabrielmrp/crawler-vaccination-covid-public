<?php
include('states.php');
 
$verbose=isset($_GET['verbose']) ;

function verbose($object,$method='var_dump'){

	if(isset($_GET['verbose']))
	{
		echo "<pre>";

		if($method=='var_dump'){
			var_dump($object);
		}
		else if($method=='print_r'){
			print_r($object);
		}
		else {
			echo $object;
		} 

		echo "</pre>";

	}
	else return;

}

 
$all_urls=[];
$statesList = array_values($states);
$statesInfo = array();
 


 
 


$subset_states = array_keys($states);


 #$subset_states = ['ms','ce','es','rs','sc','rj','sp', 'ac','ap','ba','am'];
  # $subset_states = ['ac','al','ap','am','ba', 'ce', 'df','es','go','ma','mt','ms','mg','pa','pb','pr','pe','pi','rj','rn','rs','ro','rr','sc','sp','se','to'];
 #$subset_states = ['df','es','pb','sp','to'];

foreach ($states as $key => $value) {

	
		$url = $value['uri_refer'];
	if(array_search($key,$subset_states)!==false){


		if(array_search( $url , array_keys($all_urls))!==false){
			#verbose($url."<br>",'echo');

			$result = $all_urls[$url];
			#verbose(strlen($result));
		}
		else{

			$result = file_get_contents($url, false);
			$all_urls[$url] = $result;
			}



	}
	else $result='';

	 
		if(array_search($key,$subset_states)!==false){
			$final_pattern =  $value['pattern_content'];
		

	preg_match($final_pattern, str_replace("\n","",$result), $matches);

	$matches[0] = implode(" ", $matches);

 

  

	verbose("<textarea>".$final_pattern."</textarea>",'echo');



	if(sizeof($matches)>0){
		 
		$matches[0] = strip_tags($matches[0], '');
		$matches[0] = preg_replace('/\(.*?\)/', '', $matches[0]);

 

		 

		if(array_search($key,$subset_states)!==false){

			#print_r([$key,$value['pattern_age']]);
			$pattern_age=$value['pattern_age'] ;
			preg_match_all($pattern_age,$matches[0],$years);




		}
		else {
			$pattern_age="/\d\d(?= anos)/";
			$years= [0=>''];
		}

		preg_match($value['pattern_updated_at'],$result, $updated_at);	


		$statesInfo[$key]['name'] = $value['name'];
		$statesInfo[$key]['uri_refer'] = $value['uri_refer'];
		$statesInfo[$key]['data'] = $matches[0];
		$update_at = preg_replace('/[A-Z]/',' ',getRegexResult($updated_at)); 		

		$statesInfo[$key]['updated_at'] = empty($update_at)?date('d-m-Y'):$update_at;
		$statesInfo[$key]['age'] = retrieveCurrentAge($years[0],$pattern_age);

		}
			
	} 
	else {
 		$statesInfo[$key] = [];
		}
  

}

 
 
$json = json_encode($statesInfo, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

 
$json = json_encode($statesInfo, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
file_put_contents("data.json", $json);

 
verbose($json,'echo');
 

echo strip_tags($json);

 

  
 
#$matches[0] = strip_tags($matches[0], '<li>');

  
?>