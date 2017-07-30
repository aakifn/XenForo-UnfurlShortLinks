<?php

class NixFifty_UnfurlShortLinks_XenForo_DataWriter_Discussion_Thread
	extends XFCP_NixFifty_UnfurlShortLinks_XenForo_DataWriter_Discussion_Thread
{
	public function rebuildDiscussion()
	{
		$posts = $this->_getDiscussionMessages(true);

		foreach ($posts AS $post)
		{
			$message = $post['message'];

			if (preg_match_all("/\[URL\](.+?)\[\/URL\]/i", $message, $matches))
			{
				/** @var XenForo_DataWriter_DiscussionMessage_Post $dw */
				$dw = XenForo_DataWriter::create('XenForo_DataWriter_DiscussionMessage_Post');
				$dw->setExistingData($post);
				$dw->unfurlUrls();
				$dw->save();
			}
		}

		return parent::rebuildDiscussion();
	}
}