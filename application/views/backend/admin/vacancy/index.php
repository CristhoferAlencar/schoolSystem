<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('Manage Vacancies'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('Vacancies'); ?></li>
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
                <h4 class="card-title"><?php echo get_phrase('Add Vacancy'); ?></h4>

                <?php echo form_open(base_url() . 'admin/vacancy/insert', array('class' => 'form pt-3', 'enctype' => 'multipart/form-data')); ?>
                
                    <div class="form-group">
                        <label for="position_name"><?php echo get_phrase('Position Name');?></label>
                        <input type="text" class="form-control" id="position_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="number_of_vacancies"><?php echo get_phrase('Number of Vacancies');?></label>
                        <input type="number" class="form-control" id="number_of_vacancies" name="number_of_vacancies" required>
                    </div>
                    <div class="form-group">
                        <label for="date"><?php echo get_phrase('Last Date of Application');?></label>
                        <input type="date" class="form-control" id="date" name="last_date" value="<?php echo date('Y-m-d');?>">
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
                                <th><div><?php echo get_phrase('Position Name'); ?></div></th>
                                <th><div><?php echo get_phrase('Number of Vacancies'); ?></div></th>
                                <th><div><?php echo get_phrase('Last Date of Application'); ?></div></th>
                                <th><div><?php echo get_phrase('Options'); ?></div></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $counter = 1; foreach($select_vacancy as $key => $vacancy):?>

                                <tr>
                                    <td><?php echo $counter++;?></td>
                                    <td><?php echo $vacancy['name'];?></td>
                                    <td><?php echo $vacancy['number_of_vacancies'];?></td>
                                    <td><?php echo $vacancy['last_date'];?></td>
                                    <td>
                                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/vacancy-edit_vacancy/<?php echo $vacancy['vacancy_id'];?>')" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0)" onclick="confirm_modal('<?php base_url();?>vacancy/delete/<?php echo $vacancy['vacancy_id'];?>')" class="btn btn-secondary"><i class="fa fa-times"></i></a>
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