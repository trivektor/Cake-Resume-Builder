<?php
class ThemesController extends AppController {

	var $name = 'Themes';

	function index() {
		$this->Theme->recursive = 0;
		$this->set('themes', $this->paginate());
	}

	function view($id = null) {
		
	}

	function add() {
		if (!empty($this->data)) {
			$this->Theme->create();
			if ($this->Theme->save($this->data)) {
				$this->flash(__('Theme saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid theme', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Theme->save($this->data)) {
				$this->flash(__('The theme has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Theme->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid theme', true)), array('action' => 'index'));
		}
		if ($this->Theme->delete($id)) {
			$this->flash(__('Theme deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Theme was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Theme->recursive = 0;
		$this->set('themes', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid theme', true), array('action' => 'index'));
		}
		$this->set('theme', $this->Theme->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Theme->create();
			if ($this->Theme->save($this->data)) {
				$this->flash(__('Theme saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid theme', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Theme->save($this->data)) {
				$this->flash(__('The theme has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Theme->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid theme', true)), array('action' => 'index'));
		}
		if ($this->Theme->delete($id)) {
			$this->flash(__('Theme deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Theme was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
?>