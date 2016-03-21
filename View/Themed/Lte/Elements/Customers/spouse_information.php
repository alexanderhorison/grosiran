<table class="table table-condensed table-striped form-custom-hack">
    <tr>
        <td class="hack-col-label">Spouse Name</td>
        <td>
            <?php
            echo $this->Form->input('SPOUSE_NM', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Spouse Occupation</td>
        <td>
            <?php
            echo $this->Form->input('SPOUSE_OCCP_CODE', array(
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
        <td class="hack-col-label">Spouse ID Type</td>
        <td>
            <?php
            echo $this->Form->input('SPOUSE_ID_TYP', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Spouse ID Number</td>
        <td>
            <?php
            echo $this->Form->input('SPOUSE_ID_NO', array(
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
