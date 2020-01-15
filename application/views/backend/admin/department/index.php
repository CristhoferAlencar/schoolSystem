<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('Manage Departments'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('Manage Departments'); ?></li>
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
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo get_phrase('New Department'); ?></h4>
               
                <?php echo form_open(base_url() . 'department/department/insert', array('class' => 'mt-4', 'enctype' => 'multipart/form-data')); ?>
                   
                    <div class="form-group">
                        <label for="departmentName"><?php echo get_phrase ('Department Name');?></label>
                        <input type="text" class="form-control" id="departmentName" name="name" placeholder="<?php echo get_phrase('Enter Department Name');?>">
                    </div>
                    
                    <div id="designation">
                        <div class="form-group">
                            <label for="designation"><?php echo get_phrase ('Designation');?></label>
                            <input type="text" class="form-control" id="designation" name="designation[]" placeholder="<?php echo get_phrase('Enter Designation');?>">
                        </div>
                    </div>
                    <span id="designation_input">
                        <div class="row">
                            <div class="form-group col-6">
                                <input type="text" class="form-control" name="designation[]"  value="" / placeholder= "designation here">
                            </div>
                            <div class="form-group col-6">
                                <button type="button" class="btn btn-danger btn-circle btn-xs" onclick="deleteParentElement(this)">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </span>
                    <div class="form-group">
                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-info" onClick="add_designation()"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Add Designation'); ?></button>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
                
                <?php echo form_close();?>

            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo get_phrase('List Departments');?></h4>

                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase ('Department Name');?></th>
                                <th><?php echo get_phrase ('Designation');?></th>
                                <th><?php echo get_phrase ('Total Employees');?></th>
                                <th><?php echo get_phrase ('Options');?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $count = 1;
                                $this->db->order_by('department_id', 'desc');
                                $department = $this->db->get('department')->result_array();
                                foreach ($department as $row):
                            ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td>
                                        <?php
                                            $count2 = 1;
                                            $designation = $this->db->get_where('designation', array('department_id' => $row['department_id']))->result_array();
                                            foreach ($designation as $row1):
                                                echo $count2++.'.';
                                                echo $row1['name'];
                                                echo '<br>';
                                            endforeach;
                                        ?>
                                    </td>
                                    <td><?php echo $this->db->get_where('teacher', array('department_id' => $row['department_id']))->num_rows(); ?></td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/department-edit_department/<?php echo $row['department_code']; ?>');" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0)" onclick="confirm_modal('<?php echo base_url();?>department/department/delete/<?php echo $row['department_code'];?>');" class="btn btn-secondary"><i class="fa fa-times"></i></a>
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