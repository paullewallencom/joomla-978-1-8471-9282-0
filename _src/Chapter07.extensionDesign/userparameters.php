<?php
// get a parser
$parser =& JFactory::getXMLParser('Simple');

// define the path to the XML file
$pathToXML_File = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_users'.DS.'users.xml';

// parse the XML
$parser->loadFile($pathToXML_File);

// get the root tag (install)
$document =& $parser->document;

// get the params tag
$params =& $document->params[0];

// Add myparameter
$myparameter =& $params->addChild('param');

// modify the myparameter attributes
$myparameter->addAttribute('name', 'myparameter');
$myparameter->addAttribute('type', 'text');
$myparameter->addAttribute('label', 'My Parameter');
$myparameter->addAttribute('description', 'An example user parameter');

// Add myotherparameter
$myotherparameter =& $params->addChild('param');

// modify the myotherparameter attributes
$myotherparameter->addAttribute('name', 'myotherparameter');
$myotherparameter->addAttribute('type', 'text');
$myotherparameter->addAttribute('label', 'My Other Parameter');
$myotherparameter->addAttribute('description', 'An example user parameter');

// create XML string
$xmlString = '<?xml version="1.0" encoding="UTF-8" ?>'."\n";
$xmlString .= $document->toString();

// get the JFile class
jimport('joomla.filesystem.file');

// save the changes
if (!JFile::write($pathToXML_File, $xmlString))
{
	// handle failed file save
}

?>