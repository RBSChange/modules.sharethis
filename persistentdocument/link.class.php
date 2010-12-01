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
	
	// Deprecated
	
	/**
	 * @deprecated (will be removed in 4.0) use getShareUrlIndirection
	 */
	public function getShareCurrentUrlIndirection($url, $title)
	{
		return $this->getShareUrlIndirection($url, $title);
	}
	
	/**
	 * @deprecated (will be removed in 4.0) use getShareUrl
	 */
	public function getShareCurrentUrl($url, $title, $varSeparator = '&amp;')
	{
		return $this->getShareUrl($url, $title, $varSeparator);
	}
	
	/**
	 * @deprecated (will be removed in 4.0) use getShareOnclick
	 */
	public function getShareCurrentOnclick($url, $title)
	{
		return $this->getShareOnclick($url, $title);
	}
}