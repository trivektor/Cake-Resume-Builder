<?

class Theme extends AppModel {
	
	var $name = 'Theme';
	
	var $useTable = 'themes';
	
	function getThemesList() {
		return $this->Theme->find('list', 
			array(
				'fields' => array('Theme.id', 'Theme.theme'),
				'conditions' => array('status' => 'active')
			)
		);
	}
	
	function getDefaultTheme() {
		$default_theme = $this->find('first', array(
			'conditions' => array('Theme.default' => 1)
		));
		return $default_theme['Theme']['id'];
	}
	
}

?>