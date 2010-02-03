<?php
/**
 * sharethis_persistentdocument_link
 * @package sharethis.persistentdocument
 */
class sharethis_persistentdocument_link extends sharethis_persistentdocument_linkbase
{
	/**
	 * @param String $currentUrl
	 * @param String $currentTitle
	 * @return String
	 */
	public function getShareCurrentUrlIndirection($currentUrl, $currentTitle)
	{
		return $this->getDocumentService()->getShareCurrentUrlIndirection($this, $currentUrl, $currentTitle);
	}
	
	/**
	 * @param String $currentUrl
	 * @param String $currentTitle
	 * @param String $currentTitle
	 * @return String
	 */
	public function getShareCurrentUrl($currentUrl, $currentTitle, $varSeparator = '&amp;')
	{
		return $this->getDocumentService()->getShareCurrentUrl($this, $currentUrl, $currentTitle, $varSeparator);
	}
	
	/**
	 * @param String $currentUrl
	 * @param String $currentTitle
	 * @return String
	 */
	public function getShareCurrentOnclick($currentUrl, $currentTitle)
	{
		return $this->getDocumentService()->getShareCurrentOnclick($this, $currentUrl, $currentTitle);
	}
	
	/**
	 * @param f_persistentdocument_PersistentDocument $document
	 * @return String
	 */
/*	public function getShareDocumentUrl($document)
	{
		$title = null;
		if (f_util_ClassUtils::methodExists($document, 'getShareTitle'))
		{
			$title = $document->getShareTitle();
		}
		$url = null;
		if (f_util_ClassUtils::methodExists($document, 'getShareUrl'))
		{
			$url = $document->getShareUrl();
		}
		return $this->getDocumentService()->getShareCurrentUrl($this, $url, $title);
	}*/
	
	/**
	 * @param f_persistentdocument_PersistentDocument $document
	 * @return String
	 */
/*	public function getShareDocumentOnclick($document)
	{
		$title = $document->getShareTitle();
		$url = $document->getShareUrl();
		return $this->getDocumentService()->getShareCurrentOnclick($this, $url, $title);
	}*/
}