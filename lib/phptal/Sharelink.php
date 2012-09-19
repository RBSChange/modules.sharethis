<?php
// change:sharelink
//
// Example:
//   <a change:sharelink="link link; url url; title title" />

/**
 * @package sharethis.list.phptal
 */
class PHPTAL_Php_Attribute_CHANGE_Sharelink extends ChangeTalAttribute 
{	
	/**
	 * @see ChangeTalAttribute::getEvaluatedParameters()
	 *
	 * @return array
	 */
	public function getEvaluatedParameters()
	{
		return array('link', 'url', 'title');
	}
	
	/**
	 * @param array $params
	 * @return string
	 */
	public static function renderSharelink($params)
	{
		$link = self::getFromParams('link', $params);
		$url = self::getFromParams('url', $params);
		$title = self::getFromParams('title', $params);
		
		$onclick = $link->getShareOnclick($url, $title);
		$href = htmlentities($link->getShareUrlIndirection($url, $title), ENT_COMPAT, 'utf-8');
		
		$html = '<a class="link" href="' . $href . '"';
		if ($onclick)
		{
			$html .= ' onclick="' . $onclick . '"';
		}
		$html .= ' rel="nofollow">';
		if ($link->getIcon() !== null)
		{
			$html .= MediaHelper::getContent($link->getIcon());
		}
		else
		{
			$html .= $link->getLabelAsHtml();
		}
		$html .= '</a>';
		return $html;
	}

	/**
	 * @param string $key
	 * @param array $params
	 * @return string
	 */
	private static function getFromParams($key, $params)
	{
		return (array_key_exists($key, $params)) ? $params[$key] : null;
	}
}