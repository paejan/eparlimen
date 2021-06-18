@php
	/********************************************** 
	 *** Function to display date as DD/MM/YYYY ***
	 **********************************************/
	function DisplayDate($dtmDate){
		$year = substr($dtmDate, 0, 4); // returns YYYY
		$month = substr($dtmDate, 5, 2); // returns MM
		$day = substr($dtmDate, 8, 2); // returns DD
		if($day == '00' || $day == ''){
			$dtmDate = '';
		}else{			
			$dtmDate = $day."/".$month."/".$year;
		}
		return $dtmDate;
	}

	/********************************************** 
	 *** Function to display date as DD/MM/YYYY ***
	 **********************************************/
	function DisplayMasa($dtmDate){
		$masa = substr($dtmDate, 11, 8); // returns YYYY
		return $masa;
	}

	/********************************************** 
	 *** Function to display date as DD/MM/YYYY ***
	 **********************************************/
	function DisplayTime($dtmDate){
		$masa = substr($dtmDate, 11, 8); // returns YYYY
		return $masa;
	}
	
	/********************************************************* 
	 *** Function to convert date to database (YYYY-MM-DD) ***
	 *********************************************************/
	function DBDate($dtmDate){
		if($dtmDate == ''){
			$dtmDate = '';
		}else{
			$year = substr($dtmDate, 6, 4); // returns YYYY
			$month = substr($dtmDate, 3, 2); // returns MM
			$day = substr($dtmDate, 0, 2); // returns DD
			$dtmDate = $year."-".$month."-".$day;
		}
		return $dtmDate;
	}
	
	function DisplayDateF($dtmDate){
		$year = substr($dtmDate, 0, 4); // returns YYYY
		$month = substr($dtmDate, 5, 2); // returns MM
		$day = substr($dtmDate, 8, 2); // returns DD
		if($day == '00' || $day == ''){
			$dtmDate = '';
		}else{			
			$dtmDate = $day." ". month($month)." ".$year;
		}
		return $dtmDate;
	}

	function month($mth){
		if($mth=='01'){ $month_d = "JANUARI"; }
		else if($mth=='02'){ $month_d = "FEBRUARI"; }
		else if($mth=='03'){ $month_d = "MAC"; }
		else if($mth=='04'){ $month_d = "APRIL"; }
		else if($mth=='05'){ $month_d = "MEI"; }
		else if($mth=='06'){ $month_d = "JUN"; }
		else if($mth=='07'){ $month_d = "JULAI"; }
		else if($mth=='08'){ $month_d = "OGOS"; }
		else if($mth=='09'){ $month_d = "SEPTEMBER"; }
		else if($mth=='10'){ $month_d = "OKTOBER"; }
		else if($mth=='11'){ $month_d = "NOVEMBER"; }
		else if($mth=='12'){ $month_d = "DISEMBER"; }
		
		return $month_d;
	}

	/********************************************** 
	 *** Function to display date as DD/MM/YYYY ***
	 **********************************************/
	function get_datediff($dtmDate1,$dtmDate2){
		$year1 = substr($dtmDate1, 0, 4); // returns YYYY
		$month1 = substr($dtmDate1, 5, 2); // returns MM
		$day1 = substr($dtmDate1, 8, 2); // returns DD

		$year2 = substr($dtmDate2, 0, 4); // returns YYYY
		$month2 = substr($dtmDate2, 5, 2); // returns MM
		$day2 = substr($dtmDate2, 8, 2); // returns DD

		$d1=mktime(0,0,0,intval($month1),intval($day1),intval($year1));
		$d2=mktime(0,0,0,intval($month2),intval($day2),intval($year2));
		
		$ddiff = floor(($d2-$d1)/86400);


		return $ddiff+1;
	}

	function get_yeardiff($dtmDate1,$dtmDate2){
		$year1 = substr($dtmDate1, 0, 4); // returns YYYY
		$month1 = substr($dtmDate1, 5, 2); // returns MM
		$day1 = substr($dtmDate1, 8, 2); // returns DD

		$year2 = substr($dtmDate2, 0, 4); // returns YYYY
		$month2 = substr($dtmDate2, 5, 2); // returns MM
		$day2 = substr($dtmDate2, 8, 2); // returns DD

		$d1=mktime(0,0,0,$month1,$day1,$year1);
		$d2=mktime(0,0,0,$month2,$day2,$year2);
		
		$ddiff = floor((($d2-$d1)/86400)/365);


		return $ddiff;
	}
	
	function get_ages($birthDate){
		//date in mm/dd/yyyy format; or it can be in other formats as well
		$birthDate = DisplayDate($birthDate); //"12/17/1983";
		//explode the date to get month, day and year
		$birthDate = explode("/", $birthDate);
		//get age from date or birthdate
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[0], $birthDate[2]))) > date("md")?((date("Y")-$birthDate[2])-1):(date("Y") - $birthDate[2]));
		//echo "Age is:" . $age;
		return $age;
	}
	
	function nama_hari($day){
		if($day=='1'){ $hari = "Isnin"; }
		else if($day=='2'){ $hari = "Selasa"; }
		else if($day=='3'){ $hari = "Rabu"; }
		else if($day=='4'){ $hari = "Khamis"; }
		else if($day=='5'){ $hari = "Jumaat"; }
		else if($day=='6'){ $hari = "Sabtu"; }
		else if($day=='7'){ $hari = "Ahad"; }
		
		return $hari;
	}
	function nama_minggu($week){
		if($week=='1'){ $minggu = "PERTAMA"; }
		else if($week=='2'){ $minggu = "KEDUA"; }
		else if($week=='3'){ $minggu = "KETIGA"; }
		else if($week=='4'){ $minggu = "KEEMPAT"; }
		else if($week=='5'){ $minggu = "KELIMA"; }
		else if($week=='6'){ $minggu = "KEENAM"; }
		else if($week=='7'){ $minggu = "KETUJUH"; }
		else if($week=='8'){ $minggu = "KELAPAN"; }
		else if($week=='9'){ $minggu = "KESEMBILAN"; }
		else if($week=='10'){ $minggu = "KESEPULUH"; }
		else if($week=='11'){ $minggu = "KESEBELAS"; }
		else if($week=='12'){ $minggu = "KEDUABELAS"; }
		else if($week=='13'){ $minggu = "KETIGABELAS"; }
		else if($week=='14'){ $minggu = "KEEMPATBELAS"; }
		else if($week=='15'){ $minggu = "KELIMABELAS"; }
		else if($week=='16'){ $minggu = "KEENAMBELAS"; }
		else if($week=='17'){ $minggu = "KETUJUHBELAS"; }
		else if($week=='18'){ $minggu = "KELAPANBELAS"; }
		else if($week=='19'){ $minggu = "KESEMBILANBELAS"; }
		else if($week=='20'){ $minggu = "KEDUAPULUH"; }
		
		return $minggu;
	}

@endphp