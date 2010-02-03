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
	 * @param String $currentUrl
	 * @param String $currentTitle
	 * @return String
	 */
	public function getShareCurrentUrlIndirection($document, $currentUrl, $currentTitle)
	{
		return LinkHelper::getActionUrl('sharethis', 'ShareUrl', array('cmpref' => $document->getId(), 'url' => $currentUrl, 'title' => $currentTitle));
	}

	/**
	 * @param sharethis_persistentdocument_link $document
	 * @param String $currentUrl
	 * @param String $currentTitle
	 * @param String $varSeparator
	 * @return String
	 */
	public function getShareCurrentUrl($document, $currentUrl, $currentTitle, $varSeparator = '&amp;')
	{
		return null;
	}

	/**
	 * @param sharethis_persistentdocument_link $document
	 * @param String $currentUrl
	 * @param String $currentTitle
	 * @return String
	 */
	public function getShareCurrentOnclick($document, $currentUrl, $currentTitle)
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
}