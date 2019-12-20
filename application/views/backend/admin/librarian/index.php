<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('Manage Librarian'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('Manage Librarian'); ?></li>
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
                <h4 class="card-title"><?php echo get_phrase('New Librarian'); ?></h4>
               
                <?php echo form_open(base_url() . 'admin/librarian/insert/' , array('class' => 'mt-4', 'enctype' => 'multipart/form-data'));?>
                   
                    <div class="form-group">
                        <label for="name"><?php echo get_phrase ('Name');?></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo get_phrase('Enter Name');?>">
                        <input type="hidden" name="librarian_number" value="<?php echo substr(md5(uniqid(rand(), true)), 0, 10);?>">
                    </div>
                    <div class="form-group">
                        <label for="dob"><?php echo get_phrase ('DOB');?></label>
                        <input type="date" class="form-control" id="dob" name="birthday" value="<?php echo date('Y-m-d') ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone"><?php echo get_phrase ('Sex');?></label>
                        <select class="form-control select2" name="sex">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="religion"><?php echo get_phrase ('Religion');?></label>
                        <input type="text" class="form-control" id="religion" name="religion" placeholder="<?php echo get_phrase('Enter Religion');?>">
                    </div>
                    <div class="form-group">
                        <label for="bloodGroup"><?php echo get_phrase ('Blood Group');?></label>
                        <input type="text" class="form-control" id="bloodGroup" name="blood_group" placeholder="<?php echo get_phrase('Enter Blood Group');?>">
                    </div>
                    <div class="form-group">
                        <label for="email"><?php echo get_phrase ('Email');?></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo get_phrase('Enter Email');?>">
                    </div>
                    <div class="form-group">
                        <label for="phone"><?php echo get_phrase ('Phone');?></label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo get_phrase('Enter Phone');?>">
                    </div>
                    <div class="form-group">
                        <label for="qualification"><?php echo get_phrase ('Qualification');?></label>
                        <input type="text" class="form-control" id="qualification" name="qualification" placeholder="<?php echo get_phrase('Enter Qualification');?>">
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
                        <label for="address"><?php echo get_phrase ('Address');?></label>
                        <textarea class="form-control" name="address" id="address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="facebook"><?php echo get_phrase ('Facebook');?></label>
                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="<?php echo get_phrase('Enter Facebook');?>">
                    </div>
                    <div class="form-group">
                        <label for="facebook"><?php echo get_phrase ('Twitter');?></label>
                        <input type="text" class="form-control" id="Twitter" name="twitter" placeholder="<?php echo get_phrase('Enter Twitter');?>">
                    </div>
                    <div class="form-group">
                        <label for="googleplus"><?php echo get_phrase ('Googleplus');?></label>
                        <input type="text" class="form-control" id="googleplus" name="googleplus" placeholder="<?php echo get_phrase('Enter Googleplus');?>">
                    </div>
                    <div class="form-group">
                        <label for="linkedin"><?php echo get_phrase ('Linkedin');?></label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="<?php echo get_phrase('Enter Linkedin');?>">
                    </div>
                    <div class="form-group">
                        <label for="password"><?php echo get_phrase ('Password');?></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo get_phrase('Enter Password');?>">
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="document" name="file_name" aria-describedby="documentHelp">
                        <label class="custom-file-label form-control" for="document"><?php echo get_phrase('Document');?></label>
                        <small id="documentHelp" class="form-text text-muted"><?php echo get_phrase('Librarian CV or any document');?></small>
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
                <h4 class="card-title"><?php echo get_phrase('List Librarians');?></h4>

                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase ('Photo');?></th>
                                <th><?php echo get_phrase ('Name');?></th>
                                <th><?php echo get_phrase ('Email');?></th>
                                <th><?php echo get_phrase ('Sex');?></th>
                                <th><?php echo get_phrase ('Address');?></th>
                                <th><?php echo get_phrase ('Options');?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach($select_librarian as $key => $librarian): ?>
                                <tr>
                                    <?php if(img_exist(base_url() . 'uploads/librarian_image/' . $librarian['librarian_id'] . '.jpg')) { ?>
                                        <td><img src="<?php echo base_url() . 'uploads/librarian_image/' . $librarian['librarian_id'] . '.jpg'; ?>" class="img-circle" width="30" height="30"></td>
                                    <?php } else { ?>
                                        <td><img src="<?php echo base_url() . 'uploads/defaults/user-avatar.png'; ?>" class="img-circle" width="30" height="30"></td>
                                    <?php } ?>

                                    <td><?php echo $librarian['name'];?></td>
                                    <td><?php echo $librarian['email'];?></td>
                                    <td><?php echo $librarian['sex'];?></td>
                                    <td><?php echo $librarian['address'];?></td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/librarian-edit_librarian/<?php echo $librarian['librarian_id'];?>')" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0)" onclick="confirm_modal('<?php base_url();?>librarian/delete/<?php echo $librarian['librarian_id'];?>')" class="btn btn-secondary"><i class="fa fa-times"></i></a>
                                                <!-- <a href="<?php echo base_url() . 'uploads/librarian_image/' . $librarian['file_name'];?>" class="btn btn-secondary"><i class="fa fa-download"></i></a> -->

                                                <?php if($librarian['file_name'] != '') { ?>
                                                    <a href="<?php echo base_url() . 'uploads/librarian_image/' . $librarian['file_name']; ?>" target="_blank" class="btn btn-secondary"><i class="fa fa-download"></i></a>
                                                <?php } else { ?>
                                                    <a href="javascript:void(0)" class="btn btn-secondary disabled"><i class="fa fa-download"></i></a>
                                                <?php } ?>
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