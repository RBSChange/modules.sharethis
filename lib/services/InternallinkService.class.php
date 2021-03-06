<?php
/**
 * sharethis_InternallinkService
 * @package sharethis
 */
class sharethis_InternallinkService extends sharethis_LinkService
{
	/**
	 * @var sharethis_InternallinkService
	 */
	private static $instance;

	/**
	 * @return sharethis_InternallinkService
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
	 * @return sharethis_persistentdocument_internallink
	 */
	public function getNewDocumentInstance()
	{
		return $this->getNewDocumentInstanceByModelName('modules_sharethis/internallink');
	}

	/**
	 * Create a query based on 'modules_sharethis/internallink' model.
	 * Return document that are instance of modules_sharethis/internallink,
	 * including potential children.
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createQuery()
	{
		return $this->pp->createQuery('modules_sharethis/internallink');
	}
	
	/**
	 * Create a query based on 'modules_sharethis/internallink' model.
	 * Only documents that are strictly instance of modules_sharethis/internallink
	 * (not children) will be retrieved
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createStrictQuery()
	{
		return $this->pp->createQuery('modules_sharethis/internallink', false);
	}

	/**
	 * @param sharethis_persistentdocument_internallink $document
	 * @param String $url
	 * @param String $title
	 * @param String $varSeparator
	 * @return String
	 */
	public function getShareUrl($document, $url, $title, $varSeparator = '&amp;')
	{
		return $this->generateShareUrl($document, $url, $title, $varSeparator);
	}
	
	/**
	 * @param sharethis_persistentdocument_internallink $document
	 * @param String $url
	 * @param String $title
	 * @param String $varSeparator
	 * @return String
	 */
	protected function generateShareUrl($document, $url, $title, $varSeparator = '&amp;')
	{
		try
		{
			$tag = $document->getPageTag();
			$ts = TagService::getInstance();
			if ($ts->isExclusiveTag($tag))
			{
				$page = $ts->getDocumentByExclusiveTag($tag);
			}
			else if ($ts->isContextualTag($tag))
			{
				$website = website_WebsiteModuleService::getInstance()->getCurrentWebsite();
				$page = $ts->getDocumentByContextualTag($tag, $website);
			}
			
			if ($page !== null)
			{
				$replacements = array('PAGE_TITLE' => $title, 'PAGE_URL' => $url);
			
				$parameters = array();
				if ($document->getMessageName() && $document->getMessagePattern())
				{
					$parameters[$document->getMessageName()] = $this->applyReplacements($document->getMessagePattern(), $replacements);
				}
				return LinkHelper::getDocumentUrl($page, null, $parameters);
			}
		}
		catch (Exception $e)
		{
			if (Framework::isDebugEnabled())
			{
				Framework::exception($e);
			}
		}
		return null;
	}
	
	/**
	 * @param sharethis_persistentdocument_internallink $document
	 * @param String $url
	 * @param String $title
	 * @return String
	 */
	public function getShareOnclick($document, $url, $title)
	{
		$replacements = array('PAGE_TITLE' => $title, 'PAGE_URL' => $url);
		return $this->applyReplacements($document->getOnclickPattern(), $replacements);
	}
}