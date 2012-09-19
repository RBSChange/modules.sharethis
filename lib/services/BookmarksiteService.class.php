<?php
/**
 * @package modules.sharethis
 * @method sharethis_BookmarksiteService getInstance()
 */
class sharethis_BookmarksiteService extends sharethis_SiteService
{
	/**
	 * @return sharethis_persistentdocument_bookmarksite
	 */
	public function getNewDocumentInstance()
	{
		return $this->getNewDocumentInstanceByModelName('modules_sharethis/bookmarksite');
	}

	/**
	 * Create a query based on 'modules_sharethis/bookmarksite' model.
	 * Return document that are instance of modules_sharethis/bookmarksite,
	 * including potential children.
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createQuery()
	{
		return $this->getPersistentProvider()->createQuery('modules_sharethis/bookmarksite');
	}
	
	/**
	 * Create a query based on 'modules_sharethis/bookmarksite' model.
	 * Only documents that are strictly instance of modules_sharethis/bookmarksite
	 * (not children) will be retrieved
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createStrictQuery()
	{
		return $this->getPersistentProvider()->createQuery('modules_sharethis/bookmarksite', false);
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
		if ($document->getUrlName())
		{
			$parameters[] = $document->getUrlName() . '=' . urlencode($url);
		}
		if ($document->getTitleName() && $document->getTitlePattern())
		{
			$title = $this->applyReplacements($document->getTitlePattern(), $replacements);
			$parameters[] = $document->getTitleName() . '=' . urlencode($title);
		}
		if ($document->getDescriptionName() && $document->getDescriptionPattern())
		{
			$description = $this->applyReplacements($document->getDescriptionPattern(), $replacements);
			$parameters[] = $document->getDescriptionName() . '=' . urlencode($description);
		}
		
		return $document->getSubmitUrl() . implode($varSeparator, $parameters);	
	}
}