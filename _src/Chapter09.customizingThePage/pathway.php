<?php

$menus =& JMenu::getInstance();
$menuitem =& $menus->getActive();

if ($menuitem->query['view'] != 'item')
{
    $pathway =& $mainframe->getPathWay();

    switch ($menuitem->query['view'])
    {
        case 'categories':
            $pathway->addItem($categoryName, $categoryURI);
        default:
            $pathway->addItem($itemName);
    }
}

?>