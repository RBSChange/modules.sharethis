<?php
/**
 * sharethis_ShortenUrlService
 * @package modules.sharethis.lib.services
 */
class sharethis_ShortenUrlService extends BaseService
{
	/**
	 * Singleton
	 * @var sharethis_ShortenUrlService
	 */
	private static $instance = null;

	/**
	 * @return sharethis_ShortenUrlService
	 */
	public static function getInstance()
	{
		if (is_null(self::$instance))
		{
			self::$instance = self::getServiceClassInstance(get_class());
		}
		return self::$instance;
	}
	
	/**
	 * @param String $url
	 * @return String
	 */
	public function shortenUrl($url)
	{
		// TODO: handle other services to shorten the urls.
		$httpClient = HTTPClientService::getInstance()->getNewHTTPClient();
		$shortUrl = $httpClient->get('http://tinyurl.com/api-create.php?url=' . urlencode($url));
		if (!$shortUrl)
		{
			$shortUrl = $url;
		}
		return $shortUrl;
	}
}