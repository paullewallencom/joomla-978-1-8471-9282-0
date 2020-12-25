<?php// prepare the editor retrieval JavaScript
$editor =& JFactory::getEditor();
$getText = $editor->getContent('text'); ?>

<script language="javascript" type="text/javascript">
<!--
function submitbutton(pressbutton)
{
    var form = document.adminForm;

    // check we aren't cancelling
    if (pressbutton == 'cancel')
    {
        // no need to validate, we are cancelling
        submitform( pressbutton );
        return;
    }

    // get text
    text = <?php echo $getText; ?>

    // validate
    if (form.name.value == "")
    {
        // no name supplied
        alert( "<?php echo JText::_('You must supply a name', true); ?>" );
    }
    else if (question == "" && answer == "")
    {
        // no text supplied
        alert( "<?php echo JText::_( 'You must supply some text', true ); ?>" );
    }
    else
    {
        // success save the 
        <?php echo $editor->save( 'text' ); ?> 
        submitform( pressbutton );
    }
}
//-->
</script>