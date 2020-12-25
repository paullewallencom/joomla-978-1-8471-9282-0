<?php

// prepare the options
$options = array();
$options[] = JHTML::_('select.option', '1', 'Option A');
$options[] = JHTML::_('select.option', '2', 'Option B');
$options[] = JHTML::_('select.option', '3', 'Option C');

// render the options
echo JHTML::_('select.genericlist', $options, 'someoptions', null, 'value', 'text', '2');

?>