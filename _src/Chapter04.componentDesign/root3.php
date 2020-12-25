<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted Access');

// get the base controller
require_once(JPATH_COMPONENT.DS.'controller.php');

$c = JRequest::getCmd('c', 'DefaultEntity')
$controller = MyextensionController::getInstance($c);
$controller->execute(JRequest::getCmd('task', 'display'));

// redirect
$controller->redirect();

?>