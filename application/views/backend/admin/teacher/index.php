<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('Manage Teacher'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('Manage Teacher'); ?></li>
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
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">New Teacher</h4>
            </div>
            <div class="card-body">

                <?php echo form_open(base_url() . 'admin/teacher/insert/', array('enctype' => 'multipart/form-data')); ?>

                <div class="form-body">
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('name');?></label>
                                <input type="text" class="form-control" name="name" required placeholder="John doe">
                                <input type="text" class="form-control" value="<?php echo substr(md5(uniqid(rand(), true)), 0, 7); ?>" name="teacher_number" readonly="true">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Password');?></label>
                                <input type="password" class="form-control" name="password" value="" onkeyup="CheckPasswordStrength(this.value)" required>
					            <strong id="password_strength"></strong>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Role');?></label>
                                <select class="form-control custom-select" name="role" required>
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <option value="1"><?php echo get_phrase('class_teacher');?></option>
                                    <option value="2"><?php echo get_phrase('subject_teacher');?></option>
                                </select>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="custom-file mt-4 mb-3">
                                <input type="file" class="custom-file-input" id="userFile" name="userfile">
                                <label class="custom-file-label form-control" for="userFile"><?php echo get_phrase('Browse Image');?></label>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Birthday');?></label>
                                <input type="date" class="form-control" name="birthday" value="2018-08-19" id="example-date-input" required>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Gender');?></label>
                                <select class="form-control custom-select" name="sex" required>
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <option value="male"><?php echo get_phrase('male');?></option>
                                    <option value="female"><?php echo get_phrase('female');?></option>
                                </select>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Religion');?></label>
                                <input type="text" class="form-control" name="religion">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Blood Group');?></label>
                                <input type="text" class="form-control" name="blood_group">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Address');?></label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Phone');?></label>
                                <input type="text" class="form-control" name="phone" required>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Email');?></label>
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Qualification');?></label>
                                <input type="text" class="form-control" name="qualification">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Marital Status');?></label>
                                <select class="form-control custom-select" name="marital_status" required>
                                    <option data-tokens=""><?php echo get_phrase('select_marital_status');?></option>
                                    <option data-tokens="Married"><?php echo get_phrase('married');?></option>
                                    <option data-tokens="Single"><?php echo get_phrase('single');?></option>
                                    <option data-tokens="Divorced"><?php echo get_phrase('divorced');?></option>
                                    <option data-tokens="Engaged"><?php echo get_phrase('engaged');?></option>
                                </select>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Facebook');?></label>
                                <input type="text" class="form-control" name="facebook">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Twitter');?></label>
                                <input type="text" class="form-control" name="twitter">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Googleplus');?></label>
                                <input type="text" class="form-control" name="googleplus">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Linkedin');?></label>
                                <input type="text" class="form-control" name="linkedin">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="custom-file mb-3 mt-4">
                                <input type="file" class="custom-file-input" id="document" name="file_name" aria-describedby="documentHelp">
                                <label class="custom-file-label form-control" for="document"><?php echo get_phrase('Documents');?></label>
                                <small id="documentHelp" class="form-text text-muted"><?php echo get_phrase('Teacher CV and others');?></small>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <h3 class="box-title m-t-40"><?php echo get_phrase('Human Resources Information');?></h3>
                    <hr>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Department');?></label>
                                <select class="form-control custom-select" name="department_id" onchange="get_designation_val(this.value)" required>
                                    <option value=""><?php echo get_phrase('select_a_department'); ?></option>
                                    <?php
                                    $department = $this->db->get('department')->result_array();
                                    foreach ($department as $row): ?>
                                        <option value="<?php echo $row['department_id']; ?>">
                                            <?php echo $row['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Designation');?></label>
                                <select class="form-control custom-select" name="designation_id" id="designation_holder">
                                    <option value=""><?php echo get_phrase('select_a_department_first'); ?></option>
                                </select>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Date of Joining');?></label>
                                <input type="date" class="form-control" name="date_of_joining" value="<?php echo date('Y-d-m');?>" required>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Joining Salary');?></label>
                                <input type="number" class="form-control" name="joining_salary" required>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Status');?></label>
                                <select class="form-control custom-select" name="status">
                                    <option value="1"><?php echo get_phrase('active'); ?></option>
                                    <option value="2"><?php echo get_phrase('inactive'); ?></option>
                                </select>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Date of Leaving');?></label>
                                <input type="date" class="form-control" name="date_of_leaving" required>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <h3 class="box-title m-t-40"><?php echo get_phrase('Bank Account Details');?></h3>
                    <hr>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Account Holder Name');?></label>
                                <input type="text" class="form-control" name="account_holder_name" required>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Account Number');?></label>
                                <input type="text" class="form-control" name="account_number" required>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Bank Name');?></label>
                                <input type="text" class="form-control" name="bank_name" required>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('Branch');?></label>
                                <input type="text" class="form-control" name="branch">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('Add Teacher');?></button>
                </div>

                <?php echo form_close();?>

            </div>
        </div>
    </div>
</div>
<!-- row -->
<!-- row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo get_phrase('List Teachers'); ?></h4>

                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase('Photo'); ?></th>
                                <th><?php echo get_phrase('Name'); ?></th>
                                <th><?php echo get_phrase('Role'); ?></th>
                                <th><?php echo get_phrase('Email'); ?></th>
                                <th><?php echo get_phrase('Sex'); ?></th>
                                <th><?php echo get_phrase('Address'); ?></th>
                                <th><?php echo get_phrase('Options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach($select_teacher as $key => $teacher) : ?>
                                <tr>
                                    <?php if (img_exist(base_url() . 'uploads/teaccher_image/' . $teacher['teacher_id'] . '.jpg')) { ?>
                                        <td><img src="<?php echo base_url() . 'uploads/teaccher_image/' . $teacher['teacher_id'] . '.jpg'; ?>" class="img-circle" width="30" height="30"></td>
                                    <?php } else { ?>
                                        <td><img src="<?php echo base_url() . 'uploads/defaults/user-avatar.png'; ?>" class="img-circle" width="30" height="30"></td>
                                    <?php } ?>

                                    <td><?php echo $teacher['name']; ?></td>
                                    <td>
                                        <?php if($teacher['role']== 1) echo 'Class Teacher';?>
                                        <?php if($teacher['role']== 2) echo 'Subject Teacher';?>
                                    </td>
                                    <td><?php echo $teacher['email']; ?></td>
                                    <td><?php echo $teacher['sex']; ?></td>
                                    <td><?php echo $teacher['address']; ?></td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/teacher-edit_teacher/<?php echo $teacher['teacher_id']; ?>')" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0)" onclick="confirm_modal('<?php base_url(); ?>teacher/delete/<?php echo $teacher['teacher_id']; ?>')" class="btn btn-secondary"><i class="fa fa-times"></i></a>
                                                <!-- <a href="<?php echo base_url() . 'uploads/teaccher_image/' . $teacher['file_name']; ?>" class="btn btn-secondary"><i class="fa fa-download"></i></a> -->

                                                <?php if ($teacher['file_name'] != '') { ?>
                                                    <a href="<?php echo base_url() . 'uploads/teaccher_image/' . $teacher['file_name']; ?>" target="_blank" class="btn btn-secondary"><i class="fa fa-download"></i></a>
                                                <?php } else { ?>
                                                    <a href="javascript:void(0)" class="btn btn-secondary disabled"><i class="fa fa-download"></i></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->