<?php

// IF EXISTS query mechanism
$db =& JFactory::getDBO();
$query = 'CREATE TABLE IF NOT EXISTS '.$db->nameQuote('#__some_table').' ( '
        .$db->nameQuote('id').' int(11) NOT NULL auto_increment, '
        .$db->nameQuote('name').' varchar(255) NOT NULL default '', '
        .'PRIMARY KEY  ('.$db->nameQuote('id'). ') '
        .') CHARACTER SET `utf8` COLLATE `utf8_general_ci`';
$db->setQuery($query);
$db->query();

// Module parameter flag mechanism
if (!$params->get('tablecreated'))
{
    // create the table
    $db =& JFactory::getDBO();
    $query = 'CREATE TABLE IF NOT EXISTS '.$db->nameQuote('#__some_table').' ( '
        .$db->nameQuote('id').' int(11) NOT NULL auto_increment, '
        .$db->nameQuote('name').' varchar(255) NOT NULL default '', '
        .'PRIMARY KEY  ('.$db->nameQuote('id'). ') '
        .') CHARACTER SET `utf8` COLLATE `utf8_general_ci`';
    $db->setQuery($query);
    $db->query();

    // set the `tablecreated` flag to true
    $params->set('tablecreated', 1);
}

?>