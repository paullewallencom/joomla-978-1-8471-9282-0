<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted Access');

// get the base controller
require_once(JPATH_COMPONENT.DS.'controller.php');

// get controller
if ($c = JRequest::getCmd('c', 'DefaultEntity'))
{
    // determine path
    $path = JPATH_COMPONENT.DS.'controllers'.DS.$c.'.php';

    jimport('joomla.filesystem.file');
    if (JFile::exists($path))
    {
        // controller exists, get it!
        require_once($path);
    }
    else
    {
        // controller does not exist
        JError::raiseError('500', JText::_('Unknown controller'));
    }
}

// instantiate and execute the controller
$c = 'MyextensionController'.$c;
$controller = new $c();
$controller->execute(JRequest::getCmd('task', 'display'));

// redirect
$controller->redirect();

?>