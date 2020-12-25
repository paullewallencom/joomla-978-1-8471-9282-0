<table>
    <tr>
        <td align="left" width="100%">
            <?php echo JText::_('Filter'); ?>:
            <input type="text" name="filter_search" id="search" value="<?php echo $this->lists['search'];?>" class="text_area" onchange="document.adminForm.submit();" />
            <button onclick="this.form.submit();"><?php echo JText::_('Go'); ?></button>
            <button onclick="document.adminForm. filter_search.value='';this.form.submit();"><?php echo JText::_('Reset'); ?></button>
        </td>
        <td nowrap="nowrap">
            <?php echo $this->lists['catid']; ?>
            <?php echo $this->lists['state']; ?>
        </td>
    </tr>
</table>