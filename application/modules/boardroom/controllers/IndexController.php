<?php
class Boardroom_IndexController extends Zend_Controller_Action {

	public function init() {

	}

	/**
	 * The default action - show the home page
	 */
	public function indexAction() {
		try {


		} catch ( Exception $ex ) {
			throw new Exception ( '<ERROR>' . $ex->getMessage () . "\n" );
		}

	}

}