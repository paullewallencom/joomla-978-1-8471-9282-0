<?php
// prepare the JavaScript parameters
$params = , array('size'=>array('x'=>100, 'y'=>100));

// add the JavaScript
JHTML::_('behavior.modal', 'a.mymodal', $params);

// create the modal window link
echo '<a class="mymodal" title="example" href="http://www.example.org"  rel="{handler: \'iframe\', size: {x: 400, y: 150}}">Example Modal Window</a>';
?>