
<?php 
$array = array(
    1 => 'Lorem ipsum dolor sit amet.' ,
    2 => 'Dolore, ab unde modi est!' ,
    3 => 'Illum, fuga minus sit eaque.' ,
    4 => 'Consequatur ducimus maiores voluptatum minima.' ,
);
?>
    <?php
    echo $this->Form->create('Company', array(
        'role' => 'form',
        'class' => 'form-horizontal',
        'id' => 'profile' ,
        'data-parsley-validate' => true ,
    ));
    ?>
    
    <div class="col-md-offset-1 col-md-10 widget_middle_left">
        <div class="stats-info stats-info1">
            <div class="panel-heading">
                <h4 class="panel-title"><span class="title-form">Company Profiles</span></h4>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                    <div class="form-group">
                        <label for="company_name" class="col-sm-2 control-label">Company Name</label>
                        <?php
                        echo $this->Form->input('company_name', array(
                            'type' => 'text',
                            'id' => 'company_name' ,
                            'div' => 'col-sm-8',
                            'label' => false,
                            'class' => 'form-control1 required'
                        ));
                        ?>
                        
                    </div>
                    <div class="form-group">
                        <label for="company_address" class="col-sm-2 control-label">Company Address</label>
                        <div class="col-sm-8">
                            <?php
                            echo $this->Form->textarea('company_address', array(
                                'id' => 'company_address' ,
                                'cols' => 50 ,
                                'rows' => 4 ,
                                'label' => false,
                                'class' => 'form-control1 required control2'
                            ));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company_description" class="col-sm-2 control-label">Company Description</label>
                        <div class="col-sm-8">
                            <?php
                            echo $this->Form->textarea('company_description', array(
                                'id' => 'company_description' ,
                                'cols' => 50 ,
                                'rows' => 4 ,
                                'label' => false,
                                'class' => 'form-control1 required control2'
                            ));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="industries" class="col-sm-2 control-label">Industries</label>
                        <?php
                        echo $this->Form->input('industries', array(
                            'options' => $array,
                            'id' => 'industries' ,
                            'div' => 'col-sm-8',
                            'label' => false,
                            'class' => 'form-control1 required'
                        ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="company_phone" class="col-sm-2 control-label">Phone Number</label>
                        <?php
                        echo $this->Form->input('company_phone', array(
                            'type' => 'text',
                            'id' => 'company_phone' ,
                            'div' => 'col-sm-3',
                            'label' => false,
                            'class' => 'form-control1 required' ,
                            'data-parsley-minlength' => 6 ,
                            'data-parsley-type' => 'number' ,
                        ));
                        ?>
                        <label for="company_handphone" class="col-sm-2 control-label">Handphone Number</label>
                        <?php
                        echo $this->Form->input('company_handphone', array(
                            'type' => 'text',
                            'id' => 'company_handphone' ,
                            'div' => 'col-sm-3',
                            'label' => false,
                            'class' => 'form-control1 required' ,
                            'data-parsley-minlength' => 6 ,
                            'data-parsley-type' => 'number' ,
                        ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="province_id" class="col-sm-2 control-label">Province</label>
                        <?php
                        echo $this->Form->input('province_id', array(
                            'options' => $array,
                            'id' => 'province_id' ,
                            'div' => 'col-sm-3',
                            'label' => false,
                            'class' => 'form-control1 required'
                        ));
                        ?>
                        <label for="focusedinput" class="col-sm-2 control-label">Kode Pos</label>
                        <?php
                        echo $this->Form->input('kodepos', array(
                            'type' => 'text',
                            'id' => 'kodepos' ,
                            'div' => 'col-sm-3',
                            'label' => false,
                            'class' => 'form-control1 required' ,
                            'data-parsley-type' => 'number'
                        ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="city_id" class="col-sm-2 control-label">City</label>
                        <?php
                        echo $this->Form->input('city_id', array(
                            'options' => $array,
                            'id' => 'city_id' ,
                            'div' => 'col-sm-3',
                            'label' => false,
                            'class' => 'form-control1 required'
                        ));
                        ?>
                        <label for="focusedinput" class="col-sm-2 control-label">Fax</label>
                        <?php
                        echo $this->Form->input('fax', array(
                            'type' => 'text',
                            'id' => 'fax' ,
                            'div' => 'col-sm-3',
                            'label' => false,
                            'class' => 'form-control1 required' ,
                            'data-parsley-type' => 'number' ,
                            'data-parsley-minlength' => 6
                        ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="district_id" class="col-sm-2 control-label">District</label>
                        <?php
                        echo $this->Form->input('district_id', array(
                            'options' => $array,
                            'id' => 'district_id' ,
                            'div' => 'col-sm-3',
                            'label' => false,
                            'class' => 'form-control1 required'
                        ));
                        ?>
                        <label for="website" class="col-sm-2 control-label">Website</label>
                        <?php
                        echo $this->Form->input('website', array(
                            'type' => 'text',
                            'id' => 'website' ,
                            'div' => 'col-sm-3',
                            'label' => false,
                            'class' => 'form-control1 required' ,
                            'data-parsley-type' => 'url'
                        ));
                        ?>
                    </div>
                </div>  
            </div>
            <div class="panel-footer">
                <p class="help-block">*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper rhoncus diam id suscipit. In sagittis feugiat</p>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="col-md-offset-1 col-md-4 widget_middle_left">
        <div class="stats-info stats-info1">
            <div class="panel-heading">
                <h4 class="panel-title"><span class="title-form">Company Images</span></h4>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                    <div class="form-group">
                        <div class="col-md-12" align="center">
                            <img src="http://www.somepets.com/wp-content/gallery/hd-animal-background-wallpaper/2560x1600-Royal-Bengal-Tiger-HD-Animal-Wallpaper.jpg" width="100%" height="230px">
                        </div>
                        
                        <div class="col-md-offset-4 col-md-4 upload-pic">
                            <button class="btn btn-default" type="button">Upload Picture</button>
                        </div>
                    </div>
                    
                    
                </div>  
            </div>
            <div class="panel-footer">
                <p class="help-block">*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper rhoncus diam id suscipit. In sagittis feugiat</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-offset-1 col-md-5 widget_middle_left">
        <div class="stats-info stats-info1">
            <div class="panel-heading">
                <h4 class="panel-title"><span class="title-form">Bank Accounts</span></h4>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                    <div class="form-group">
                        <label for="bank_id" class="col-sm-2 control-label">Bank Name</label>
                        <?php
                        echo $this->Form->input('bank_id', array(
                            'options' => $array,
                            'id' => 'bank_id' ,
                            'div' => 'col-sm-9',
                            'label' => false,
                            'class' => 'form-control1 required'
                        ));
                        ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="account_holder" class="col-sm-2 control-label">Account Name</label>
                        <?php
                        echo $this->Form->input('account_holder', array(
                            'type' => 'text',
                            'id' => 'account_holder' ,
                            'div' => 'col-sm-9',
                            'label' => false,
                            'class' => 'form-control1 required'
                        ));
                        ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="account_number" class="col-sm-2 control-label">Account Number</label>
                        <?php
                        echo $this->Form->input('account_number', array(
                            'type' => 'text',
                            'id' => 'account_number' ,
                            'div' => 'col-sm-9',
                            'label' => false,
                            'class' => 'form-control1 required' ,
                            'data-parsley-minlength' => 6 ,
                            'data-parsley-type' => 'number' ,
                        ));
                        ?>
                    </div>
                    
                </div>  
            </div>
            <div class="panel-footer">
                <p class="help-block">*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper rhoncus diam id suscipit. In sagittis feugiat</p>
            </div>
        </div>
    </div>
    <div class="bs-example" data-example-id="form-validation-states">
    <div class="col-sm-8 col-sm-offset-5 submit-button">
        <button class="btn-success btn" type="submit">Submit</button>
        <button class="btn-default btn">Cancel</button>
    </div>
    