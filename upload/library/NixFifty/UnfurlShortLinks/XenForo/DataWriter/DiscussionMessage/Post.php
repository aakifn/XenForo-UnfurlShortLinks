<?php

class NixFifty_UnfurlShortLinks_XenForo_DataWriter_DiscussionMessage_Post
	extends XFCP_NixFifty_UnfurlShortLinks_XenForo_DataWriter_DiscussionMessage_Post
{
	public function unfurlUrls()
	{
		$message = $this->get('message');

		if (preg_match_all("/\[URL\](.+?)\[\/URL\]/i", $message, $matches))
		{
			$links = $matches[1];

			if (!empty($links))
			{
				foreach ($links AS $link)
				{
					$message = preg_replace(preg_quote("#[URL]" . $link . "[/URL]#i"), "[URL]" . NixFifty_UnfurlShortLinks_Helper::getOriginalUrl($link) . "[/URL]", $message);
				}
			}

			$this->set('message', $message);
		}
	}
}