<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$mainframe->registerEvent('onCustomEditorButton', 'plgSmileyButton');

/**
 * Smiley button
 *
 * @name string Name of the editor
 * @return array Array of three elements: JavaScript action, Button name, CSS class.
 */
function plgSmileyButton($name)
{
    global $mainframe;

    // get the image base URI
    $doc =& JFactory::getDocument();
    $url = $mainframe->isAdmin() ? $mainframe->getSiteURL() : JURI::base();
    
	// get the JavaScript
    $js = "
    function insertSmiley()
    {
        jInsertEditorText(' :) ');
    }
    ";

    $css = "    .button1-left .smiley { background: url($url/plugins/editors-xtd/smiley1.gif) 100% 0 no-repeat; }";
    $css .= "\n    .button2-left .smiley { background: url($url/plugins/editors-xtd/smiley2.gif) 100% 0 no-repeat; }";
    $doc->addStyleDeclaration($css);
    $doc->addScriptDeclaration($js);
    $button = array("insertSmiley()", JText::_('Smiley'), 'smiley');

    return $button;
}

?>