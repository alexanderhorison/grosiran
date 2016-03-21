<table class="table table-condensed table-striped form-custom-hack">
    <tr>
        <td class="hack-col-label">Default Email Address</td>
        <td>
            <?php
            echo $this->Form->input('EMAIL_ADD_DEFAULT', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">ZIP Code</td>
        <td>
            <?php
            echo $this->Form->input('ZIP_CODE_DEFAULT', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>
</table>
