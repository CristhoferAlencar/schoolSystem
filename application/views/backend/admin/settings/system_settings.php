<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Basic Form</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Basic Form</li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sample Form with the Icons</h4>
                <h5 class="card-subtitle">made with bootstrap elements</h5>
                
                <?php echo form_open(base_url(). 'systemsetting/system_settings/do_update', array('class' => 'form pt-3', 'enctype'=> 'multipart/form-data'));?>
                    
                    <div class="form-group">
                        <label for="systemName"><?php echo get_phrase('System Name');?></label>
                        <input type="text" class="form-control" id="systemName" placeholder="<?php echo get_phrase('Enter System Name');?>" name="system_name" value="<?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;?>">
                    </div>
                    <div class="form-group">
                        <label for="systemTitle"><?php echo get_phrase('System Title');?></label>
                        <input type="text" class="form-control" id="systemTitle" placeholder="<?php echo get_phrase('Enter System Title');?>" name="system_title" value="<?php echo $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;?>">
                    </div>
                    <div class="form-group">
                        <label for="systemEmail"><?php echo get_phrase('System Email');?></label>
                        <input type="text" class="form-control" id="systemEmail" placeholder="<?php echo get_phrase('Enter System Email');?>" name="system_email" value="<?php echo $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;?>">
                    </div>
                    <div class="form-group">
                        <label for="systemAddress"><?php echo get_phrase('System Address');?></label>
                        <input type="text" class="form-control" id="systemAddress" placeholder="<?php echo get_phrase('Enter System Address');?>" name="address" value="<?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description;?>">
                    </div>
                    <div class="form-group">
                        <label for="systemPhone"><?php echo get_phrase('System Phone');?></label>
                        <input type="text" class="form-control" id="systemPhone" placeholder="<?php echo get_phrase('Enter System Phone');?>" name="phone" value="<?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description;?>">
                    </div>
                    <div class="form-group">
                        <label for="paypalEmail"><?php echo get_phrase('Paypal Email');?></label>
                        <input type="text" class="form-control" id="paypalEmail" placeholder="<?php echo get_phrase('Enter Paypal Email');?>" name="paypal_email" value="<?php echo $this->db->get_where('settings', array('type' => 'paypal_email'))->row()->description;?>">
                    </div>
                    <div class="form-group">
                        <label for="currency"><?php echo get_phrase('Currency');?></label>
                        <input type="text" class="form-control" id="currency" placeholder="<?php echo get_phrase('Enter Currency');?>" name="currency" value="<?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description;?>">
                    </div>
                    <div class="form-group">
                        <label for="textAlignment"><?php echo get_phrase('Text Alignment');?></label>
                        <select class="form-control custom-select" id="textAlignment" name="text_align">
                            <?php $align =  $this->db->get_where('settings', array('type' => 'text_align'))->row()->description;?>
                            <option value="left-to-right" <?php if ($align == 'left-to-right') echo 'selected';?>> Left to right</option>
                            <option value="right-to-left" <?php if ($align == 'right-to-left') echo 'selected';?>> Right to left</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="language"><?php echo get_phrase('Language');?></label>
                        <select class="form-control custom-select" id="language" name="language">
                            <?php
                                $getLanguage = $this->db->list_fields('language');
                                foreach ($getLanguage as $key => $field) {
                                    if ($field == 'phrase_id' || $field == 'phrase') 
                                        continue;
                                    $default_language = $this->db->get_where('settings', array('type' => 'language'))-row()->description;
                            ?>
                                    <option value="<?php echo $field;?>" <?php if ($default_language ==  $field) echo 'selected';?>><?php echo $field;?></option>
                                <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-rounded btn-block btn-sm"><i class="fa fa-save"></i> <?php echo get_phrase('Save');?></button>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo get_phrase('System Logo'); ?></h4>

                <?php echo form_open(base_url() . 'systemsetting/system_settings/upload_logo', array('class' => 'form pt-3', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>

                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="systemLogo" name="system_logo" onChange="readURL(this);" require>
                        <label class="custom-file-label form-control" for="systemLogo"><?php echo get_phrase('Choose file');?>*</label>
                    </div>

                    <div class="row el-element-overlay">
                        <div class="col-lg-6 offset-md-3">
                            <div class="card">
                                <div class="el-card-item" style="padding-bottom: 0 !important;">
                                    <div class="el-card-avatar el-overlay-1">
                                        <img id="logoPreview" src="<?php echo base_url(); ?>uploads/logo.png" alt="<?php echo get_phrase('System Logo');?>" style="max-height: 200px; max-width: 200px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-block btn-info btn-rounded btn-sm"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('Update Logo');?></button>
                    </div>

                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>
<!-- Row -->
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->