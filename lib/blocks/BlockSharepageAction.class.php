<?php
/**
 * sharethis_BlockSharepageAction
 * @package modules.sharethis.lib.blocks
 */
class sharethis_BlockSharepageAction extends website_BlockAction
{
	/**
	 * @see website_BlockAction::execute()
	 *
	 * @param f_mvc_Request $request
	 * @param f_mvc_Response $response
	 * @return String
	 */
	function execute($request, $response)
	{
		$links = sharethis_LinkService::getInstance()->getAllPublishedBoSorted();
		$request->setAttribute('links', $links);
		
		$domain = website_WebsiteModuleService::getInstance()->getCurrentWebsite()->getDomain();
		$request->setAttribute('currentUrl', 'http://' . $domain . LinkHelper::getCurrentUrl());
		$request->setAttribute('currentTitle', $this->getPage()->getTitle());
		return website_BlockView::SUCCESS;
	}
}