<?php
/**
 * sharethis_SiteScriptDocumentElement
 * @package modules.sharethis.persistentdocument.import
 */
class sharethis_SiteScriptDocumentElement extends import_ScriptDocumentElement
{
    /**
     * @return sharethis_persistentdocument_site
     */
    protected function initPersistentDocument()
    {
    	return sharethis_SiteService::getInstance()->getNewDocumentInstance();
    }
    
    /**
	 * @return f_persistentdocument_PersistentDocumentModel
	 */
	protected function getDocumentModel()
	{
		return f_persistentdocument_PersistentDocumentModel::getInstanceFromDocumentModelName('modules_sharethis/site');
	}
}