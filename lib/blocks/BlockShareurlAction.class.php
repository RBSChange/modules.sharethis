<?php
/**
 * sharethis_BlockShareurlAction
 * @package modules.sharethis.lib.blocks
 */
class sharethis_BlockShareurlAction extends website_BlockAction
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
	 * @param f_mvc_Response $response
	 * @return string
	 */
	public function execute($request, $response)
	{
		$group = sharethis_GroupService::getInstance()->getByCode($this->getConfiguration()->getGroupCode());
		$links = sharethis_LinkService::getInstance()->getPublishedByGroup($group);
		$request->setAttribute('links', $links);
		
		$request->setAttribute('url', $this->findLocalParameterValue('url'));
		$request->setAttribute('title', $this->findLocalParameterValue('title'));
				
		return website_BlockView::SUCCESS;
	}
}