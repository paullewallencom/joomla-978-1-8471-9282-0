<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted Access');

// get the controller
require_once(JPATH_COMPONENT.DS.'controller.php');

// instantiate and execute the controller
$controller = new MyextensionController();
$controller->execute(JRequest::getCmd('task', 'display'));

// redirect
$controller->redirect();

?>