<?php
/**
 * sharethis_ShareUrlAction
 * @package modules.sharethis.actions
 */
class sharethis_ShareUrlAction extends change_Action
{
	/**
	 * @param change_Context $context
	 * @param change_Request $request
	 */
	public function _execute($context, $request)
	{
		$link = DocumentHelper::getDocumentInstance($request->getParameter('cmpref'));
		$url = $link->getShareUrl($request->getParameter('url'), $request->getParameter('title'), '&');
		if ($url !== null)
		{
			change_Controller::getInstance()->redirectToUrl($url);
		}
		else
		{
			change_Controller::getInstance()->redirect('website', 'Error404');
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