<?php
/**
 * sharethis_BlockFacebooklikeAction
 * @package modules.sharethis.lib.blocks
 */
class sharethis_BlockFacebooklikeAction extends website_BlockAction
{
	/**
	 * @param f_mvc_Request $request
	 * @param f_mvc_Response $response
	 * @return String
	 */
	public function execute($request, $response)
	{
		if ($this->isInBackofficeEdition())
		{
			return website_BlockView::NONE;
		}
		if (!$this->getContext()->hasAttribute('fb_sdk_registered'))
		{
			$lcid = LocaleService::getInstance()->getLCID($this->getLang());
			$appId = $this->getConfiguration()->getAppId();
			$this->getContext()->appendToPlainMarker("
					<div id=\"fb-root\"></div>
					<script>
					window.fbAsyncInit = function() {
						FB.Event.subscribe('edge.create'," .
    						$this->getEdgeCreateCallback()
						. ");
					};
					(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = \"//connect.facebook.net/" . $lcid. "/all.js#xfbml=1". 
					(f_util_StringUtils::isNotEmpty($appId) ? '&appId=' . $appId : '')
					."\";
					fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>"
			, 'top');
			$this->getContext()->setAttribute('fb_sdk_registered', true);
		}
		return website_BlockView::SUCCESS;
	}
	
	/**
	 * JS Callback called by FB.Event.subscribe for the event edge.create
	 * 
	 * @return String
	 */
	protected function getEdgeCreateCallback()
	{
		return 'function(response){}';
	}
}