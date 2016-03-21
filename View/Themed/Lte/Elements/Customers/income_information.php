<table class="table table-condensed table-striped form-custom-hack">
    <tr>
        <td class="hack-col-label">Occupation Type</td>
        <td>
            <?php
            echo $this->Form->input('OCCP_TYP', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Job Title</td>
        <td>
            <?php
            echo $this->Form->input('OCCP_DESC', array(
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
        <td class="hack-col-label">Owner Occupation</td>
        <td>
            <?php
            echo $this->Form->input('BUS_NATURE', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Eschelon</td>
        <td>
            <?php
            echo $this->Form->input('ECHELON', array(
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
        <td class="hack-col-label">Tax Number</td>
        <td>
            <?php
            echo $this->Form->input('TAX_NUM', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Tax Reg Date</td>
        <td>
            <?php
            echo $this->Form->input('TAX_REG_DT', array(
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
        <td class="hack-col-label">Annual Income</td>
        <td>
            <?php
            echo $this->Form->input('ANNUAL_INCOME', array(
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
