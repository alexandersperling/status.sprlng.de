<?php
	function getData(){
		#get addresses and count them
		$addresses = file("addresses.conf",FILE_IGNORE_NEW_LINES);
		$numberOfAddresses = count($addresses);
		#make curl requests and print them
			for($i=0; $i < $numberOfAddresses; $i++){
				$request = curl_init();
				#set options for curl | no output, URL from array
				curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($request, CURLOPT_URL,$addresses[$i]);
				curl_exec($request);
				#get info from curl request 
				$response = curl_getinfo($request);
				
				switch(true) {

				case (preg_match('/^10[0-2]/',$response['http_code'])):
					echo "<tr class=\"w3-pale-yellow\"><td>$addresses[$i]</td><td><span class=\"w3-badge w3-yellow w3-text-yellow\">1</span></td><td>$response[http_code]</td></tr>";
					break;
				case (preg_match('/^2[02][0-8]/',$response['http_code'])):
					echo "<tr class=\"w3-pale-green\"><td class=\"w3-center\">$addresses[$i]</td><td class=\"w3-center\"><span class=\"w3-badge w3-green w3-text-green\">1</span></td><td class=\"w3-center\">$response[http_code]</td></tr>";
					break;
				case (preg_match('/^30[0-8]/',$response['http_code'])):
					echo "<tr class=\"pale-orange\"><td class=\"w3-center\">$addresses[$i]</td><td class=\"w3-center\"><span class=\"w3-badge w3-orange w3-text-orange\">1</span></td><td class=\"w3-center\">$response[http_code]</td></tr>";
					break;
				case (preg_match('/^4[0-5][0-9]/',$response['http_code'])):
					echo "<tr class=\"w3-pale-red\"><td class=\"w3-center\">$addresses[$i]</td><td class=\"w3-center\"><span class=\"w3-badge w3-red w3-text-red\">0</span></td><td class=\"w3-center\">$response[http_code]</td></tr>";
					break;
				case (preg_match('/^5[01][0-9]/',$response['http_code'])):
					echo "<tr class=\"w3-pale-red\"><td class=\"w3-center\">$addresses[$i]</td><td class=\"w3-center\"><span class=\"w3-badge w3-red w3-text-red\">0</span></td><td class=\"w3-center\">$response[http_code]</td></tr>";
					break;
				}
			}
		}
