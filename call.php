<?php

// more details at GET https://developer.foursquare.com/docs/api/venues/search

//GET https://api.foursquare.com/v2/venues/VENUE_ID/photos

/*
Sample url for photo will be made from the respose you get from above api call

that includes
prefix + size (Width x Height) +suffix

https://developer.foursquare.com/docs/api/venues/photos

https://igx.4sqi.net/img/general/500x300/1219396_eq_4BJum9qzI6ExEUp-NMr1k8KHgr8QYT7KOb053q7E.jpg
*/

ini_set("display_errors","On");
$client_key = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$client_secret = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";

/*
curl -X GET -G \
  'https://api.foursquare.com/v2/venues/explore' \
    -d client_id="CLIENT_ID" \
    -d client_secret="CLIENT_SECRET" \
    -d v="20180323" \
    -d ll="40.7243,-74.0018" \
    -d query="coffee" \
    -d limit=1
*/
$url = 'https://api.foursquare.com/v2/venues/explore';
$fields = array(
	'client_id' => urlencode($client_key),
	'client_secret' => urlencode($client_secret),
	'v' => '20180323',
	'll' => '40.7243,-74.0018',
	'query' => 'coffee',
	'limit' => 1
	);

$fields_string="";

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

echo "<br>", $fields_string;

$url = $url.'?'.$fields_string;

echo "<br>",$url;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$result = curl_exec($ch);
curl_close($ch);  

var_dump($result);
?>
