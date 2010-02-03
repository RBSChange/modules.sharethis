<?php
/**
 * @package modules.sharethis.lib
 */
class sharethis_ActionBase extends f_action_BaseAction
{

	/**
	 * Returns the sharethis_SiteService to handle documents of type "modules_sharethis/site".
	 *
	 * @return sharethis_SiteService
	 */
	public function getSiteService()
	{
		return sharethis_SiteService::getInstance();
	}

	/**
	 * Returns the sharethis_BookmarksiteService to handle documents of type "modules_sharethis/bookmarksite".
	 *
	 * @return sharethis_BookmarksiteService
	 */
	public function getBookmarksiteService()
	{
		return sharethis_BookmarksiteService::getInstance();
	}

	/**
	 * Returns the sharethis_BlogsiteService to handle documents of type "modules_sharethis/blogsite".
	 *
	 * @return sharethis_BlogsiteService
	 */
	public function getBlogsiteService()
	{
		return sharethis_BlogsiteService::getInstance();
	}
}