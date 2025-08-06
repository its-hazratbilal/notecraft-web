<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function debug($array, $e = false) {
	echo "<pre>";
	print_r($array);
	echo "</pre>";

	if($e) exit;
}

function validate_password($password) {
	if (strlen($password) < 4) {
		return "Password is too short";
	} else if (strlen($password) > 16) {
		return "Password is too long";
	} else if (preg_match("/\s/", $password)) {
		return "Password should not contain any white space";
	} else {
		return "success";
	}
}


function convert_array_to_object($array) {
	return json_decode(json_encode($array), FALSE);
}
