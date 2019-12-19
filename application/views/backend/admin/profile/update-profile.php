<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('My Profile'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item"><a href="#"><?php echo get_phrase('Users'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('My Profile'); ?></li>
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
                <h4 class="card-title"><?php echo get_phrase('Profile Details'); ?></h4>

                <?php foreach ($edit_profile as $key => $row): ?>

                    <?php echo form_open(base_url(). 'admin/manage_profile/update', array('class' => 'form pt-3', 'enctype'=> 'multipart/form-data'));?>
                    
                        <div class="form-group">
                            <label for="userName"><?php echo get_phrase('Name');?></label>
                            <input type="text" class="form-control" id="userName" placeholder="<?php echo get_phrase('Enter your Name');?>" name="name" value="<?php echo $row['name'];?>">
                        </div>
                        <div class="form-group">
                            <label for="userEmail"><?php echo get_phrase('Email');?></label>
                            <input type="text" class="form-control" id="userEmail" placeholder="<?php echo get_phrase('Enter your Email');?>" name="email" value="<?php echo $row['email'];?>">
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="userAvatar" name="userfile">
                            <label class="custom-file-label form-control" for="userAvatar"><?php echo get_phrase('Choose file');?></label>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-rounded btn-block btn-sm"><i class="fa fa-save"></i> <?php echo get_phrase('Save');?></button>
                        </div>

                    <?php echo form_close(); ?>

				<?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo get_phrase('Change Password'); ?></h4>

                <?php echo form_open(base_url() . 'admin/manage_profile/change_password', array('class' => 'form pt-3', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group">
                        <label for="newPassword"><?php echo get_phrase('Password');?></label>
                        <input type="password" class="form-control" id="newPassword" placeholder="<?php echo get_phrase('Enter a Password');?>" name="new_password">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword"><?php echo get_phrase('Confirm Password');?></label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="<?php echo get_phrase('Repeat the Password');?>" name="confirm_new_password">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-block btn-info btn-rounded btn-sm"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('Change Password'); ?></button>
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