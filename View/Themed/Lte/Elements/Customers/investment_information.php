<table class="table table-condensed table-striped form-custom-hack">
    <tr>
        <td class="hack-col-label">Source of Fund</td>
        <td>
            <?php
            echo $this->Form->input('SOURCE_FUND', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Description</td>
        <td>
            <?php
            echo $this->Form->input('FND_TRXN_CD', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">Red Flag</td>
        <td>
            <?php
            echo $this->Form->input('RED_FLAG', array(
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
