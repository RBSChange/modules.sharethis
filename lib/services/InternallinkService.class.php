<?php
/**
 * @package modules.sharethis
 * @method sharethis_InternallinkService getInstance()
 */
class sharethis_InternallinkService extends sharethis_LinkService
{
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
		return $this->getPersistentProvider()->createQuery('modules_sharethis/internallink');
	}
	
	/**
	 * Create a query based on 'modules_sharethis/internallink' model.
	 * Only documents that are strictly instance of modules_sharethis/internallink
	 * (not children) will be retrieved
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createStrictQuery()
	{
		return $this->getPersistentProvider()->createQuery('modules_sharethis/internallink', false);
	}

	/**
	 * @param sharethis_persistentdocument_internallink $document
	 * @param string $url
	 * @param string $title
	 * @param string $varSeparator
	 * @return string
	 */
	public function getShareUrl($document, $url, $title, $varSeparator = '&amp;')
	{
		return $this->generateShareUrl($document, $url, $title, $varSeparator);
	}
	
	/**
	 * @param sharethis_persistentdocument_internallink $document
	 * @param string $url
	 * @param string $title
	 * @param string $varSeparator
	 * @return string
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
				$website = website_WebsiteService::getInstance()->getCurrentWebsite();
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
	 * @param string $url
	 * @param string $title
	 * @return string
	 */
	public function getShareOnclick($document, $url, $title)
	{
		$replacements = array('PAGE_TITLE' => $title, 'PAGE_URL' => $url);
		return $this->applyReplacements($document->getOnclickPattern(), $replacements);
	}
}