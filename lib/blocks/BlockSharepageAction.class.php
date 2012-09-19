<?php
/**
 * sharethis_BlockSharepageAction
 * @package modules.sharethis.lib.blocks
 */
class sharethis_BlockSharepageAction extends website_BlockAction
{
	/**
	 * @return array or null
	 */
	public function getCacheDependencies()
	{
		return array("modules_sharethis/link");
	}
	
	/**
	 * @param f_mvc_Request $request
	 * @return array
	 */
	public function getCacheKeyParameters($request)
	{
		return array("url" => $_SERVER['REQUEST_URI']);
	}
	
	/**
	 * @param f_mvc_Request $request
	 * @param f_mvc_Response $response
	 * @return string
	 */
	public function execute($request, $response)
	{
		$group = sharethis_GroupService::getInstance()->getByCode($this->getConfiguration()->getGroupCode());
		$links = sharethis_LinkService::getInstance()->getPublishedByGroup($group);
		$request->setAttribute('links', $links);
		
		$domain = website_WebsiteService::getInstance()->getCurrentWebsite()->getDomain();
		$request->setAttribute('currentUrl', LinkHelper::getCurrentUrl());
		$request->setAttribute('currentTitle', $this->getContext()->getTitle());
		return website_BlockView::SUCCESS;
	}
}