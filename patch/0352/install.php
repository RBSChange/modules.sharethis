<?php
/**
 * sharethis_patch_0352
 * @package modules.sharethis
 */
class sharethis_patch_0352 extends patch_BasePatch
{
	/**
	 * Entry point of the patch execution.
	 */
	public function execute()
	{
		$this->executeLocalXmlScript("lists.xml");
	}
}