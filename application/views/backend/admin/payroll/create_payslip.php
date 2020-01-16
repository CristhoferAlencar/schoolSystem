<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('Create Payroll'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('Create Payroll'); ?></li>
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
                <h4 class="m-b-0 text-white">Add Payslip</h4>
            </div>
            <div class="card-body">

                <?php echo form_open(base_url() . 'admin/payroll_selector'); ?>

                    <div class="form-body">
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><?php echo get_phrase('Department');?></label>
                                    <select class="form-control custom-select" name="department_id" onchange="get_employees(this.value);" required>
                                        <option value=""><?php echo get_phrase('select_a_department'); ?></option>
                                        <?php $department = $this->db->get('department')->result_array();
                                        foreach($department as $key => $department):?>
                                            <option value="<?php echo $department['department_id'];?>"><?php echo $department['name'] .' '. get_phrase('department');?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><?php echo get_phrase('Employee');?></label>
                                    <select class="form-control custom-select" name="employee_id" id="employee_holder" required>
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
                                    <label class="control-label"><?php echo get_phrase('Month');?></label>
                                    <select class="form-control custom-select" name="month" required>
                                        <option value=""><?php echo get_phrase('select_a_month'); ?></option>
                                        <?php 
                                        for($i = 1; $i <= 12; $i++):
                                            if($i == 1)
                                                $m = get_phrase('january');
                                            else if($i == 2)
                                                $m = get_phrase('february');
                                            else if($i == 3)
                                                $m = get_phrase('march');
                                            else if ($i == 4)
                                                $m = get_phrase('april');
                                            else if ($i == 5)
                                                $m = get_phrase('may');
                                            else if ($i == 6)
                                                $m = get_phrase('june');
                                            else if ($i == 7)
                                                $m = get_phrase('july');
                                            else if ($i == 8)
                                                $m = get_phrase('august');
                                            else if ($i == 9)
                                                $m = get_phrase('september');
                                            else if ($i == 10)
                                                $m = get_phrase('october');
                                            else if ($i == 11)
                                                $m = get_phrase('november');
                                            else if ($i == 12)
                                                $m = get_phrase('december');
                                        ?>
                                        <option value="<?php echo $i;?>"><?php echo $m;?></option>
                                        <?php endfor;?>
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><?php echo get_phrase('Year');?></label>
                                    <select class="form-control custom-select" name="year" id="employee_holder" required>
                                        <option value=""><?php echo get_phrase('select_a_year'); ?></option>
                                        <?php for($i = 2019; $i <= 2030; $i++): ?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?> </option>
                                        <?php endfor;?>
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp;&nbsp;<?php echo get_phrase('Browse');?></button>
                    </div>

                <?php echo form_close();?>

            </div>
        </div>
    </div>
</div>
<!-- row -->