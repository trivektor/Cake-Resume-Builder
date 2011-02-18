<?

class EmailProtectHelper extends AppHelper {
	
	function string_to_ascii($string)
	{
		
		$asciiString = '';

		for($i = 0; $i != strlen($string); $i++)
		{

		     $asciiString .= "&#".ord($string[$i]).";";

		}

		return $asciiString;
	}
	
	function obfuscate_email($email) {
		$email_obfuscated = $this->string_to_ascii($email);
		
		echo '<script type="text/javascript">document.write("<a hr"+"ef=&#109;&#97;&#105;&#108;&#116;&#111;&#58;");document.write("'.$email_obfuscated.'>'.$email_obfuscated.'</a>");</script>
		';
	}
	
}