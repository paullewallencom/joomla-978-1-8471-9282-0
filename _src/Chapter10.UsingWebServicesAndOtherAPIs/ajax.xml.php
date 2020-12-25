<?php
// this snippet is intended to be used within a display() method in a raw view class

// get the data
$data =& $this->get('Data');

// get JSimpleXMLElement class
jimport('joomla.utilities.simplexml');

// create new XML element
$xml = new JSimpleXMLElement('item', array('id' => $data->id));

// set the document encoding
$document =& JFactory::getDocument();
$document->setMimeEncoding('text/xml');

// add elements to the XML
$name =& $xml->addChild('name');
$text =& $xml->addChild('text');

// set element data
$name->setData($data->name);
$text->setData($data->text);

// output XML response
echo '<?xml version="1.0" encoding="UTF-8" ?>';
echo $xml->toString();

?>