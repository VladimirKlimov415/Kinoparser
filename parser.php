<?php

function doParsing($year)
	{	
	if ($year==2016){
		$a=316;
	}
	if ($year==2015){
		$a=292;
	}
	if ($year==2014){
		$a=261;
	}
	if ($year==2013){
		$a=230;
	}
	if ($year==2012){
		$a=227;
	}
	if ($year==2011){
		$a=141;
	}
	if ($year==2010){
		$a=140;
	}
		
		

			
	$curl = curl_init(); 
	$all_data = array();


	$url = "https://www.kinopoisk.ru/top/lists/$a/";

	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

	$result = curl_exec($curl);//ïîëó÷åíèå èñõîäíîé ñòðàíèöû äëÿ ïàðñèíãà
	$result = ICONV("Windows-1251", "UTF-8", $result); //ñìåíà êîäèðîâêè

	$movies = array();


	preg_match_all('!font-size: 13px; font-weight: bold.*all">(.*?)<\/a>!',$result,$match);
	$movies['title'] = $match[1]; //ïàðñèíã íàçâàíèé

	
	preg_match_all('!font-size: 13px; font-weight: bold.*(\d{4})\)!',$result,$match);
	$movies['year'] = $match[1]; //ïàðñèíã äàò âûõîäà

	preg_match_all('!src="https:\/\/st\.kp\.yandex\.net\/images\/spacer\.gif"\stitle="\/images(.*jpg)!',$result,$match);

	$movies['images'] = $match[1]; //ïàðñèíã ññûëîê íà êàðòèíêè

	
		foreach ($movies['images'] as $key => &$value) {
			# code...
			$value ='https://st.kp.yandex.net/images'."$value"; //äîáàâëåíèå çàãîëîâêà ññûëêè
			}
			unset($value);	

	

	preg_match_all('!<\/nobr><\/span><\/div>\n.*\n.*\n.*">(.*)<\/a>!',$result,$match);
	$movies['director'] = $match[1]; //ïàðñèíã ðåæèññåðîâ

	preg_match_all('!class="WidgetStars" style="height: 35px; width: 225px; position: relative;".*="(.*)"!',$result,$match);
	$movies['rating'] = $match[1]; //ïàðñèíã ðåéòèíãîâ


	preg_match_all('!<\/nobr><\/span><\/div>\n.*\n(.*)!',$result,$match);
	$movies['country'] = $match[1];// ïàðñèíã ñòðàíû ïðîèçâîäñòâà
	

		foreach ($movies['country'] as $key => &$value) {
				# code...
				$value = trim($value,',. '); //óäàëåíèå ëèøíèõ ñèìâîëîâ
				}
				unset($value);

	preg_match_all('!<\/nobr><\/span><\/div>\n.*\n.*\n.*\n\s*(.*)!',$result,$match);
	$movies['genres'] = $match[1];
		foreach ($movies['genres'] as $key => &$value) {
				# code...
				$value = trim($value,'(.)'); //óäàëåíèå ëèøíèõ ñèìâîëîâ
				}
				unset($value);

	preg_match_all('!<span class="gray_text"><a class="lined" href="\/name.*?\/">(.*?)<!',$result,$match);
	$movies['actor'] = $match[1];//ïàðñèíã àêòåðîâ

	preg_match_all('!<nobr>(.*)<\/nobr>!',$result,$match);
	$movies['runtime'] = $match[1];//ïàðñèíã ïðîäîëæèòåëüíîñòè ôèëüìà



	foreach($movies as $key => $value) {
        for ($i = 0; $i < count ($movies[$key]);$i++){
            $data[$i][$key] = $movies[$key][$i];
        }
    }
    
    $all_data = array_merge($data,$all_data);

    return $all_data;
   
   }
    


?>



