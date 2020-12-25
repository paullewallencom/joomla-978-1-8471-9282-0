<?php
// PHP snippet which adds CSS to the document defining how bespoke system messages should appear

$css = '/* Bespoke Error Messages */
#system-message dt.bespoke
{
    display: none;
}

dl#system-message dd.bespoke ul
{
    color: #30A427;
    border-top: 3px solid #94CA8D;
    border-bottom: 3px solid #94CA8D;
    background: #C8DEC7 url(notice-bespoke.png) 4px 4px no-repeat;
}';

$doc =& JFactory::getDocument();
$doc->addStyleDeclaration($css);

?>