<?

App::import('Vendor', 'markdown');

class MarkdownHelper extends AppHelper {
	
	function parse($text) {
		return $this->output(Markdown($text));
	}
	
}

?>