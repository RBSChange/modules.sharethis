<?php
/**
 * sharethis_GroupScriptDocumentElement
 * @package modules.sharethis.persistentdocument.import
 */
class sharethis_GroupScriptDocumentElement extends import_ScriptDocumentElement
{
	/**
	 * @return sharethis_persistentdocument_group
	 */
	protected function initPersistentDocument()
	{
		return sharethis_GroupService::getInstance()->getNewDocumentInstance();
	}
	
	/**
	 * @return f_persistentdocument_PersistentDocumentModel
	 */
	protected function getDocumentModel()
	{
		return f_persistentdocument_PersistentDocumentModel::getInstanceFromDocumentModelName('modules_sharethis/group');
	}
}