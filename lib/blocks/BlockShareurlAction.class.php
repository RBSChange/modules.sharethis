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
	 * @see website_BlockAction::execute()
	 *
	 * @param f_mvc_Request $request
	 * @param f_mvc_Response $response
	 * @return String
	 */
	public function execute($request, $response)
	{
		if ($this->isInBackoffice())
		{
			return website_BlockView::NONE;
		}
	
		$group = sharethis_GroupService::getInstance()->getByCode($this->getConfiguration()->getGroupCode());
		$links = sharethis_LinkService::getInstance()->getPublishedBoSortedByGroup($group);
		$request->setAttribute('links', $links);
		
		$request->setAttribute('url', $this->findLocalParameterValue('url'));
		$request->setAttribute('title', $this->findLocalParameterValue('title'));
		
		return website_BlockView::SUCCESS;
	}
}