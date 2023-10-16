<?php
//$str = htmlentities($str);
function get_status($status)
{
	if ($status == 'L') {
		$class = "text-live";
		$staus_text = "Published";
	} else if ($status == 'D') {
		$class = "text-danger";
		$staus_text = "Deleted";
	} else if ($status == 'A') {
		$class = "text-archive";
		$staus_text = "Archived";
	}
	$data['class'] = $class;
	$data['staus_text'] = $staus_text;
	return json_encode($data);
}
function chkradio1($str)
{
	if (isset($str) and !empty($str)) {
		return 1;
	}
	return '';
}


function chkemp($str)
{

	if (is_null($str) || trim($str) == "") {
		return '';
	}
	return 1;
}

function chklen1($str)
{
	if (strlen($str) > 1) {
		return '';
	}
	return 1;
}

function chklen2($str)
{
	if (strlen($str) > 2) {
		return '';
	}
	return 1;
}

function chklen3($str)
{
	if (strlen($str) > 3) {
		return '';
	}
	return 1;
}

function chklen4($str)
{
	if (strlen($str) > 4) {
		return '';
	}
	return 1;
}

function chklen5($str)
{
	if (strlen($str) > 5) {
		return '';
	}
	return 1;
}
function chklen200($str)
{
	if (strlen($str) > 200) {
		return '';
	}
	return 1;
}
function chklen15($str)
{
	if (strlen($str) > 15) {
		return '';
	}
	return 1;
}
function chklen50($str)
{
	if (strlen($str) > 50) {
		return '';
	}
	return 1;
}
function chklen100($str)
{
	if (strlen($str) > 100) {
		return '';
	}
	return 1;
}

function chklen5to6($str)
{
	if (strlen($str) > 6) {
		return '';
	}
	return 1;
}

function chklen500($str)
{
	if (strlen($str) > 500) {
		return '';
	}
	return 1;
}
function chklen3500($str)
{
	if (strlen($str) > 3500) {
		return '';
	}
	return 1;
}
function chklen1500($str)
{
	if (strlen($str) > 1500) {
		return '';
	}
	return 1;
}

function chklen3000($str)
{
	if (strlen($str) > 3000) {
		return '';
	}
	return 1;
}


function chklen5000($str)
{
	if (strlen($str) < 10 || strlen($str) > 5000) {
		return '';
	}
	return 1;
}

function chklen3to20($str)
{
	if (strlen($str) < 3 || strlen($str) > 20) {
		return '';
	}
	return 1;
}
function chklen12($str)
{
	if (strlen($str) > 12) {
		return '';
	}
	return 1;
}
function chklen1000000($str)
{
	if (strlen($str) > 1000000) {
		return '';
	}
	return 1;
}
function chklen20($str)
{
	if (strlen($str) > 20) {
		return '';
	}
	return 1;
}
function chklen10($str)
{
	if (strlen($str) > 10) {
		return '';
	}
	return 1;
}

function chkphonelen12($str)
{
	if (strlen($str) < 10 || strlen($str) > 12) {
		return '';
	}
	return 1;
}
function specialcharacter($str)
{
	if (preg_match('/[\'\^£$%&*()}{@#~?><>|=_+¬-],/', $str)) {
		return 1;
		// one or more of the 'special characters' found in $string
	} else {
		return '';
	}
}

function tender_ref_no($str)
{
	if (preg_match('/^[a-z-_/0-9]+$/', $str)) {
		return '';
		// one or more of the 'special characters' found in $string
	} else {
		return 1;
	}
}

function chktitle($str)
{
	if (preg_match('/[a-z-_/0-9()A-Z&,. ]+$/', $str)) {
		return '';
		// one or more of the 'special characters' found in $string
	} else {
		return 1;
	}
}

function checkrtidoctitle($str)
{
	if (preg_match('/[a-z-_/0-9()A-Z&,.:@$%““ ]+$/', $str)) {
		return '';
		// one or more of the 'special characters' found in $string
	} else {
		return 1;
	}
}

function chkname($str)
{
	if (preg_match('/[a-z/A-Z. ]+$/', $str)) {
		return '';
		// one or more of the 'special characters' found in $string
	} else {
		return 1;
	}
}

function chkpannumber($str)
{
	if (preg_match('/[0-9/A-Z]+$/', $str)) {
		return '';
		// one or more of the 'special characters' found in $string
	} else {
		return 1;
	}
}

function chkmediatitle($str)
{
	if (preg_match('/[a-z_/0-9-()A-Z]+$/', $str)) {
		return '';
		// one or more of the 'special characters' found in $string
	} else {
		return 1;
	}
}
function specialcharacter_limit($str)
{
	if (preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/', $str)) {
		return 1;
		// one or more of the 'special characters' found in $string
	} else {
		return '';
	}
}



function address($str)
{
	if (preg_match('/^\\d+ [a-zA-Z ]+, \\d+ [a-zA-Z ]+, [a-zA-Z ]+$/', $str)) {
		return 1;
	} else {
		return '';
	}
}

function chkfile($str_file)
{

	if ($str_file != "") {
		$filename = $str_file;
		$fpath = pathinfo($filename);
		$fext = $fpath['extension'];

		if (
			$fext != "gif" && $fext != "jpg" && $fext != "jpeg" && $fext != "png" &&
			$fext != "GIF" && $fext != "JPG"  && $fext != "JPEG" &&  $fext != "PNG"
		) {
			return '';
		}
		return 1;
	}
}

function chkallfile($str_file)
{

	if ($str_file != "") {
		$filename = $str_file;
		$fpath = pathinfo($filename);
		$fext = $fpath['extension'];
		$fext_small = strtolower($fext);
		if (
			$fext_small != "jpg" && $fext_small != "jpeg" && $fext_small != "png" && $fext_small != "pdf"

		) {
			return '';
		}
		return 1;
	}
}

function chkrecruitcoloumn($str_file)
{

	if ($str_file != "") {

		if (
			$str_file != "A" && $str_file != "D" &&  $str_file != "F" &&  $str_file != "I" &&  $str_file != "onlinedate"  &&  $str_file != "receiptdate" &&  $str_file != "hardcopydate"

		) {
			return '';
		}
		return 1;
	}
}
function chklang($str_file)
{

	if ($str_file != "") {

		if (
			$str_file != "en" && $str_file != "hi" &&  $str_file != "ta"

		) {
			return '';
		}
		return 1;
	}
}

function chkfilepdf($str_file)
{

	if ($str_file != "") {
		$filename = $str_file;
		$fpath = pathinfo($filename);
		$fext = $fpath['extension'];
		$fext_small = strtolower($fext);
		if (
			$fext_small == "pdf"
		) {
			return 1;
		} else {
			return '';
		}
	}
}

function chkfilepdf_img($str_file)
{

	if ($str_file != "") {
		$filename = $str_file;
		$fpath = pathinfo($filename);
		$fext = $fpath['extension'];
		$fext_small = strtolower($fext);
		if (
			$fext_small == "jpg"  ||   $fext_small == "jpeg"  ||     $fext_small == "png"
		) {
			return 1;
		} else {
			return '';
		}
	}
}
function chkfilepdf_video($str_file)
{

	if ($str_file != "") {
		$filename = $str_file;
		$fpath = pathinfo($filename);
		$fext = $fpath['extension'];
		$fext_small = strtolower($fext);
		if (
			$fext_small == "mp4"  ||   $fext_small == "mp3"
		) {
			return 1;
		} else {
			return '';
		}
	}
}

function chkfileslider($str_file)
{

	if ($str_file != "") {
		$filename = $str_file;
		$fpath = pathinfo($filename);
		$fext = $fpath['extension'];
		$fext_small = strtolower($fext);
		if (
			$fext_small == "jpg"  ||   $fext_small == "jpeg"  ||     $fext_small == "png" || $fext_small == "mp4"  ||   $fext_small == "mp3"
		) {
			return 1;
		} else {
			return '';
		}
	}
}

function chksize($str_size)
{
	if ($str_size != "" || $str_size == "0") {
		if ($str_size >= "5300000" || $str_size == "0") {
			return '';
		}
		return 1;
	}
}

function chkint($str)
{

	$goodchar = " 1234567890";

	for ($i = 0; $i < strlen($str); $i++) {
		if (strpos($goodchar, $str[$i]) == false) {
			return '';
		}
	}
	return 1;
}

function chkintcomma($str)
{

	$goodchar = " 1234567890,";

	for ($i = 0; $i < strlen($str); $i++) {
		if (strpos($goodchar, $str[$i]) == false) {
			return '';
		}
	}
	return 1;
}


function chkphone($str)
{

	$goodchar = " 1234567890-";

	for ($i = 0; $i < strlen($str); $i++) {
		if (strpos($goodchar, $str[$i]) == false) {
			return '';
		}
	}
	return 1;
}
function chktelph($str)
{

	$goodchar = " 1234567890-+,/";

	for ($i = 0; $i < strlen($str); $i++) {
		if (strpos($goodchar, $str[$i]) == false) {
			return '';
		}
	}
	return 1;
}

function chktelephone($str)
{

	if ($str[0]!= '+') {
		return '';
	}

	if ((strpos($str, '-') == false) || (strpos($str, '-') <= 1)) {
		return '';
	}

	if ((substr($str, 1, (strpos($str, '.') - 1))) || strlen(substr($str, 1, (strpos($str, '-') - 1))) > 3) {
		return '';
	}

	if (is_nan(substr($str, (strpos($str, '-') + 1), ((strlen($str) - 1) - strpos($str, '-')))) || strlen(substr($str, (strpos($str, '-') + 1), ((strlen($str) - 1) - strpos($str, '-')))) > 14 || strlen(substr($str, (strpos($str, '-') + 1), ((strlen($str) - 1) - strpos($str, '-')))) < 1) {
		return '';
	}
	return 1;
}

function chkchar($str)
{

	$goodchar = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				// $data['return_value'] = 2;
				// $data['return_data'] = $str;
				return '';
			}
		}
	}

	return 1;
	//return 1;
}


function chkpurechar($str)
{

	$goodchar = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				// $data['return_value'] = 2;
				// $data['return_data'] = $str;
				return '';
			}
		}
	}

	return 1;
	//return 1;
}

function chkchar_fname($str)
{

	$goodchar = " abcdefghijklmnopqrstuvwxyz.";

	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				return '';
			}
		}
	}
	return 1;
}

function chkchar_pio($str)
{

	$goodchar = " abcdefghijklmnopqrstuvwxyz-";

	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				return '';
			}
		}
	}
	return 1;
}
function chk_dropdown($str)
{
	$goodchar = " 123456789";

	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				return '';
			}
		}
	}
	return 1;
}

function chkcharpincode($str)
{

	$goodchar = " 0123456789";

	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				return '';
			}
		}
	}
	return 1;
}

function chkchar_cmpappl($str)
{

	$goodchar = " abcdefghijklmnopqrstuvwxyz0123456789/";

	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				return 2;
			}
		}
	}
	return 1;
}


function chkalphanum_title($str)
{

	$goodchar = " abcdefghijklmnopqrstuvwxyz0123456789.()/\-";

	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				return '';
			}
		}
	}
	return 1;
}
function chkalphanum($str)
{

	$goodchar = " abcdefghijklmnopqrstuvwxyz0123456789.";

	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				return '';
			}
		}
	}
	return 1;
}

function chksplcharald($str)
{

	$goodchar = " abcdefghijklmnopqrstuvwxyz0123456789-+=_.?@$%/\&*,;:'#�(){}[]`~!^|\t\r\n";


	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				return '';
			}
		}
	}
	return 1;
}

function chkpasswd1($str)
{
	$goodchar = " abcdefghijklmnopqrstuvwxyz0123456789 ";

	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				return '';
			}
		}
	}
	return 1;
}
function chkspldblcharald($str)
{
	//$dblCodes='"����:';
	$dblCodes = '"';
	$goodchar = " abcdefghijklmnopqrstuvwxyz0123456789-+=_.?@$%/\&*,;:'#�(){}[]`~!^|\t\r\n" . $dblCodes;


	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				return '';
			}
		}
	}
	return 1;
}


function file_upload_error_message($error_code)
{

	switch ($error_code) {
		case 1:
			return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
		case 2:
			return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
		case 3:
			return 'The uploaded file was only partially uploaded';
		case 4:
			return 'No file was uploaded';
		case 5:
			return 'Missing a temporary folder';
		case 6:
			return 'Failed to write file to disk';
		case 7:
			return 'File upload stopped by extension';
		default:
			return 'Unknown upload error';
	}
}

function chkUserNameAdmin($str)
{

	$goodchar = " abcdefghijklmnopqrstuvwxyz0123456789_.@$%/*#";


	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				return '';
			}
		}
	}
	return 1;
}

function chksplcharaldlimit($str)
{

	//$goodchar = " abcdefghijklmnopqrstuvwxyz0123456789-+=_.?@$%/\&*,;:'(){}[]`~!^|\t\r\n";
	$goodchar = " abcdefghijklmnopqrstuvwxyz0123456789/";

	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				return '';
			}
		}
	}
	return 1;
}

function chkmail($str)
{

	if (is_null($str) || trim($str) == "") {
		return '';
	}

	if ((strpos($str, '@') == false) || (strpos($str, '.') == false)) {
		return '';
	}

	if ((strpos($str, '..') !== false) || (strpos($str, '.@') !== false) || (strpos($str, '@.') !== false)) {
		return '';
	}

	if ((strpos($str, '.') == 0) || (strpos($str, '@') == 0) || (strpos($str, '.', (strlen($str) - 1)) == (strlen($str) - 1)) || (strpos($str, '@', (strlen($str) - 1)) == (strlen($str) - 1))) {
		return '';
	}

	return 1;
}

function chkbadpan($str)
{

	$haystack = strtoupper($str);

	$needle   = array('SELECT ', 'DROP ', '--', 'INSERT ', 'DELETE ', '<', '>', '#');

	for ($i = 0; $i < count($needle); $i++) {
		if (strpos($haystack, $needle[$i]) !== false) {

			$replace_str =  str_replace($needle[$i], '', $haystack);
			$get_str = strtolower($replace_str);

			$haystack = $get_str;
		}
		//  $haystack = $replace_str;
	}
	return strtoupper($haystack);

	// return 1;s
}

function chkbadchar($str)
{

	$haystack = $str;

	$needle   = array('SELECT ', 'select ', 'DROP ', 'drop ', '--', 'INSERT ', 'insert ', 'DELETE ', 'delete ', '<', '>', '#');

	for ($i = 0; $i < count($needle); $i++) {
		if (strpos($haystack, $needle[$i]) !== false) {

			$replace_str =  str_replace($needle[$i], '', $haystack);
			$get_str = $replace_str;

			$haystack = $get_str;
		}
		//  $haystack = $replace_str;
	}
	return $haystack;

	// return 1;s
}




function chkbadcharlink($str)
{

	$haystack = $str;

	$needle   = array('SELECT ', 'select ', 'DROP ', 'drop ', '--', 'INSERT ', 'insert ', 'DELETE ', 'delete ', '<', '>');

	for ($i = 0; $i < count($needle); $i++) {
		if (strpos($haystack, $needle[$i]) !== false) {

			$replace_str =  str_replace($needle[$i], '', $haystack);
			$get_str = $replace_str;

			$haystack = $get_str;
		}
		//  $haystack = $replace_str;
	}
	return $haystack;

	// return 1;s
}


function clean_data($data)
{
	$data = htmlspecialchars($data);
	$data = stripslashes($data);
	$data = trim($data);
	$data = strip_tags($data);
	return $data;
}

function chkbadcharEditor($str)
{

	$badch = array('SELECT ', 'DROP ', 'INSERT ', 'DELETE ', 'SCRIPT');


	if (!(is_null($str)) || trim($str) != "") {
		for ($i = 0; $i < count($badch); $i++) {
			if (strpos(strtoupper($str), $badch[$i]) !== false) {
				echo $badch[$i] . "coming";
				return '';
			}
		}
	}
	return 1;
}

function chkuserid($str)
{
	$alphabets = "abcdefghijklmnopqrstuvwxyz0123456789@_.-";

	if (strlen($str) < 6 || strlen($str) > 20) {
		// echo"Not a Valid User ID. UserID must contain 6 to 20 characters. Please Re-Enter";
		return '';
	}
	/*for($i=0;$i< strlen($str);$i++)
		{	
			 //if (!($str{$i} == " "))
			//{
				if (strpos($alphabets,strtolower($str{$i})) == false)
				{
					return '';
				}
			//}
		 
	}*/
	return 1;
}

function chkpasswd($str)
{
	if (strlen($str) < 6 || strlen($str) > 10) {
		// echo"Not a Valid User ID. UserID must contain 6 to 20 characters. Please Re-Enter";
		return '';
	}
	/*$alphabets="abcdefghijklmnopqrstuvwxyz0123456789-+_.?@$%/\&*,;:'(){}[]`~!^| ";
	
	    for($i=0;$i< strlen($str);$i++)
		{	
			 if (!($str{$i} == " "))
			{
				if (strpos($alphabets,strtolower($str{$i})) == false)
				{
					return '';
				}
			}
			
		}*/
	return 1;
}

function chkverifycode($str)
{
	$alphabets = "abcdefghijklmnopqrstuvwxyz0123456789";
	if (strlen($str) < 6) {
		//alert ("Not a Valid Verification Code. Please enter the code shown in the image");
		return '';
	}

	/* for($i=0;$i< strlen($str);$i++)
	 {	
			 if (!($str{$i} == " "))
			{
				if (strpos($alphabets,strtolower($str{$i})) == false)
				{
					return '';
				}
			}
			
		}*/
	return 1;
}

//registration number
function chkregnnum($str)
{
	$alphabets = "abcdefghijklmnopqrstuvwxyz0123456789-+_.@$%/\&*,;:'() ";
	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($alphabets, strtolower($str[$i])) == false) {
				return '';
			}
		}
	}
	return 1;
}

//email 

function isValidEmailFormat($email)
{
	if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email))
		return '';
	else
		return 1;
}


// url
function  url($str)
{
	//  /(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/

	//if (!preg_match("#^http://.[a-z0-9-_.]+\.[a-z]{2,4}$#i",$str))
	// 

	//if(!preg_match("http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?",$str))
	//if (!preg_match("#^http://.[a-z0-9-_.]+\.[a-z]$#i",$str))

	// if (preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $str)) {
	// 	return 'test';
	// } else {
	// 	return 1;
	// }
	// $url = strpos($str, 'http') !== 0 ? "http://$str" : $str;

	if (!filter_var($str, FILTER_VALIDATE_URL) === false) {
		return 1;
	} else {
		return '';
	}
	// if (!preg_match("/(?i)\b((?:https?://|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/", $str)) {
	// 	return '';
	// } else {
	// 	return 1;
	// }


	// $url = filter_var($str, FILTER_SANITIZE_URL);

	// // Validate url
	// if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
	// 	return '';
	// } else {
	// 	return 1;
	// }
}
// std

/*function chkphoneNumber($str) 
{
   $alphabets="0123456789";
   if(strlen($str) < 5 || strlen($str) > 8)
   {
	     return '';
   }
   
  for($i=0;$i< strlen($str);$i++)
  {	
			if (!($str{$i} == " "))
			{
				if (strpos($alphabets,$str{$i}) == false)
				{
				  
					return '';
				}
			}
			
		}
	
	
	 return 1;
}*/

function chksltint($str)
{

	$goodchar = " 1234567890,";

	for ($i = 0; $i < strlen($str); $i++) {
		if (strpos($goodchar, $str[$i]) == false) {
			return '';
		}
	}
	return 1;
}

function is_number($number)
{
	$text = (string)$number;
	$textlen = strlen($text);
	if ($textlen == 0)
		return 0;
	for ($i = 0; $i < $textlen; $i++) {
		$ch = ord($text[$i]);
		if (($ch < 48) || ($ch > 57)) return 0;
	}
	return '';
}

function chkphoneNumber($str)
{
	if (strlen($str) < 5 || strlen($str) > 8) {
		return '';
	}
	$vb = is_number($str);
	if ($vb == 0) {
		return '';
	}


	return 1;
}


//std code

function chkstdcode($str)
{

	if (strlen($str) < 3 || strlen($str) > 5) {
		return '';
	}
	/* for($i=0;$i< strlen($str);$i++)
  	 {	
			//if (!($str{$i} == " "))
			//{
				if (strpos($alphabets,$str{$i}) == false)
				{
				  
					return '';
				}
			//}
			
		}*/
	$vb = is_number($str);
	if ($vb == 0) {
		return '';
	}
	return 1;
}

function chkpincode($str)
{

	if (strlen($str) < 2 || strlen($str) > 8) {
		return '';
	}
	/* for($i=0;$i< strlen($str);$i++)
  	 {	
			//if (!($str{$i} == " "))
			//{
				if (strpos($alphabets,$str{$i}) == false)
				{
				  
					return '';
				}
			//}
			
		}*/
	$vb = is_number($str);
	if ($vb == 0) {
		return '';
	}
	return 1;
}

function chkmobilephoneNumber($str)
{
	$alphabets = "1234567890";

	if (strlen($str) < 10 || strlen($str) > 11) {
		return '';
	}

	/* for($i=0;$i< strlen($str);$i++)
  	 {	
			
				if (strpos($alphabets,$str{$i}) == false)
				{
				  
					return '';
				}
			
			
		}*/

	$vb = is_number($str);
	if ($vb == 0) {
		return '';
	}

	return 1;
}

//validation for date format	
/*function isValidDateFormat($date) 
{
  if (preg_match ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $date)) 
  {
	return 1;
} else {
return '';
}
}*/


// function  check_date($strdate)
// {
// 	// echo $strdate;
// 	$date = date_create($strdate);
// 	$new_date = date_format($date, "Y-m-d");
// 	// echo $new_date;
// 	//$strdate="99-44-2008";

// 	//Check the length of the entered Date value 
// 	if ((strlen($new_date) < 10) or (strlen($new_date) > 10)) {
// 		//echo("Enter the date in 'dd//mm/yyyy' format");
// 		return '';
// 	} else {
// 		substr_count($new_date, "-");
// 		//The entered value is checked for proper Date format 
// 		if ((substr_count($new_date, "-")) <> 2) {
// 			//echo("Enter the date in 'dd/mm/yyyy' format");
// 			return '';
// 		} else {
// 			$pos = strpos($new_date, "-");
// 			$date = substr($new_date, 0, ($pos));
// 			$result = preg_match("/^[0-9]+$/", $date, $trashed);
// 			if (!($result)) {
// 				//echo "Enter a Valid Date";
// 				return '';
// 			} else {
// 				if (($date <= 0) or ($date > 31)) {
// 					//echo "Enter a Valid Date";
// 					return '';
// 				}
// 			}
// 			$month = substr($new_date, ($pos + 1), ($pos));
// 			if (($month <= 0) or ($month > 12)) {
// 				//echo "Enter a Valid Month";
// 				return '';
// 			} else {
// 				$result = preg_match("/^[0-9]+$/", $month, $trashed);
// 				if (!($result)) {
// 					//echo "Enter a Valid Month";
// 					return '';
// 				}
// 			}
// 			$year = substr($new_date, ($pos + 4), strlen($new_date));
// 			$result = preg_match("/^[0-9]+$/", $year, $trashed);
// 			if (!($result)) {
// 				//echo "Enter a Valid year";
// 				return '';
// 			} else {
// 				if (($year < 1900) or ($year > 2200)) {

// 					//echo "Enter a year between 1900-2200";
// 					return '';
// 				}
// 			}
// 			// check for leap year if the month and day is Feb 29
// 			if (($month == 2) && ($date == 29)) {
// 				$div4 = $year % 4;
// 				$div100 = $year % 100;
// 				$div400 = $year % 400;

// 				// if not divisible by 4, then not a leap year so Feb 29 is invalid
// 				if ($div4 != 0) {
// 					//alert ("Enter a valid date in DD-MM-YYYY format, Invalid Date"); 
// 					return '';
// 				}

// 				// at this point, year is divisible by 4. So if year is divisible by
// 				// 100 and not 400, then it's not a leap year so Feb 29 is invalid
// 				if (($div100 == 0) && ($div400 != 0)) {
// 					//	alert ("Enter a valid date in DD-MM-YYYY format, Invalid Date"); 
// 					return '';
// 				}
// 			}
// 		}
// 		return 1;
// 	}
// 	// DisplayForm();

// }


// function  check_datetime($strdate)
// {
// 	// echo $strdate;
// 	$date = date_create($strdate);
// 	$new_date = date_format($date, "Y-m-d h:i:s");
// 	// echo $new_date;
// 	//$strdate="99-44-2008";

// 	//Check the length of the entered Date value 
// 	if ((strlen($new_date) < 10) or (strlen($new_date) > 10)) {
// 		//echo("Enter the date in 'dd//mm/yyyy' format");
// 		return '';
// 	} else {
// 		substr_count($new_date, "-");
// 		//The entered value is checked for proper Date format 
// 		if ((substr_count($new_date, "-")) <> 2) {
// 			//echo("Enter the date in 'dd/mm/yyyy' format");
// 			return '';
// 		} else {
// 			$pos = strpos($new_date, "-");
// 			$date = substr($new_date, 0, ($pos));
// 			$result = preg_match("/^[0-9]+$/", $date, $trashed);
// 			if (!($result)) {
// 				//echo "Enter a Valid Date";
// 				return '';
// 			} else {
// 				if (($date <= 0) or ($date > 31)) {
// 					//echo "Enter a Valid Date";
// 					return '';
// 				}
// 			}
// 			$month = substr($new_date, ($pos + 1), ($pos));
// 			if (($month <= 0) or ($month > 12)) {
// 				//echo "Enter a Valid Month";
// 				return '';
// 			} else {
// 				$result = preg_match("/^[0-9]+$/", $month, $trashed);
// 				if (!($result)) {
// 					//echo "Enter a Valid Month";
// 					return '';
// 				}
// 			}
// 			$year = substr($new_date, ($pos + 4), strlen($new_date));
// 			$result = preg_match("/^[0-9]+$/", $year, $trashed);
// 			if (!($result)) {
// 				//echo "Enter a Valid year";
// 				return '';
// 			} else {
// 				if (($year < 1900) or ($year > 2200)) {

// 					//echo "Enter a year between 1900-2200";
// 					return '';
// 				}
// 			}
// 			// check for leap year if the month and day is Feb 29
// 			if (($month == 2) && ($date == 29)) {
// 				$div4 = $year % 4;
// 				$div100 = $year % 100;
// 				$div400 = $year % 400;

// 				// if not divisible by 4, then not a leap year so Feb 29 is invalid
// 				if ($div4 != 0) {
// 					//alert ("Enter a valid date in DD-MM-YYYY format, Invalid Date"); 
// 					return '';
// 				}

// 				// at this point, year is divisible by 4. So if year is divisible by
// 				// 100 and not 400, then it's not a leap year so Feb 29 is invalid
// 				if (($div100 == 0) && ($div400 != 0)) {
// 					//	alert ("Enter a valid date in DD-MM-YYYY format, Invalid Date"); 
// 					return '';
// 				}
// 			}
// 		}
// 		return 1;
// 	}
// 	// DisplayForm();

// }

function check_date($date_time)
{
	if (preg_match("/(\d{4})-(\d{2})-(\d{2})/", $date_time)) {
		return 1;
	} else {
		return '';
	}
}

function check_datetime($date_time)
{
	if (preg_match("/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/", $date_time)) {
		return 1;
	} else {
		return '';
	}
}

function check_datetime_12hours($date_time)
{
	if (preg_match("/^(?:1[012]|0[0-9]):[0-5][0-9] ([AaPp][Mm]$/", $date_time)) {
		return 1;
	} else {
		return '';
	}
}

//User-defined Function to display the form in case of Error
function DisplayForm()
{
	global $strdate;
}

//new function for enews aug 18 ,
//checking field name allowed character 

function chktablename($str)
{

	$goodchar = " abcdefghijklmnopqrstuvwxyz0123456789_";

	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				return '';
			}
		}
	}
	return 1;
}
function chkuserid1($str)
{
	$goodchar = " abcdefghijklmnopqrstuvwxyz0123456789 ";

	for ($i = 0; $i < strlen($str); $i++) {
		if (!($str[$i] == " ")) {
			if (strpos($goodchar, strtolower($str[$i])) == false) {
				return '';
			}
		}
	}
	return 1;
}

function category_len($str)
{
	if (strlen($str) < 5 || strlen($str) > 30) {

		return '';
	}

	return 1;
}

function multipleemail($email)
{


	$MULTI_EMAIL_CHECK = explode(',', $email);


	foreach ($MULTI_EMAIL_CHECK as $value) {

		if (isValidEmailFormat($value) == 2) {
			return '';
		}
	}
}
function destroySession()
{
	$params = session_get_cookie_params();
	setcookie(
		session_name(),
		'',
		time() - 42000,
		$params["path"],
		$params["domain"],
		$params["secure"],
		$params["httponly"]
	);
	session_destroy();
}
function get_Captcha()
{
	session_start();
	$ranStr = md5(microtime());
	$ranStr = substr($ranStr, 0, 6);
	$_SESSION['cap_code'] = $ranStr;
	$newImage = imagecreatefromjpeg("../cap_bg.jpg");
	$txtColor = imagecolorallocate($newImage, 44, 77, 55);
	imagestring($newImage, 5, 5, 5, $ranStr, $txtColor);
	header("Content-type: image/jpeg");
	return imagejpeg($newImage);
}

function getBrowser()
{
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$browser = "N/A";

	$browsers = [
		'/msie/i' => 'Internet explorer',
		'/firefox/i' => 'Firefox',
		'/safari/i' => 'Safari',
		'/chrome/i' => 'Chrome',
		'/edge/i' => 'Edge',
		'/opera/i' => 'Opera',
		'/mobile/i' => 'Mobile browser',
	];

	foreach ($browsers as $regex => $value) {
		if (preg_match($regex, $user_agent)) {
			$browser = $value;
		}
	}

	return $browser;
}

function redirect_error($error)
{

	if ($error == 1) {

		header('Location:../error_msg.php');
		// echo '<script>window.location.href = "../error_msg.php";</script>';
		// exit();
	}
}
