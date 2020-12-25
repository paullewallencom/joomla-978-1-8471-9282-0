<?php
// ensure a valid entry point
defined(_JEXEC) or die('Restricted Access');

// import the JPlugin class
jimport('joomla.event.plugin');

/**
 * My Plugin event listener
 */
class plgFoobarMyplugin extends JPlugin
{

    /**
     * handle onPrepareFoobar event
     *
     * @param object Foobar to prepare
     */
    function onPrepareFoobar(&$foobar)
    {
        $foobar->name = JString::strtoupper($foobar->name);
    }

    /**
     * handle onAfterDisplayFoobar event
     *
     * @param object Foobar which is being displayed
     * @return string XHTML to display after the Foobar
     */
    function onAfterDisplayFoobar(&$foobar)
    {
        return '<p>'.JText::_('Foobar Name converted to upper case by My Plugin').'</p>';
    }
}

?>