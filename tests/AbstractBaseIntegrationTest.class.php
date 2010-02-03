<?php
/**
 * @package modules.sharethis.tests
 */
abstract class sharethis_tests_AbstractBaseIntegrationTest extends sharethis_tests_AbstractBaseTest
{
	/**
	 * @return void
	 */
	public function prepareTestCase()
	{
		$this->loadSQLResource('integration-test.sql', true, false);
	}
}