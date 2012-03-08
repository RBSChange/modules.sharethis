<?php
/**
 * sharethis_FacebookcallbackAction
 * @package modules.sharethis.actions
 */
class sharethis_FacebookcallbackAction extends f_action_BaseAction
{
	/**
	 * @param Context $context
	 * @param Request $request
	 */
	public function _execute($context, $request)
	{
		$data = $request->getParameter('data');
		if (is_array($data) && isset($data['fbkey']))
		{
			if ($data['fbkey'] == $context->getStorage()->read('fbkey'))
			{
				$context->getStorage()->remove('fbkey');
				f_event_EventManager::dispatchEvent('facebooklike', $this, $request->getParameters());	
			}
		}
		return null;
	}
	/* (non-PHPdoc)
	 * @see f_action_BaseAction::isSecure()
	 */
	public function isSecure() {
		// TODO Auto-generated method stub
		return false;
		
	}

	
	
}