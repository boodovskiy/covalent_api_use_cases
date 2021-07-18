<?php
	$apiKey = "ckey_795e0c912c004ad2ac49b2d2613";
	$apiUrl = "https://api.covalenthq.com/";
	$apiVersion = "v1";

	$chainId = 1; //eth network
	$contractAdress ="0xbc4ca0eda7647a8ab7c2061c2e118a18a936f13d";
	$tokenID = 68; 

	var_dump($_GET);

	$ch = curl_init();

	
	// Step 1. Get NFT Token IDs
	//curl_setopt($ch, CURLOPT_URL, $apiUrl . $apiVersion . '/' . $chainId . '/tokens/' . $contractAdress . '/nft_token_ids/');
	// Step 2. Get external NFT metadata
	curl_setopt($ch, CURLOPT_URL, $apiUrl . $apiVersion . '/' . $chainId . '/tokens/' . $contractAdress . '/nft_metadata/' . $tokenID .'/');
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