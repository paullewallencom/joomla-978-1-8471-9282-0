<?php
// set the basic link
$document =& JFactory::getDocument();
$document->setLink(JRoute::_('index.php?option=com_myextension');

// get the items to add to the feed
$db =& JFactory::getDBO();
$query = 'SELECT * FROM #__myextension WHERE published = 1';
$db->setQuery($query);
$rows = $db->loadObjectList();

foreach ($rows as $row)
{
    // create a new feed item
    $item = new JFeedItem();

    // assign values to the item
    $item->author = $row->author;
    $item->category = $row->category;
    $item->comments = JRoute::_(JURI::base().'index.php?option=com_myextension&view=comments&id='.$row->id);
    $item->date = date('r', strtotime($row->date));
    $item->description = $row->description;
    $item->guid = $row->id;
    $item->link = JRoute::_(JURI::base().'index.php?option=com_myextension &id='.$row->id);
    $item->pubDate = date();
    $item->title = $row->title;

    $enclosure = new JFeedEnclosure();
    $enclosure->url = JRoute::_(JURI::base().'index.php?option=com_myextension &view=video&format=raw&id='.$row->id);
    // size in bytes of file
    $enclosure->length = $row->length
    $enclosure->type = 'video/mpeg';

    $item->enclosure = $enclosure;

    // add item to the feed
    $document->addItem($item);
}

?>