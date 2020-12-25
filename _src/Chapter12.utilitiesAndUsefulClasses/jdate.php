<?php

jimport('joomla.utilities.date');

// Now
$date = new JDate();

// Unix timestamp
$date1 = new JDate(-1417564800);

// ISO 8601
$date2 = new JDate('1925-01-30T00:00:00');

// RFC 2822
$date3 = new JDate('Fri, 30 Jan 1925 00:00:00');

// User string
$date4 = new JDate('January 30th 1925');

// get date formatted in RFC 2822
$rfc822 = $date->toRFC822();

// get date formatted in ISO 8601
$iso8601 = $date->toISO8601();

// get date formatted for a MySQL datetime field
$mySQL = $date->toMySQL();

// get date as unix timestamp
$timestamp = $date->toUnix();

// LC2
$lc2 = $date->toFormat(JText::_('DATE_FORMAT_LC2'));

// Request date and time
$rDate = new JDate($mainframe->get('requestTime'));

// get the date and time of the request
$date = $mainframe->get('requestTime');

// output the date and time using JHTML
echo JHTML::_('date', $date, JText::_('DATE_FORMAT_LC2'));

// get the user’s time zone
$user =& JFactory::getUser();
$usersTZ = $user->getParam('timezone');

// output the date and time
echo JHTML::_('date', $date, JText::_('DATE_FORMAT_LC2'), $usersTZ);


?>