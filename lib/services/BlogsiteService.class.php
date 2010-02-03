<?php
/**
 * sharethis_BlogsiteService
 * @package sharethis
 */
class sharethis_BlogsiteService extends sharethis_SiteService
{
	/**
	 * @var sharethis_BlogsiteService
	 */
	private static $instance;

	/**
	 * @return sharethis_BlogsiteService
	 */
	public static function getInstance()
	{
		if (self::$instance === null)
		{
			self::$instance = self::getServiceClassInstance(get_class());
		}
		return self::$instance;
	}

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
		return $this->pp->createQuery('modules_sharethis/blogsite');
	}
	
	/**
	 * Create a query based on 'modules_sharethis/blogsite' model.
	 * Only documents that are strictly instance of modules_sharethis/blogsite
	 * (not children) will be retrieved
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createStrictQuery()
	{
		return $this->pp->createQuery('modules_sharethis/blogsite', false);
	}
	
	/**
	 * @param sharethis_persistentdocument_bookmarksite $document
	 * @param String $currentUrl
	 * @param String $currentTitle
	 * @param String $varSeparator
	 * @return String
	 */
	protected function generateShareCurrentUrl($document, $currentUrl, $currentTitle, $varSeparator = '&amp;')
	{
		$replacements = array('PAGE_TITLE' => $currentTitle, 'PAGE_URL' => $currentUrl);
		
		$parameters = array();
		$message = $this->applyReplacements($document->getMessagePattern(), $replacements);
		$parameters[] = $document->getMessageName() . '=' . urlencode($message);

		return $document->getSubmitUrl() . implode($varSeparator, $parameters);	
	}
}