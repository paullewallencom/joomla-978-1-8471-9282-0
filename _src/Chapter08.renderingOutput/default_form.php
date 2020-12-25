<div id="some_division">
  <form action="<?php echo JRoute::_('index.php?option=com_myextension&task=submitform'); ?>" name="someform" id="someform">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><label for="name"><?php echo JText::_('Name'); ?></label></td>
        <td><input name="name" type="text" size="40" maxlength="40"></td>
      </tr>
      <tr>
        <td><label for="surname"><?php echo JText::_('Surname'); ?></label></td>
        <td><input name="surname" type="text" size="40" maxlength="40"></td>
      </tr>
      <tr>
        <td><label for="email"><?php echo JText::_('Email'); ?></label></td>
        <td><input name="email" type="text" size="40" maxlength="40"></td>
      </tr>
    </table>
  </form>
</div>