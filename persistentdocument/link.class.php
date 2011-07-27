<?php
/**
 * sharethis_persistentdocument_link
 * @package sharethis.persistentdocument
 */
class sharethis_persistentdocument_link extends sharethis_persistentdocument_linkbase
{
	/**
	 * @param String $url
	 * @param String $title
	 * @return String
	 */
	public function getShareUrlIndirection($url, $title)
	{
		return $this->getDocumentService()->getShareUrlIndirection($this, $url, $title);
	}
	
	/**
	 * @param String $url
	 * @param String $title
	 * @param String $title
	 * @return String
	 */
	public function getShareUrl($url, $title, $varSeparator = '&amp;')
	{
		return $this->getDocumentService()->getShareUrl($this, $url, $title, $varSeparator);
	}
	
	/**
	 * @param String $url
	 * @param String $title
	 * @return String
	 */
	public function getShareOnclick($url, $title)
	{
		return $this->getDocumentService()->getShareOnclick($this, $url, $title);
	}
}