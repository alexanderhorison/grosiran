<table class="table table-condensed table-striped form-custom-hack">
    <tr>
        <td class="hack-col-label">Date of Renewal</td>
        <td>
            <?php
            echo $this->Form->input('RENEWAL_DATE', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">Indemnity Letter</td>
        <td>
            <?php
            echo $this->Form->input('INDMTY_LETTER', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">Speciment Signature</td>
        <td>
            <?php
            echo $this->Form->input('SPECIMEN_SIGN', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>


</table>