<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('Section'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('Section'); ?></li>
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
                <h4 class="card-title"><?php echo get_phrase('Add Section'); ?></h4>

                <?php echo form_open(base_url() . 'admin/section/create', array('class' => 'form pt-3', 'enctype' => 'multipart/form-data')); ?>
                
                    <div class="form-group">
                        <label for="name"><?php echo get_phrase('Name');?></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="nick_name"><?php echo get_phrase('Nick Name');?></label>
                        <input type="text" class="form-control" id="nick_name" name="nick_name" required>
                    </div>
                    <div class="form-group">
                        <label><?php echo get_phrase('Class');?></label>
                        <select class="form-control custom-select" name="class_id" required>
                            <option value=""><?php echo get_phrase('Select Class');?></option>
                            <?php $class =  $this->db->get('class')->result_array();
                            foreach($class as $key => $class):?>
                            <option value="<?php echo $class['class_id'];?>"><?php echo $class['name'];?></option>
                            <?php endforeach;?>
                        </select>
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
                <h4 class="card-title"><?php echo get_phrase('List Section');?></h4>

                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><div>#</div></th>
                                <th><div><?php echo get_phrase('Section Name');?></div></th>
                                <th><div><?php echo get_phrase('Nick Name');?></div></th>
                                <th><div><?php echo get_phrase('Class');?></div></th>
                                <th><div><?php echo get_phrase('Teacher');?></div></th>
                                <th><div><?php echo get_phrase('Options'); ?></div></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                            $counter = 1; $section =  $this->db->get_where('section')->result_array();
                            foreach($section as $key => $section): ?>

                                <tr>
                                    <td><?php echo $counter++;?></td>
                                    <td><?php echo $section['name'];?></td>
                                    <td><?php echo $section['nick_name'];?></td>
                                    <td><?php echo $this->crud_model->get_type_name_by_id('class', $section['class_id']);?></td>
                                    <td><?php echo $this->crud_model->get_type_name_by_id('teacher', $section['teacher_id']);?></td>
                                    <td>
                                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/section-edit_section/<?php echo $section['teacher_id'];?>')" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0)" onclick="confirm_modal('<?php base_url();?>section/delete/<?php echo $section['teacher_id'];?>')" class="btn btn-secondary"><i class="fa fa-times"></i></a>
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