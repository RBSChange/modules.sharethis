<?php
/**
 * sharethis_BlockPinitAction
 * @package modules.sharethis.lib.blocks
 */
class sharethis_BlockPinitAction extends website_BlockAction
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
	
		return website_BlockView::SUCCESS;
	}
}