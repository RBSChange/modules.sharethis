<?php
/**
 * sharethis_ShareUrlAction
 * @package modules.sharethis.actions
 */
class sharethis_ShareUrlAction extends f_action_BaseAction
{
	/**
	 * @param Context $context
	 * @param Request $request
	 */
	public function _execute($context, $request)
	{
		$link = DocumentHelper::getDocumentInstance($request->getParameter('cmpref'));
		$url = $link->getShareCurrentUrl($request->getParameter('url'), $request->getParameter('title'), '&');
		if ($url !== null)
		{
			HttpController::getInstance()->redirectToUrl($url);
		}
		else
		{
			HttpController::getInstance()->redirect('website', 'Error404');
		}
	}
	
	/**
	 * @return Boolean
	 */
	public function isSecure()
	{
		return false;
	}
}