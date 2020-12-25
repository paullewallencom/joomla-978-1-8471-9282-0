<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

// register the handler
$mainframe->registerEvent('onPrepareContent', 'plgContentSmiley');

/**
 * Replaces :) with a smiley icon.
 * 
 * @param object Content item
 * @param JParameter Content parameters
 * @param int Page number
 */
function plgContentSmiley(&$row, &$params, $page)
{
    $pattern = '/\:\)/';
    $icon = '<img src="plugins/content/smiley.gif" />';
    $row->text = preg_replace($pattern, $icon, $row->text);
}

?>