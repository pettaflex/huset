<?php
error_reporting(1);
/*
PHP FLukso API class

Date: 2010/04/21
Author: Geert Van Bommel
Licence: free as is, use it and modify it any way you want

Note : sensorid and tokenid used in the example are Flukso Bart's
*/
class Flukso {
	private $sensorid, $token, $interval, $unit;
	private $url='https://api.flukso.net/sensor/';
	
	public function __construct($u_sensorid, $u_token, $u_interval, $u_unit) {
		$this->sensorid = $u_sensorid;
		$this->token = $u_token;
		if (empty($u_interval)) {
			$this->interval = 'hour';
		} else {
			$this->interval = $u_interval;
		}
		if (empty($u_unit)) {
			$this->unit = 'watt';
		} else {
			$this->unit = $u_unit;
		}
		$this->getdata();
	}
	
	private function getdata() {
		// headers according to <a href="http://www.flukso.net/content/jsonrest-api-released<br />    " title="http://www.flukso.net/content/jsonrest-api-released<br />    ">http://www.flukso.net/content/jsonrest-api-released<br />    </a>
		$header=array();
		$header[]="Accept: application/json";
		$header[]="X-Version: 1.0";
		$header[]='X-Token: '.$this->token;
		
		$request=$this->url.$this->sensorid.'?interval='.$this->interval.'&unit='.$this->unit;
			$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$request);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$this->data=curl_exec($ch);
		curl_close($ch);
		
	}
	public function __toString() {
		return $this->data;
	}
	
}
?>
<?

###### usage ##############################################
# your Flukso settings

$sensorid1='87244dd3398f236770672f8add0454bd';# kompressor1_nya
$sensorid2='1c98a5bff124fa494c125089b924b63d';# kompressor2_nya
$sensorid3='c89caaeaf6d0d425d5ff88e844bfa592';# kompressor3_nya
$sensorid4='9b72eab939afac1d9c6a4bec813cb979';# kompressor_nya_anl.
$sensorid5='a73bf0a302e2a2a15956595b9e200984';# kompressor_67
$sensorid6='51010d9170accfec145b0b8ce661d1ad';# nya_pack
$sensorid7='4e67bdde3c46960a73f595c5101a1b4d';# torken
$sensorid8='1e6977edd2b3b274ad6a7761b6c88c83';# Gamla_pack1
$sensorid9='882bfb825ff94d1920355000109d2ed4';# Gamla_pack2
$sensorid10='31cff46c2cd73327b389eb96dbff05db';# vindkraftverket
$sensorid11='b7c9b52737712fc04731b51f43435017';# solceller
# Your sensor id's are displayed under the 'my account' -> 'sensor' tab. Just substitute the sensor id and token with your own and you're ready to go.

$token1='3dd409f8827a009300fdc6d553e6e389';
$token2='c76ee8fb2979987b3a5e9791ca150a71';
$token3='f33c34b1a0ffe40304240fad0184801c';
$token4='784510a31aace3dcf9ea379080222c04';
$token5='479121cdf434b964443019ad27caa49b';
$token6='462d260d98c840a09ecf82ffc86cea25';
$token7='e503710fc20878ce00240b374b925356';
$token8='c54f39348c150e711de746d6dff19e97';
$token9='7ce17c10803ac52a9f2d0807e3489097';
$token10='7d67e022f547cc549065db89e11a6467';
$token11='c075229a67e0f77ae8fb1fdf46d3f8b6';

$div = 0;
# A token associated with the specific sensor id. Different tokens per sensor will allow for varying access permissions, e.g. only allow data in 'month' resolution. This feature will become available in the near future. We now provision a single token per sensor. The token can be found next to its respective sensor id.
#if ($fluksodata == "") print("Error connecting to database!");
if ($timespan == '')	$timespan = 'day' ;
	if ($timespan == 'day')	$div =  4;
	if ($timespan == 'hour')	$div = 60 ;
	
$interval=$timespan;       # Should be one of {hour, day, month, year, night}

$unit='watt';           # Should be one of {watt, kwhperyear, eurperyear, audperyear}


# That's it, now get the data !!
$fluksodata1 = new Flukso($sensorid1, $token1, $interval, $unit);
$fluksodata2 = new Flukso($sensorid2, $token2, $interval, $unit);
$fluksodata3 = new Flukso($sensorid3, $token3, $interval, $unit);
$fluksodata4 = new Flukso($sensorid4, $token4, $interval, $unit);
$fluksodata5 = new Flukso($sensorid5, $token5, $interval, $unit);
$fluksodata6 = new Flukso($sensorid6, $token6, $interval, $unit);
$fluksodata7 = new Flukso($sensorid7, $token7, $interval, $unit);
$fluksodata8 = new Flukso($sensorid8, $token8, $interval, $unit);
$fluksodata9 = new Flukso($sensorid9, $token9, $interval, $unit);
$fluksodata10 = new Flukso($sensorid10, $token10, $interval, $unit);
$fluksodata11 = new Flukso($sensorid11, $token11, $interval, $unit);
# a json object is returned
//print($fluksodata);

# to make it a php array, use json_decode
$fluksodata1_php=json_decode($fluksodata1);
$fluksodata2_php=json_decode($fluksodata2);
$fluksodata3_php=json_decode($fluksodata3);
$fluksodata4_php=json_decode($fluksodata4);
$fluksodata5_php=json_decode($fluksodata5);
$fluksodata6_php=json_decode($fluksodata6);

$fluksodata7_php=json_decode($fluksodata7);

$fluksodata8_php=json_decode($fluksodata8);

$fluksodata9_php=json_decode($fluksodata9);

$fluksodata10_php=json_decode($fluksodata10);
$fluksodata11_php=json_decode($fluksodata11);


/////////////// ta bort förbrukningen för vindkraftverket 
$torken_array = array();
$solceller_array = array();
$vind_array = array();
$nya_pack_array = array();
$gamla_pack_array = array();
$kompressor6_7_array = array();
$kompressor_nya_array = array();
$datum_array = array();
$sum_förbrukning_array = array();
$sum_prod_array = array();
$sum_netto_array = array();

// create array with datetime and 3 columns,nya packeriet, nya kompressor och kompressor 6 och 7

foreach ($fluksodata1_php as $key => $value) {



$kompressor_nya = (($fluksodata1_php[$key][1] + $fluksodata2_php[$key][1] + $fluksodata3_php[$key][1] + $fluksodata4_php[$key][1])*3);
	
$nya_pack = $fluksodata6_php[$key][1]*9;
	
$kompressor_6_7 = $fluksodata5_php[$key][1]*9;

$torken = $fluksodata7_php[$key][1]*3;
  
$vindkraft = $fluksodata10_php[$key][1]*3;
$gamla_pack = (($fluksodata8_php[$key][1] + $fluksodata9_php[$key][1])*3);
   
   
   
$datum = gmdate("Y-m-d H:i:s",$fluksodata1_php[$key][0]);
$solceller = $fluksodata11_php[$key][1]*10;
$sum_förbrukning = $kompressor_nya + $nya_pack + $kompressor_6_7 + $torken + $gamla_pack;
$sum_prod = $solceller + $vindkraft;
$sum_netto = $sum_förbrukning - $sum_prod;

array_push($torken_array,$torken);
array_push($solceller_array,$solceller);
array_push($kompressor6_7_array,$kompressor_6_7);
array_push($gamla_pack_array,$gamla_pack);
array_push($vind_array,$vindkraft);
array_push($kompressor_nya_array,$kompressor_nya);
array_push($nya_pack_array,$nya_pack);
array_push($datum_array,$datum);
array_push($sum_förbrukning_array,$sum_förbrukning);
array_push($sum_prod_array,$sum_prod);
array_push($sum_netto_array,$sum_netto);
 


}

$graph_data = array('datum'=>$datum_array, 'solceller'=>$solceller_array, 'vindkraft'=>$vind_array, 'kompressor_nya' =>$kompressor_nya_array,'nya_pack'=>$nya_pack_array,'torken'=>$torken_array,'kompressor_6_7'=>$kompressor6_7_array,'gamla_pack'=>$gamla_pack_array,'sum_förbrukning'=>$sum_förbrukning_array,'sum_prod'=>$sum_prod_array,'sum_netto'=>$sum_netto_array);
echo json_encode($graph_data);

?>
