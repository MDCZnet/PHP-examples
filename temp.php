<?php

$url = 'https://www.prodejnyzeman.cz/stores.json';

print_r(parse_url($url));

//echo parse_url($url, PHP_URL_HOST);



exit();

$stores = array (
  array (
    "name" => "Jinecká 315, 261 01 Příbram 1",
    "gps" => "49.70240510468295,14.01217951986828",
  ),
  array (
    "name" => "Brodská 1/495, 261 01 Příbram 1-Zdaboř",
    "gps" => "49.69018310277893,14.003845740915239",
  )
  );

$base =  "49.69018310277893,14.003845740915239";
  
foreach ($stores as $store => $values) {
  echo codexworldGetDistanceOpt(explode(',', $base)[0], explode(',', $base)[1], explode(',', $values['gps'])[0], explode(',', $values['gps'])[1]) . PHP_EOL;
 }


 /**
 * Optimized algorithm from http://www.codexworld.com
 *
 * @param float $latitudeFrom
 * @param float $longitudeFrom
 * @param float $latitudeTo
 * @param float $longitudeTo
 *
 * @return float [km]
 */
function codexworldGetDistanceOpt($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
{
    $rad = M_PI / 180;
    //Calculate distance from latitude and longitude
    $theta = $longitudeFrom - $longitudeTo;
    $dist = sin($latitudeFrom * $rad) 
        * sin($latitudeTo * $rad) +  cos($latitudeFrom * $rad)
        * cos($latitudeTo * $rad) * cos($theta * $rad);

    return acos($dist) / $rad * 60 *  1.853;
}