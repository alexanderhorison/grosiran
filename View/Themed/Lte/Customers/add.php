<div class="box">
                            
    <div class="box-header with-border">
        <h3 class="box-title"><span class="glyphicon glyphicon-plus"></span> New Customer</h3>
    </div>

    <div class="box-body">

        <div id="menu-bar" style="margin-bottom: 15px;">
            <?php
            echo $this->Html->link(
                '<span class="glyphicon glyphicon-th-large"></span> List Customers',
                '/customers',
                array(
                    'class' => 'btn btn-warning btn-sm',
                    'escape' => false
                )
            );
            ?>
        </div>

        <?php
        echo $this->Form->create('Customer', array(
            'role' => 'form',
            'class' => 'form-horizontal',
            'novalidate' => true
        ));
        ?>

        <!-- START TAB NAVIGATION -->
        <ul id="customer-tabs" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#base" aria-controls="base" role="tab" data-toggle="tab">Base</a>
            </li>

            <li role="presentation">
                <a href="#income_information" aria-controls="income_information" role="tab" data-toggle="tab">
                    Income Information
                </a>
            </li>

            <li role="presentation">
                <a href="#spouse_information" aria-controls="spouse_information" role="tab" data-toggle="tab">
                    Spouse Information
                </a>
            </li>

            <li role="presentation">
                <a href="#investment_information" aria-controls="investment_information" role="tab" data-toggle="tab">
                    Invesment Information
                </a>
            </li>

            <li role="presentation">
                <a href="#permanent_residential_address" aria-controls="permanent_residential_address" role="tab" data-toggle="tab">
                    Permanent Residential Address
                </a>
            </li>

            <li role="presentation">
                <a href="#default_email_address" aria-controls="default_email_address" role="tab" data-toggle="tab">
                    Default Mail Address
                </a>
            </li>

            <li role="presentation">
                <a href="#company_information" aria-controls="company_information" role="tab" data-toggle="tab">
                    Company Information
                </a>
            </li>

            <li role="presentation">
                <a href="#additional_foreign_id" aria-controls="additional_foreign_id" role="tab" data-toggle="tab">
                    Additional Foreign ID
                </a>
            </li>

            <li role="presentation">
                <a href="#extra_info" aria-controls="extra_info" role="tab" data-toggle="tab">
                    Extra Information
                </a>
            </li>

            <li role="presentation">
                <a href="#default_bank_account" aria-controls="default_bank_account" role="tab" data-toggle="tab">
                    Default Bank Account
                </a>
            </li>

            <li role="presentation">
                <a href="#fatca" aria-controls="fatca" role="tab" data-toggle="tab">
                    FATCA
                </a>
            </li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="base">
                <?php
                echo $this->element('Customers/base');
                ?>
            </div>

            <div role="tabpanel" class="tab-pane" id="income_information">
                <?php
                echo $this->element('Customers/income_information');
                ?>
            </div>

            <div role="tabpanel" class="tab-pane" id="spouse_information">
                <?php
                echo $this->element('Customers/spouse_information');
                ?>
            </div>

            <div role="tabpanel" class="tab-pane" id="investment_information">
                <?php
                echo $this->element('Customers/investment_information');
                ?>
            </div>

            <div role="tabpanel" class="tab-pane" id="permanent_residential_address">
                <?php
                echo $this->element('Customers/permanent_residential_address');
                ?>
            </div>

            <div role="tabpanel" class="tab-pane" id="default_email_address">
                <?php
                echo $this->element('Customers/default_email_address');
                ?>
            </div>

            <div role="tabpanel" class="tab-pane" id="company_information">
                <?php
                echo $this->element('Customers/company_information');
                ?>
            </div>

            <div role="tabpanel" class="tab-pane" id="additional_foreign_id">
                <?php
                echo $this->element('Customers/additional_foreign_id');
                ?>
            </div>

            <div role="tabpanel" class="tab-pane" id="extra_info">
                <?php
                echo $this->element('Customers/extra_info');
                ?>
            </div>

            <div role="tabpanel" class="tab-pane" id="default_bank_account">
                <?php
                echo $this->element('Customers/default_bank_account');
                ?>
            </div>

            <div role="tabpanel" class="tab-pane" id="fatca">
                <?php
                echo $this->element('Customers/fatca');
                ?>
            </div>
        </div>

        <!-- // END TAB NAVIGATION -->

        <div class="form-group" style="border: none; margin-left: 1%;">
            <button type="submit" class="btn btn-success">
                <span class="glyphicon glyphicon-floppy-saved"></span> Save
            </button>

            &nbsp;

            <?php
            echo $this->Html->link(
                '<span class="glyphicon glyphicon-remove"></span> Cancel',
                '/customers',
                array(
                    'class' => 'btn btn-default',
                    'escape' => false
                )
            );
            ?>
        </div>

        <?php
        echo $this->Form->end();
        ?>

    </div>

</div>

<?php
echo $this->Html->script(
    array(
        '/bootstrap/js/tab.js',
        'app/customers/customers_add'
    ),
    array('block' => 'scriptBottom')
);
?>