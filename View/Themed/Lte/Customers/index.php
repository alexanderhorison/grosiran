<div class="box">
                            
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-users"></i> &nbsp; List Customers</h3>
    </div>

    <div class="box-body">

        <div id="menu-bar" style="margin-bottom: 15px;">
            <?php
            echo $this->Html->link(
                '<span class="glyphicon glyphicon-plus"></span> Add New Customer',
                '/customers/add',
                array(
                    'class' => 'btn btn-warning btn-sm',
                    'escape' => false
                )
            );
            ?>
        </div>

        <?php
        echo $this->Form->create('Filter', array(
            'type' => 'get',
            'class' => 'form-inline',
            'role' => 'form'
        ));
        ?>

        <div class="container-fluid table-default-filter" style="padding-bottom: 5px;">
            <div class="row" style="margin-top: 5px; position: relative;">
                
                <div class="col-sm-6">

                    <div class="dataTables_length">
                        <label>
                            Show 
                            <?php
                            echo $this->Form->input('rpp', array(
                                'options' => array(
                                    '10' => '10',
                                    '25' => '25',
                                    '50' => '50',
                                    '100' => '100'
                                ),
                                'default' => isset($this->request->query['rpp']) ? $this->request->query['rpp'] : '50',
                                'label' => false,
                                'div' => false,
                                'class' => 'form-control input-sm',
                                'onchange' => 'this.form.submit()'
                            ));
                            ?>
                            entries
                        </label>
                    </div>

                </div>

                <div style="position: absolute; right:5px;">
                    <div class="dataTables_filter">

                        <?php
                        echo $this->Form->input('filter_field', array(
                            'options' => array(
                                'cif' => 'CIF',
                                'name' => 'Name',
                                'mobile_phone' => 'Mobile Phone',
                                'email' => 'Email',
                                'mailing' => 'Mailing Address',
                                'birthdate' => 'Date of Birth'
                            ),
                            'empty' => '-NO FILTER-',
                            'default' => isset($this->request->query['filter_field']) ? $this->request->query['filter_field'] : '',
                            'label' => 'Filter by :&nbsp;',
                            'div' => false,
                            'class' => 'form-control input-sm',
                            'style' => 'margin-right: 5px;'
                        ));
                        ?>

                        <label style="margin-right: 10px;">
                            <input class="form-control input-sm" type="text" name="kwd" value="<?php echo isset($this->request->query['kwd']) ? $this->request->query['kwd'] : ''; ?>">
                        </label>

                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-zoom-in"></span> Search
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <?php
        echo $this->Form->end();
        ?>

        <table id="pbs-index" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Field A</th>
                    <th>Field B</th>
                    <th>Field C</th>
                    <th>Field D</th>
                    <th>Field E</th>
                    <th>Field F</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Field A</td>
                    <td>Field B</td>
                    <td>Field C</td>
                    <td>Field D</td>
                    <td>Field E</td>
                    <td>Field F</td>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td>Field A</td>
                    <td>Field B</td>
                    <td>Field C</td>
                    <td>Field D</td>
                    <td>Field E</td>
                    <td>Field F</td>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td>Field A</td>
                    <td>Field B</td>
                    <td>Field C</td>
                    <td>Field D</td>
                    <td>Field E</td>
                    <td>Field F</td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>

    </div>

</div>

<?php
echo $this->Html->script(
    array(
        'app/customers/customers_index'
    ),
    array('block' => 'scriptBottom')
);
?>