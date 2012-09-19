<?php
/**
 * sharethis_persistentdocument_link
 * @package sharethis.persistentdocument
 */
class sharethis_persistentdocument_link extends sharethis_persistentdocument_linkbase
{
	/**
	 * @param string $url
	 * @param string $title
	 * @return string
	 */
	public function getShareUrlIndirection($url, $title)
	{
		return $this->getDocumentService()->getShareUrlIndirection($this, $url, $title);
	}
	
	/**
	 * @param string $url
	 * @param string $title
	 * @param string $title
	 * @return string
	 */
	public function getShareUrl($url, $title, $varSeparator = '&amp;')
	{
		return $this->getDocumentService()->getShareUrl($this, $url, $title, $varSeparator);
	}
	
	/**
	 * @param string $url
	 * @param string $title
	 * @return string
	 */
	public function getShareOnclick($url, $title)
	{
		return $this->getDocumentService()->getShareOnclick($this, $url, $title);
	}
}