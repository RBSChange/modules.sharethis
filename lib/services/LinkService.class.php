<?php
/**
 * sharethis_LinkService
 * @package sharethis
 */
class sharethis_LinkService extends f_persistentdocument_DocumentService
{
	/**
	 * @var sharethis_LinkService
	 */
	private static $instance;

	/**
	 * @return sharethis_LinkService
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
	 * @return sharethis_persistentdocument_link
	 */
	public function getNewDocumentInstance()
	{
		return $this->getNewDocumentInstanceByModelName('modules_sharethis/link');
	}

	/**
	 * Create a query based on 'modules_sharethis/link' model.
	 * Return document that are instance of modules_sharethis/link,
	 * including potential children.
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createQuery()
	{
		return $this->pp->createQuery('modules_sharethis/link');
	}
	
	/**
	 * Create a query based on 'modules_sharethis/link' model.
	 * Only documents that are strictly instance of modules_sharethis/link
	 * (not children) will be retrieved
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createStrictQuery()
	{
		return $this->pp->createQuery('modules_sharethis/link', false);
	}

	/**
	 * @param sharethis_persistentdocument_link $document
	 * @param String $url
	 * @param String $title
	 * @return String
	 */
	public function getShareUrlIndirection($document, $url, $title)
	{
		return LinkHelper::getActionUrl('sharethis', 'ShareUrl', array('cmpref' => $document->getId(), 'url' => $url, 'title' => $title));
	}

	/**
	 * @param sharethis_persistentdocument_link $document
	 * @param String $url
	 * @param String $title
	 * @param String $varSeparator
	 * @return String
	 */
	public function getShareUrl($document, $url, $title, $varSeparator = '&amp;')
	{
		return null;
	}

	/**
	 * @param sharethis_persistentdocument_link $document
	 * @param String $url
	 * @param String $title
	 * @return String
	 */
	public function getShareOnclick($document, $url, $title)
	{
		return null;
	}
	
	/**
	 * @return sharethis_persistentdocument_site[]
	 */
	public function getAllPublishedBoSorted()
	{
		$query = $this->createQuery()->add(Restrictions::published());
		$query->add(Restrictions::descendentOf(ModuleService::getInstance()->getRootFolderId('sharethis')));
		return $query->find();
	}
	
	/**
	 * @param sharethis_persistentdocument_group $group
	 * @return sharethis_persistentdocument_site[]
	 */
	public function getPublishedBoSortedByGroup($group)
	{
		$query = $this->createQuery()->add(Restrictions::published());
		$query->add(Restrictions::descendentOf(ModuleService::getInstance()->getRootFolderId('sharethis')));
		$query->add(Restrictions::eq('group', $group));
		return $query->find();
	}
	
	/**
	 * @param String $string
	 * @param Array $replacements
	 */
	protected function applyReplacements($string, $replacements)
	{
		if (!$string)
		{
			return '';
		}

		if(is_array($replacements))
		{
			foreach ($replacements as $key => $value)
			{
				$string = str_replace('{' . $key . '}', $value, $string);				
			}
		}

		// Remove the not-replaced elements.
		$string = preg_replace('#\{(.*)\}#', '-', $string);
		return $string;
	}
	
	// Depreacted
	
	/**
	 * @deprecated (will be removed in 4.0) use getShareUrlIndirection
	 */
	public function getShareCurrentUrlIndirection($document, $url, $title)
	{
		return $this->getShareUrlIndirection($document, $url, $title);
	}

	/**
	 * @deprecated (will be removed in 4.0) use getShareUrl
	 */
	public function getShareCurrentUrl($document, $url, $title, $varSeparator = '&amp;')
	{
		return $this->getShareUrl($document, $url, $title, $varSeparator);
	}

	/**
	 * @deprecated (will be removed in 4.0) use getShareOnclick
	 */
	public function getShareCurrentOnclick($document, $url, $title)
	{
		return $this->getShareOnclick($document, $url, $title);
	}
}