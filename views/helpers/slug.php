<?

class SlugHelper extends AppHelper {
	
	function enslug($str) {
		$ret = str_replace(' ', '-', $str);
		return $ret;
	}
	
	function deslug($str) {
		$ret = str_replace('-', ' ', $str);
		return $ret;
	}
	
}

?>