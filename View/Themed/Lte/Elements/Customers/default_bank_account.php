<table class="table table-condensed table-striped form-custom-hack">
    <tr>
        <td class="hack-col-label">Bank Code</td>
        <td>
            <?php
            echo $this->Form->input('BANK_CD', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Account Number</td>
        <td>
            <?php
            echo $this->Form->input('BANK_ACCT_NUM', array(
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
        <td class="hack-col-label">Account Name</td>
        <td>
            <?php
            echo $this->Form->input('BANK_ACCT_NM', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Branch</td>
        <td>
            <?php
            echo $this->Form->input('BRANCH_NAME', array(
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