<?php
/**
 * sharethis_patch_0351
 * @package modules.sharethis
 */
class sharethis_patch_0351 extends patch_BasePatch
{
	/**
	 * Entry point of the patch execution.
	 */
	public function execute()
	{
		$newPath = f_util_FileUtils::buildWebeditPath('modules/sharethis/persistentdocument/link.xml');
		$newModel = generator_PersistentModel::loadModelFromString(f_util_FileUtils::read($newPath), 'sharethis', 'link');
		$newProp = $newModel->getPropertyByName('popup');
		f_persistentdocument_PersistentProvider::getInstance()->addProperty('sharethis', 'link', $newProp);
	}
}