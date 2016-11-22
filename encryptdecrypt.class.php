/* encrypt decrypt class for encryption of database */
class EncryptDecrypt
{
function encode($string)
	{
		$output = false;
		$encrypt_method = "AES-256-CBC";
		//$secret_key = 'This is my secret key';
		$secret_key = '65EB3313ED5EFAB489z89hNU'; //152-bit WEP Keys
		$secret_iv = 'AnM2Y63KKnYYYbchoi890jhkK'; //decent key
		// hash
		$key = hash('sha256', $secret_key);
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
		return $output;
	}
		
	function decode($string)
	{
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = '65EB3313ED5EFAB489z89hNU'; //152-bit WEP Keys
		$secret_iv = 'AnM2Y63KKnYYYbchoi890jhkK'; //decent key
		// hash
		$key = hash('sha256', $secret_key);
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		return $output;
	}	
}
