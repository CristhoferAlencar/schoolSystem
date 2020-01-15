<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('Manage Alumni'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('Manage Alumni'); ?></li>
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
            <div class="card-body">
                <h4 class="card-title"><?php echo get_phrase('New Alumni'); ?></h4>
               
                <?php echo form_open(base_url() . 'admin/alumni/insert/' , array('class' => 'mt-4', 'enctype' => 'multipart/form-data'));?>
                   
                    <div class="form-group">
                        <label for="name"><?php echo get_phrase ('Name');?></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo get_phrase('Enter Name');?>">
                    </div>
                    <div class="form-group">
                        <label for="phone"><?php echo get_phrase ('Sex');?></label>
                        <select class="form-control select2" name="sex">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone"><?php echo get_phrase ('Phone');?></label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo get_phrase('Enter Phone');?>">
                    </div>
                    <div class="form-group">
                        <label for="email"><?php echo get_phrase ('Email');?></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo get_phrase('Enter Email');?>">
                    </div>
                    <div class="form-group">
                        <label for="address"><?php echo get_phrase ('Address');?></label>
                        <textarea class="form-control" name="address" id="address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="profession"><?php echo get_phrase ('Profession');?></label>
                        <input type="text" class="form-control" id="profession" name="profession" placeholder="<?php echo get_phrase('Enter Profession');?>">
                    </div>
                    <div class="form-group">
                        <label for="maritalStatus"><?php echo get_phrase ('Marital Status');?></label>
                        <select class="form-control select2" name="marital_status" id="maritalStatus">
                            <option value="Married">Married</option>
                            <option value="Single">Single</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="graduationDate"><?php echo get_phrase ('Graduation Date');?></label>
                        <input type="date" class="form-control" id="graduationDate" name="g_year" value="<?php echo date('Y-m-d') ?>">
                    </div>
                    <div class="form-group">
                        <label for="schoolClub"><?php echo get_phrase ('School Club');?></label>
                        <input type="text" class="form-control" id="schoolClub" name="club" placeholder="<?php echo get_phrase('Enter School Club');?>">
                    </div>
                    <div class="form-group">
                        <label for="interest"><?php echo get_phrase ('Interests');?></label>
                        <input type="text" class="form-control" id="interest" name="interest" placeholder="<?php echo get_phrase('Enter Interests');?>">
                    </div>
                    <div class="custom-file mt-3 mb-3">
                        <input type="file" class="custom-file-input" id="userFile" name="userfile">
                        <label class="custom-file-label form-control" for="userFile"><?php echo get_phrase('Image');?></label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
                
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
                <h4 class="card-title"><?php echo get_phrase('List Alumni');?></h4>

                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase ('Photo');?></th>
                                <th><?php echo get_phrase ('Name');?></th>
                                <th><?php echo get_phrase ('Email');?></th>
                                <th><?php echo get_phrase ('Sex');?></th>
                                <th><?php echo get_phrase ('Address');?></th>
                                <th><?php echo get_phrase ('Phone');?></th>
                                <th><?php echo get_phrase ('Profession');?></th>
                                <th><?php echo get_phrase ('Graduation Year');?></th>
                                <th><?php echo get_phrase ('School Clun');?></th>
                                <th><?php echo get_phrase ('Interests');?></th>
                                <th><?php echo get_phrase ('Options');?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($select_alumni as $key => $alumni): ?>
                                <tr>
                                    <td><img src="<?php echo $this->crud_model->get_image_url('alumni',$alumni['alumni_id']);?>" class="img-circle" width="30" height="30"></td>
                                    <td><?php echo $alumni['name'];?></td>
                                    <td><?php echo $alumni['email'];?></td>
                                    <td><?php echo $alumni['sex'];?></td>
                                    <td><?php echo $alumni['address'];?></td>
                                    <td><?php echo $alumni['phone'];?></td>
                                    <td><?php echo $alumni['profession'];?></td>
                                    <td><?php echo $alumni['g_year'];?></td>
                                    <td><?php echo $alumni['club'];?></td>
                                    <td><?php echo $alumni['interest'];?></td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/alumni-edit_alumni/<?php echo $alumni['alumni_id'];?>')" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0)" onclick="confirm_modal('<?php echo base_url();?>admin/alumni/delete/<?php echo $alumni['alumni_id'];?>')" class="btn btn-secondary"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->