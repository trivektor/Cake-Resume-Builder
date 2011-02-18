<?

class TimestampHelper extends AppHelper {
	
	function toDate($timestamp) {
		return date("M d, Y", strtotime($timestamp));
	}
	
	function toHour($timestamp) {
		return date("h:ia", strtotime($timestamp));
	}
	
}

?>