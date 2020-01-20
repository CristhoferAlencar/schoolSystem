<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('Class'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('Class'); ?></li>
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
                <h4 class="card-title"><?php echo get_phrase('Add Class'); ?></h4>

                <?php echo form_open(base_url() . 'admin/classes/create', array('class' => 'form pt-3', 'enctype' => 'multipart/form-data')); ?>
                
                    <div class="form-group">
                        <label for="name"><?php echo get_phrase('Name');?></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="name_numeric"><?php echo get_phrase('Name Numeric');?></label>
                        <input type="number" class="form-control" id="name_numeric" name="name_numeric" required>
                    </div>
                    <div class="form-group">
                        <label><?php echo get_phrase('Teacher');?></label>
                        <select class="form-control custom-select" name="teacher_id" required>
                            <option value=""><?php echo get_phrase('select_teacher');?></option>
                            <?php $teacher =  $this->db->get('teacher')->result_array();
                            foreach($teacher as $key => $teacher):?>
                            <option value="<?php echo $teacher['teacher_id'];?>"><?php echo $teacher['name'];?></option>
                            <?php endforeach;?>
                        </select>
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
                <h4 class="card-title"><?php echo get_phrase('List Vacancies');?></h4>

                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><div>#</div></th>
                                <th><div><?php echo get_phrase('Class Name');?></div></th>
                                <th><div><?php echo get_phrase('Numeric Name');?></div></th>
                                <th><div><?php echo get_phrase('Teacher');?></div></th>
                                <th><div><?php echo get_phrase('Options'); ?></div></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                            $counter = 1; $classes =  $this->db->get('class')->result_array();
                            foreach($classes as $key => $classes): ?>

                                <tr>
                                    <td><?php echo $counter++;?></td>
                                    <td><?php echo $classes['name'];?></td>
                                    <td><?php echo $classes['name_numeric'];?></td>
                                    <td><?php echo $this->crud_model->get_type_name_by_id('teacher', $classes['teacher_id']);?></td>
                                    <td>
                                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/class-edit_class/<?php echo $classes['class_id'];?>')" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0)" onclick="confirm_modal('<?php base_url();?>classes/delete/<?php echo $classes['class_id'];?>')" class="btn btn-secondary"><i class="fa fa-times"></i></a>
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