<?php

// prepare database
$db =& JFactory::getDBO();
$query = 'SELECT value, text'
. ' FROM #__sometable'
. ' ORDER BY ordering';
$db->setQuery($query);

// add first 'select' option
$options = array()
$options[] = JHTML::_('select.option', '0', '- '.JText::_('Select a Custom Thing').' -');

// append database results
$options = array_merge($options, $db->loadObjectList());

// build form control
$lists['custom'] = JHTML::_('select.genericlist', $options, 'filter_custom', 'class="inputbox" size="1" '.$js, 'value', 'text', $filter_custom);

?>