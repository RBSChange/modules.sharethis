<?php
/**
 * sharethis_BookmarksiteScriptDocumentElement
 * @package modules.sharethis.persistentdocument.import
 */
class sharethis_BookmarksiteScriptDocumentElement extends import_ScriptDocumentElement
{
	/**
	 * @return sharethis_persistentdocument_bookmarksite
	 */
	protected function initPersistentDocument()
	{
		return sharethis_BookmarksiteService::getInstance()->getNewDocumentInstance();
	}
	
	/**
	 * @return f_persistentdocument_PersistentDocumentModel
	 */
	protected function getDocumentModel()
	{
		return f_persistentdocument_PersistentDocumentModel::getInstanceFromDocumentModelName('modules_sharethis/bookmarksite');
	}
}