<?

class Country extends AppModel {
	
	var $name = 'Country';
	
	var $useTable = 'countries';
	
	function getCountriesList() {
		return $this->find('list', array(
			'fields' => array('Country.id', 'Country.country_name')
		));
	}
	
}

?>