<?php
/**
 * @package modules.sharethis.tests
 */
abstract class sharethis_tests_AbstractBaseFunctionalTest extends sharethis_tests_AbstractBaseTest
{
	/**
	 * @return void
	 */
	public function prepareTestCase()
	{
		$this->loadSQLResource('functional-test.sql', true, false);
	}
}