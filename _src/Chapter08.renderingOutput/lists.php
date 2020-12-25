<?php

// prepare list array
$lists = array();

// get the user state of the order and direction
$filter_order = $mainframe->getUserStateFromRequest($option.'filter_order', 'filter_order', 'published');
$filter_order_Dir = $mainframe->getUserStateFromRequest($option.'filter_order_Dir', 'filter_order_Dir', 'ASC');

// set the table order values
$lists['order_Dir'] = $filter_order_Dir; $lists['order'] = $filter_order;

// add the lists array to the object ready for the layout
$this->assignRef('lists', $lists);

?>

<?php

// prepare list array
$lists = array();

// get the user state of the published filter
$filter_state = $mainframe->getUserStateFromRequest($option.'filter_state', 'filter_state');
$filter_catid = $mainframe->getUserStateFromRequest($option.'filter_catid', 'filter_catid');

// set the table filter values
$lists['state'] = JHTML::_('grid.state', $filter_state); 
$js = 'onchange="document.adminForm.submit();"';
$lists['catid'] = JHTML::_('list.category', 'filter_catid', 'com_myextension', (int)$filter_catid, $js);

// add the lists array to the object
$this->assignRef('lists', $lists);

?>

<?php

// prepare list array
$lists = array();

// get the user state of the published filter
$filter_state = $mainframe->getUserStateFromRequest($option.'filter_state', 'filter_state');
$filter_catid = $mainframe->getUserStateFromRequest($option.'filter_catid', 'filter_catid');
$filter_search = $mainframe->getUserStateFromRequest($option.'filter_search', 'filter_search');

// set the table filter values
$lists['state'] = JHTML::_('grid.state', $filter_state); 
$js = 'onchange="document.adminForm.submit();"';
$lists['catid'] = JHTML::_('list.category', 'filter_catid', 'com_myextension', (int)$filter_catid, $js);
$lists['search'] = $filter_search;

// add the lists array to the object
$this->assignRef('lists', $lists);

?>