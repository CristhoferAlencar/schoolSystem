<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('System Settings'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('System Settings'); ?></li>
            </ol>
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
                <h4 class="card-title"><?php echo get_phrase('System Informations'); ?></h4>
                
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
                        <input type="text" class="form-control" id="language" placeholder="<?php echo get_phrase('Enter Language');?>" name="language" value="<?php echo $this->db->get_where('settings', array('type' => 'language'))->row()->description;?>">
                    </div>
                    <div class="form-group">
                        <label for="runningSession"><?php echo get_phrase('Running Session');?></label>
                        <select class="form-control custom-select" id="runningSession" name="running_session">
                        <?php $running_session = $this->db->get_where('settings', array('type' => 'session'))->row()->description; ?>
                          <option value=""><?php echo get_phrase('select_running_session');?></option>
                          <?php for($i = 0; $i < 10; $i++):?>
                              <option value="<?php echo (2019+$i);?>-<?php echo (2019+$i+1);?>"
                                <?php if($running_session == (2019+$i).'-'.(2019+$i+1)) echo 'selected';?>>
                                  <?php echo (2019+$i);?> - <?php echo (2019+$i+1);?>
                              </option>
                          <?php endfor;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="systemFooter"><?php echo get_phrase('System Footer');?></label>
                        <input type="text" class="form-control" id="systemFooter" placeholder="<?php echo get_phrase('Enter System Footer');?>" name="footer" value="<?php echo $this->db->get_where('settings', array('type' => 'footer'))->row()->description;?>">
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

        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo get_phrase('Theme Settings'); ?></h4>

                <?php echo form_open(base_url() . 'systemsetting/system_settings/themeSettings', array('class' => 'form pt-3', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>

                <label class="control-label"><?php echo get_phrase('Color'); ?></label>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="colorDefault" name="skin_colour" value="default" class="custom-control-input" <?php if($skin = $this->db->get_where('settings' , array('type'=>'skin_colour'))->row()->description == 'default') echo 'checked';?>>
                                <label class="custom-control-label" for="colorDefault"><?php echo get_phrase('Default'); ?></label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="colorGreen" name="skin_colour" value="green" class="custom-control-input" <?php if($skin = $this->db->get_where('settings' , array('type'=>'skin_colour'))->row()->description == 'green') echo 'checked';?>>
                                <label class="custom-control-label" for="colorGreen"><?php echo get_phrase('Green'); ?></label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="colorGray" name="skin_colour" value="gray" class="custom-control-input" <?php if($skin = $this->db->get_where('settings' , array('type'=>'skin_colour'))->row()->description == 'gray') echo 'checked';?>>
                                <label class="custom-control-label" for="colorGray"><?php echo get_phrase('Gray'); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="colorBlack" name="skin_colour" value="black" class="custom-control-input" <?php if($skin = $this->db->get_where('settings' , array('type'=>'skin_colour'))->row()->description == 'black') echo 'checked';?>>
                                <label class="custom-control-label" for="colorBlack"><?php echo get_phrase('Black'); ?></label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="colorPurple" name="skin_colour" value="purple" class="custom-control-input" <?php if($skin = $this->db->get_where('settings' , array('type'=>'skin_colour'))->row()->description == 'purple') echo 'checked';?>>
                                <label class="custom-control-label" for="colorPurple"><?php echo get_phrase('Purple'); ?></label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="colorBlue" name="skin_colour" value="blue" class="custom-control-input" <?php if($skin = $this->db->get_where('settings' , array('type'=>'skin_colour'))->row()->description == 'blue') echo 'checked';?>>
                                <label class="custom-control-label" for="colorBlue"><?php echo get_phrase('Blue'); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-block btn-info btn-rounded btn-sm"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('Update Theme');?></button>
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