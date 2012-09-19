<?php
/**
 * sharethis_InternallinkScriptDocumentElement
 * @package modules.sharethis.persistentdocument.import
 */
class sharethis_InternallinkScriptDocumentElement extends import_ScriptDocumentElement
{
	/**
	 * @return sharethis_persistentdocument_internallink
	 */
	protected function initPersistentDocument()
	{
		return sharethis_InternallinkService::getInstance()->getNewDocumentInstance();
	}
	
	/**
	 * @return f_persistentdocument_PersistentDocumentModel
	 */
	protected function getDocumentModel()
	{
		return f_persistentdocument_PersistentDocumentModel::getInstanceFromDocumentModelName('modules_sharethis/internallink');
	}
}