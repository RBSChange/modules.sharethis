<?php
/**
 * @package modules.sharethis
 * @method sharethis_BlogsiteService getInstance()
 */
class sharethis_BlogsiteService extends sharethis_SiteService
{
	/**
	 * @return sharethis_persistentdocument_blogsite
	 */
	public function getNewDocumentInstance()
	{
		return $this->getNewDocumentInstanceByModelName('modules_sharethis/blogsite');
	}

	/**
	 * Create a query based on 'modules_sharethis/blogsite' model.
	 * Return document that are instance of modules_sharethis/blogsite,
	 * including potential children.
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createQuery()
	{
		return $this->getPersistentProvider()->createQuery('modules_sharethis/blogsite');
	}
	
	/**
	 * Create a query based on 'modules_sharethis/blogsite' model.
	 * Only documents that are strictly instance of modules_sharethis/blogsite
	 * (not children) will be retrieved
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createStrictQuery()
	{
		return $this->getPersistentProvider()->createQuery('modules_sharethis/blogsite', false);
	}
	
	/**
	 * @param sharethis_persistentdocument_bookmarksite $document
	 * @param string $url
	 * @param string $title
	 * @param string $varSeparator
	 * @return string
	 */
	protected function generateShareUrl($document, $url, $title, $varSeparator = '&amp;')
	{
		$replacements = array('PAGE_TITLE' => $title, 'PAGE_URL' => $url);
		
		$parameters = array();
		$message = $this->applyReplacements($document->getMessagePattern(), $replacements);
		$parameters[] = $document->getMessageName() . '=' . urlencode($message);

		return $document->getSubmitUrl() . implode($varSeparator, $parameters);	
	}
}