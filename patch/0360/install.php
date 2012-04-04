<?php
/**
 * sharethis_patch_0360
 * @package modules.sharethis
 */
class sharethis_patch_0360 extends patch_BasePatch
{
	/**
	 * Entry point of the patch execution.
	 */
	public function execute()
	{
		$this->executeLocalXmlScript("lists.xml");
	}
}