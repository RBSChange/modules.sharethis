<?php
/**
 * sharethis_patch_0300
 * @package modules.sharethis
 */
class sharethis_patch_0300 extends patch_BasePatch
{
	/**
	 * Entry point of the patch execution.
	 */
	public function execute()
	{
		$this->executeLocalXmlScript('update.xml');
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
		return '0300';
	}
}