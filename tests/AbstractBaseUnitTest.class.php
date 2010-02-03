<?php
/**
 * @package modules.sharethis.tests
 */
abstract class sharethis_tests_AbstractBaseUnitTest extends sharethis_tests_AbstractBaseTest
{
	/**
	 * @return void
	 */
	public function prepareTestCase()
	{
		$this->resetDatabase();
	}
}