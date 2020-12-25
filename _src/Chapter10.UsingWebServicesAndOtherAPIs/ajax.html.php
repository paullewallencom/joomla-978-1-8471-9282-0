<!-- this snippet is intended to be used within a display() method in an html view class -->

<form id="form1" method="post" action="<?php echo 'index.php?option=com_wfaqs'; ?>">
    <input name="id" type="text" id="id" value="" />
    <input name="format" type="text" id="format" value="raw" />
    <input name="view" type="text" id="view" value="wfaq" />
    <input type="submit" name="Submit" value="Submit" />
</form>

    <div id="update">Update Area</div>

<?php
// add mootools
JHTML::_('behavior.mootools');	

// prepare JavaScript
$js = "window.addEvent('domready', function(){
    $('form1').addEvent('submit', function(e) {
    // Stop the form from submitting
    new Event(e).stop();

    // Update the page
    this.send({ onComplete: function(response, responseXML) {	
        // get the XML nodes
        var root = responseXML.documentElement;
        var name = root.getElementsByTagName('name').item(0);
        var text = root.getElementsByTagName('text').item(0);

        // prepare the XHTML
        var updateValue = '<div><strong>'
        + name.firstChild.nodeValue + '</strong></div><div>'
        + text.firstChild.nodeValue + '</div>';

        // update the page element
        $('update').empty().setHTML(updateValue);
        } });
    });
});";

// add JavaScript to the page
$document =& JFactory::getDocument();
$document->addScriptDeclaration($js);

?>