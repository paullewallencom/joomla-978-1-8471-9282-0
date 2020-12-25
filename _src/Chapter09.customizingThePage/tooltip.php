<?php

$css = '/* Tooltips */
.tool-tip
{
    min-width: 100px;
    opacity:.80;
    filter: alpha(opacity=80);
    -moz-opacity: 0.8;
}

.tool-title
{
    text-align: center;
}

.tool-text {
    font-style: italic;
}';

// add the CSS to the document
$doc =& JFactory::getDocument();
$doc->addStyleDeclaration($css);

?>