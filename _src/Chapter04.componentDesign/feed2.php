<?php
/// build links
$feed = 'index.php?option=com_myextension&format=feed';
$rss = array(
                'type' => 'application/rss+xml',
                'title' => 'My Extension RSS Feed'
            );
$atom = array(
                 'type' => 'application/atom+xml',
                 'title' => 'My Extension Atom Feed'
             );

// add the links
$document =& JFactory::getDocument();
$document->addHeadLink(JRoute::_($feed.'&type=rss'), 'alternate', 'rel', $rss);
$document->addHeadLink(JRoute::_($feed.'&type=atom'), 'alternate', 'rel', $atom);

?>