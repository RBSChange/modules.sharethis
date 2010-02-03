<?php
/**
 * sharethis_SiteService
 * @package sharethis
 */
class sharethis_SiteService extends sharethis_LinkService
{
	/**
	 * @var sharethis_SiteService
	 */
	private static $instance;

	/**
	 * @return sharethis_SiteService
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
	 * @return sharethis_persistentdocument_site
	 */
	public function getNewDocumentInstance()
	{
		return $this->getNewDocumentInstanceByModelName('modules_sharethis/site');
	}

	/**
	 * Create a query based on 'modules_sharethis/site' model.
	 * Return document that are instance of modules_sharethis/site,
	 * including potential children.
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createQuery()
	{
		return $this->pp->createQuery('modules_sharethis/site');
	}
	
	/**
	 * Create a query based on 'modules_sharethis/site' model.
	 * Only documents that are strictly instance of modules_sharethis/site
	 * (not children) will be retrieved
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createStrictQuery()
	{
		return $this->pp->createQuery('modules_sharethis/site', false);
	}

	/**
	 * @param sharethis_persistentdocument_site $document
	 * @param String $currentUrl
	 * @param String $currentTitle
	 * @param String $varSeparator
	 * @return String
	 */
	public function getShareCurrentUrl($document, $currentUrl, $currentTitle, $varSeparator = '&amp;')
	{
		if ($document->getShortenUrls())
		{
			$currentUrl = sharethis_ShortenUrlService::getInstance()->shortenUrl($currentUrl);
		}
		return $document->getDocumentService()->generateShareCurrentUrl($document, $currentUrl, $currentTitle, $varSeparator);
	}
	
	/**
	 * @param sharethis_persistentdocument_site $document
	 * @param String $currentUrl
	 * @param String $currentTitle
	 * @param String $varSeparator
	 * @return String
	 */
	protected function generateShareCurrentUrl($document, $currentUrl, $currentTitle, $varSeparator = '&amp;')
	{
		throw new Exception('No implementation to generate URL!');
	}
}