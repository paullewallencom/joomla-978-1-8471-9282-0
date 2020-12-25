<?php
$i = 0;
foreach ($rows as $row) :
    $id = JHTML::_('grid.id', ++$i, $row->id);
    $published = JHTML::_('grid.published', $row, $i);
    ?>
    <tr class="row<?php echo $i%2 ?>">
        <td>';
            <?php echo $id; ?>
        </td>
        <td>
            <?php echo $row->name; ?>
        </td>
        <td align="center">
            <?php echo $published ?>
        </td>
    </tr>
<?php
endforeach;
?>