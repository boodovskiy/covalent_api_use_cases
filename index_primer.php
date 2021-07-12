<?php
	$apiKey = "ckey_795e0c912c004ad2ac49b2d2613";
	$apiUrl = "https://api.covalenthq.com/";
	$apiVersion = "v1";

	$chainId = 1; //eth network
	$ethAdress ="0xacd2222f84a713ddfadffccfa866a7eae3e25014";

	$ch = curl_init();

	//curl_setopt($ch, CURLOPT_URL, $apiUrl . $apiVersion . '/' . $chainId . '/address/' . $ethAdress . '/balances_v2/?sort={"quote_rate":1}');
	//curl_setopt($ch, CURLOPT_URL, $apiUrl . $apiVersion . '/' . $chainId . '/address/' . $ethAdress . '/transactions_v2/?match={"quote_rate":{"$gt":0}}');
	curl_setopt($ch, CURLOPT_URL, $apiUrl . $apiVersion . '/' . $chainId . '/address/' . $ethAdress . '/transactions_v2/');
	curl_setopt($ch, CURLOPT_URL, $apiUrl . $apiVersion . '/' . $chainId . '/address/' . $ethAdress . '/transactions_v2/?primer=[{"$match":{"gas_spent":+{+"$lt":+50000+}}},{"$group":{"_id":{"year":{"$year":"block_signed_at"}},"count":{"$sum":1}}}]');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

	curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ':' . '');

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	
	echo "<pre>";
	var_dump(json_decode($result, true) );
	
	curl_close($ch);
?>