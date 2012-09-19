<?php
/**
 * @package modules.sharethis
 */
class sharethis_Setup extends object_InitDataSetup
{
	public function install()
	{
		$this->executeModuleScript('init.xml');
	}
}