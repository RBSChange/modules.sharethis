<?php
/**
 * @package modules.sharethis
 * @method sharethis_LinkService getInstance()
 */
class sharethis_LinkService extends f_persistentdocument_DocumentService
{
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
		return $this->getPersistentProvider()->createQuery('modules_sharethis/link');
	}
	
	/**
	 * Create a query based on 'modules_sharethis/link' model.
	 * Only documents that are strictly instance of modules_sharethis/link
	 * (not children) will be retrieved
	 * @return f_persistentdocument_criteria_Query
	 */
	public function createStrictQuery()
	{
		return $this->getPersistentProvider()->createQuery('modules_sharethis/link', false);
	}

	/**
	 * @param sharethis_persistentdocument_link $document
	 * @param string $url
	 * @param string $title
	 * @return string
	 */
	public function getShareUrlIndirection($document, $url, $title)
	{
		return LinkHelper::getActionUrl('sharethis', 'ShareUrl', array('cmpref' => $document->getId(), 'url' => $url, 'title' => $title));
	}

	/**
	 * @param sharethis_persistentdocument_link $document
	 * @param string $url
	 * @param string $title
	 * @param string $varSeparator
	 * @return string
	 */
	public function getShareUrl($document, $url, $title, $varSeparator = '&amp;')
	{
		return null;
	}

	/**
	 * @param sharethis_persistentdocument_link $document
	 * @param string $url
	 * @param string $title
	 * @return string
	 */
	public function getShareOnclick($document, $url, $title)
	{
		if ($document->getPopup())
		{
			return 'accessiblePopup(this); return false;';
		}		
		return null;
	}
	
	/**
	 * @param sharethis_persistentdocument_group $group
	 * @return sharethis_persistentdocument_site[]
	 */
	public function getPublishedByGroup($group)
	{
		return $group->getPublishedLinksArray();
	}
	
	/**
	 * @param string $string
	 * @param array $replacements
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