<?

class AnalyticComponent extends Object {
	
	var $components = array('RequestHandler');
	
	function update_browser_stats($resume_analytic_id) {
		
		$this->VisitorBrowser = ClassRegistry::init('VisitorBrowser');
		
		$visitorBrowser = $this->VisitorBrowser->findByResumeAnalyticId($resume_analytic_id);
		
		if (empty($visitorBrowser) || time() - strtotime($visitorBrowser['VisitorBrowser']['stamp']) > 300) {
			$browser = get_browser(null, true);
			$this->data['VisitorBrowser']['resume_analytic_id'] = $resume_analytic_id;
			$this->data['VisitorBrowser']['browser'] = $browser['browser'];
			$this->data['VisitorBrowser']['version'] = $browser['version'];
			$this->data['VisitorBrowser']['platform'] = $browser['platform'];
			$this->VisitorBrowser->save($this->data);
		}
		
	}
	
	function update_domain_name_stats($resume_analytic_id) {
		
		$this->VisitorDomainName = ClassRegistry::init('VisitorDomainName');
		
		$visitorDomainName = $this->VisitorDomainName->findByResumeAnalyticId($resume_analytic_id);
		
		if (empty($visitorDomainName) || time() - strtotime($visitorDomainName['VisitorDomainName']['stamp']) > 300) {
			$this->data['VisitorDomainName']['resume_analytic_id'] = $resume_analytic_id;
			
			$this->data['VisitorDomainName']['ip_address'] = $_SERVER['SERVER_ADDR'];
			$this->data['VisitorDomainName']['domain_name'] = $_SERVER['HTTP_HOST'];
			$this->VisitorDomainName->save($this->data);
		}
		
	}
	
	
	
	
}

?>