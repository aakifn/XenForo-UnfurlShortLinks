<?php

class NixFifty_UnfurlShortLinks_Listen
{
	public static function loadClass($class, array &$extend)
	{
		$extend[] = 'NixFifty_UnfurlShortLinks_' . $class;
	}
}
