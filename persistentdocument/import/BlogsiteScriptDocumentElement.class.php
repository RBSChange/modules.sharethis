<?php
/**
 * sharethis_BlogsiteScriptDocumentElement
 * @package modules.sharethis.persistentdocument.import
 */
class sharethis_BlogsiteScriptDocumentElement extends import_ScriptDocumentElement
{
	/**
	 * @return sharethis_persistentdocument_blogsite
	 */
	protected function initPersistentDocument()
	{
		return sharethis_BlogsiteService::getInstance()->getNewDocumentInstance();
	}
	
	/**
	 * @return f_persistentdocument_PersistentDocumentModel
	 */
	protected function getDocumentModel()
	{
		return f_persistentdocument_PersistentDocumentModel::getInstanceFromDocumentModelName('modules_sharethis/blogsite');
	}
}