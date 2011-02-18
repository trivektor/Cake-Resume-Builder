<?

class PhotoUploadController extends AppController {
	
	var $name = 'PhotoUpload';
	
	var $uses = array();
	
	var $helpers = array('Cropimage');
	
	var $components = array('JqImgcrop');
	
	function beforeFilter() {
		$this->layout = false;
	}
	
	
	
}

?>