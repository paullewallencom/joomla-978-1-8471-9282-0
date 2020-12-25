<?php

// get the current task
$task = JRequest::getCmd('task');

if ($task == 'item1' || $task == 'item2')
{
    // determine selected task
    $selected = ($task == 'item1');

    // prepare links
    $item1 = 'index.php?option=com_myextension&task=item1';
    $item2 = 'index.php?option=com_myextension&task=item2';

    // add sub menu items
    JSubMenuHelper::addEntry(JText::_('Item 1'), $item1, $selected);
    JSubMenuHelper::addEntry(JText::_('Item 2'), $item2, !$selected);
}

?>