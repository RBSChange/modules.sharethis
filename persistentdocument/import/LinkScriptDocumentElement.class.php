<?php
/**
 * sharethis_LinkScriptDocumentElement
 * @package modules.sharethis.persistentdocument.import
 */
class sharethis_LinkScriptDocumentElement extends import_ScriptDocumentElement
{
	/**
	 * @return sharethis_persistentdocument_link
	 */
	protected function initPersistentDocument()
	{
		return sharethis_LinkService::getInstance()->getNewDocumentInstance();
	}
	
	/**
	 * @return f_persistentdocument_PersistentDocumentModel
	 */
	protected function getDocumentModel()
	{
		return f_persistentdocument_PersistentDocumentModel::getInstanceFromDocumentModelName('modules_sharethis/link');
	}
}