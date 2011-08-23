<?php
/**
 * @package modules.sharethis.lib.services
 */
class sharethis_ModuleService extends ModuleBaseService
{
	/**
	 * Singleton
	 * @var sharethis_ModuleService
	 */
	private static $instance = null;

	/**
	 * @return sharethis_ModuleService
	 */
	public static function getInstance()
	{
		if (is_null(self::$instance))
		{
			self::$instance = new self();
		}
		return self::$instance;
	}
}