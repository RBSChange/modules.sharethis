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
			self::$instance = new self();
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
	 * @param String $url
	 * @param String $title
	 * @param String $varSeparator
	 * @return String
	 */
	public function getShareUrl($document, $url, $title, $varSeparator = '&amp;')
	{
		if ($document->getShortenUrls())
		{
			$url = website_ShortenUrlService::getInstance()->shortenUrl($url);
		}
		return $document->getDocumentService()->generateShareUrl($document, $url, $title, $varSeparator);
	}
	
	/**
	 * @param sharethis_persistentdocument_site $document
	 * @param String $url
	 * @param String $title
	 * @param String $varSeparator
	 * @return String
	 */
	protected function generateShareUrl($document, $url, $title, $varSeparator = '&amp;')
	{
		throw new Exception('No implementation to generate URL!');
	}
}