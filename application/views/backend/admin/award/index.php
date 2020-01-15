<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('Manage Awards'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('Awards'); ?></li>
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
<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo get_phrase('Add Award'); ?></h4>

                <?php echo form_open(base_url() . 'admin/award/create', array('class' => 'form pt-3', 'enctype' => 'multipart/form-data')); ?>
                
                    <div class="form-group">
                        <label for="award_name"><?php echo get_phrase('Award Name');?></label>
                        <input type="text" class="form-control" id="award_name" name="name" required>
                        <input type="hidden" class="form-control" value="<?php echo substr(md5(uniqid(rand(), true)), 0, 7); ?>" name="award_code" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="gift"><?php echo get_phrase('Gift');?></label>
                        <input type="text" class="form-control" id="gift" name="gift" required>
                    </div>
                    <div class="form-group">
                        <label for="amount"><?php echo get_phrase('Amount');?></label>
                        <input type="text" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label><?php echo get_phrase('Employee');?></label>
                        <select class="form-control custom-select" name="user_id" required>
                            <option value=""><?php echo get_phrase('select_an_employee'); ?></option>
                            <optgroup label="<?php echo get_phrase('admin');?>">
                            <?php $admin = $this->db->get('admin')->result_array();
                            foreach ($admin as $key => $admin):?>
                            <option value="admin-<?php echo $admin['admin_id'];?>"><?php echo $admin['name'];?></option>
                            <?php endforeach;?>

                            <optgroup label="<?php echo get_phrase('teacher');?>">
                            <?php $teacher = $this->db->get('teacher')->result_array();
                            foreach ($teacher as $key => $teacher):?>
                            <option value="teacher-<?php echo $teacher['teacher_id'];?>"><?php echo $teacher['name'];?></option>
                            <?php endforeach;?>
                    

                            <optgroup label="<?php echo get_phrase('hrm');?>">
                            <?php $hrm = $this->db->get('hrm')->result_array();
                            foreach ($hrm as $key => $hrm):?>
                            <option value="hrm-<?php echo $hrm['hrm_id'];?>"><?php echo $hrm['name'];?></option>
                            <?php endforeach;?>

                            <optgroup label="<?php echo get_phrase('accountant');?>">
                            <?php $accountant = $this->db->get('accountant')->result_array();
                            foreach ($accountant as $key => $accountant):?>
                            <option value="accountant-<?php echo $accountant['accountant_id'];?>"><?php echo $accountant['name'];?></option>
                            <?php endforeach;?>

                            <optgroup label="<?php echo get_phrase('parent');?>">
                            <?php $parent = $this->db->get('parent')->result_array();
                            foreach ($parent as $key => $parent):?>
                            <option value="parent-<?php echo $parent['parent_id'];?>"><?php echo $parent['name'];?></option>
                            <?php endforeach;?>

                            <optgroup label="<?php echo get_phrase('hostel');?>">
                            <?php $hostel = $this->db->get('hostel')->result_array();
                            foreach ($hostel as $key => $hostel):?>
                            <option value="hostel-<?php echo $hostel['hostel_id'];?>"><?php echo $hostel['name'];?></option>
                            <?php endforeach;?>

                            <optgroup label="<?php echo get_phrase('librarian');?>">
                            <?php $librarian = $this->db->get('librarian')->result_array();
                            foreach ($librarian as $key => $librarian):?>
                            <option value="librarian-<?php echo $librarian['librarian_id'];?>"><?php echo $librarian['name'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date"><?php echo get_phrase('Date');?></label>
                        <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d');?>">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-rounded btn-block btn-sm"><i class="fa fa-save"></i> <?php echo get_phrase('Save');?></button>
                    </div>

                <?php echo form_close(); ?>

            </div>
        </div>
    </div>

    <div class="col-7">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo get_phrase('List Awards');?></h4>

                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><div>ID</div></th>
                                <th><div><?php echo get_phrase('Award Name'); ?></div></th>
                                <th><div><?php echo get_phrase('Gift'); ?></div></th>
                                <th><div><?php echo get_phrase('Amount'); ?></div></th>
                                <th><div><?php echo get_phrase('Awarded Employee'); ?></div></th>
                                <th><div><?php echo get_phrase('Date'); ?></div></th>
                                <th><div><?php echo get_phrase('Options'); ?></div></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                            $counter = 1; 
                            $award = $this->db->get('award')->result_array();
                            foreach ($award as $key => $award):
                            $user = explode('-', $award['user_id']);
                            $user_type = $user[0];
                            $user_id = $user[1];
                            ?>

                                <tr>
                                    <td><?php echo $counter++;?></td>
                                    <td><?php echo $award['name'];?></td>
                                    <td><?php echo $award['gift'];?></td>
                                    <td><?php echo $award['amount'];?></td>
                                    <td><?php echo $this->db->get($user_type, array($user_type, $user_id))->row()->name;?></td>
                                    <td><?php echo $award['date'];?></td>
                                    <td>
                                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/award-edit_award/<?php echo $award['award_code'];?>')" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0)" onclick="confirm_modal('<?php base_url();?>award/delete/<?php echo $award['award_code'];?>')" class="btn btn-secondary"><i class="fa fa-times"></i></a>
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