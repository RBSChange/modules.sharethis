<?php
/**
 * sharethis_patch_0350
 * @package modules.sharethis
 */
class sharethis_patch_0350 extends patch_BasePatch
{
	/**
	 * Entry point of the patch execution.
	 */
	public function execute()
	{
		$this->execChangeCommand('generate-database', array('sharethis'));
		$this->executeLocalXmlScript('init.xml');
	}

	/**
	 * @return String
	 */
	protected final function getModuleName()
	{
		return 'sharethis';
	}

	/**
	 * @return String
	 */
	protected final function getNumber()
	{
		return '0350';
	}
}