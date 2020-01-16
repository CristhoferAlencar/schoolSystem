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
                                        foreach($department as $key => $department): ?>
                                            <option value="<?php echo $department['department_id']; ?>"
                                                <?php if($department['department_id'] == $department_id) echo 'selected'; ?>>
                                                    <?php echo $department['name'] . ' ' . get_phrase('department'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><?php echo get_phrase('Employee');?></label>
                                    <select class="form-control custom-select" name="employee_id" id="employee_holder" required>
                                        <?php
                                        $employee = $this->db->get_where('teacher',
                                            array('department_id' => $department_id))->result_array();
                                        foreach($employee as $key => $employee): ?>
                                            <option value="<?php echo $employee['teacher_id']; ?>"
                                                <?php if($employee['teacher_id'] == $employee_id) echo 'selected'; ?>>
                                                    <?php echo $employee['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
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
                                        for ($i = 1; $i <= 12; $i++):
                                            if ($i == 1)
                                                $m = get_phrase('january');
                                            else if ($i == 2)
                                                $m = get_phrase('february');
                                            else if ($i == 3)
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
                                                $m = get_phrase('december'); ?>
                                            <option value="<?php echo $i; ?>"
                                                <?php if($i == $month) echo 'selected'; ?>>
                                                    <?php echo $m; ?>
                                            </option>
                                        <?php endfor;?>
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><?php echo get_phrase('Year');?></label>
                                    <select class="form-control custom-select" name="year" required>
                                        <option value=""><?php echo get_phrase('select_a_year'); ?></option>
                                        <?php
                                        for($i = 2019; $i <= 2030; $i++): ?>
                                            <option value="<?php echo $i; ?>"
                                                <?php if($i == $year) echo 'selected'; ?>>
                                                    <?php echo $i; ?>
                                            </option>
                                        <?php endfor; ?>
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

<?php echo form_open(base_url() . 'admin/create_payroll'); ?>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Allowances</h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="p-t-20" id="allowance">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="type"><?php echo get_phrase ('Type');?></label>
                                        <input type="text" class="form-control" id="type" name="allowance_type[]">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="allowance_amount_1"><?php echo get_phrase ('Amount');?></label>
                                        <input type="number" class="form-control" name="allowance_amount[]" id="allowance_amount_1">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                        </div>
                        <!--/row-->

                        <div class="row">
                            <div class="col-md-12">
                                <span id="allowance_input">
                                    <div class="row">
                                        <div class="form-group col-5">
                                            <input type="text" class="form-control" name="allowance_type[]">
                                        </div>
                                        <div class="form-group col-5">
                                            <input type="number" class="form-control" name="allowance_amount[]" id="allowance_amount">
                                        </div>
                                        <div class="form-group col-2">
                                            <button type="button" class="btn btn-danger btn-circle btn-xs" id="allowance_amount_delete" onclick="deleteAllowanceParentElement(this)">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-info" onClick="add_allowance()"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Add Allowance'); ?></button>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary" onClick="calculate_total_allowance()"><i class="fa fa-calculator"></i>&nbsp;<?php echo get_phrase('Calculate Allowance'); ?></button>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Deductions</h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="p-t-20" id="deduction">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="type"><?php echo get_phrase ('Type');?></label>
                                        <input type="text" class="form-control" id="type" name="deduction_type[]">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="deduction_amount_1"><?php echo get_phrase ('Amount');?></label>
                                        <input type="number" class="form-control" name="deduction_amount[]" id="deduction_amount_1">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                        </div>
                        <!--/row-->

                        <div class="row">
                            <div class="col-md-12">
                                <span id="deduction_input">
                                    <div class="row">
                                        <div class="form-group col-5">
                                            <input type="text" class="form-control" name="deduction_type[]">
                                        </div>
                                        <div class="form-group col-5">
                                            <input type="number" class="form-control" name="deduction_amount[]" id="deduction_amount">
                                        </div>
                                        <div class="form-group col-2">
                                            <button type="button" class="btn btn-danger btn-circle btn-xs" id="deduction_amount_delete" onclick="deleteDeductionParentElement(this)">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-info" onClick="add_deduction()"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Add Deduction'); ?></button>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary" onClick="calculate_total_deduction()"><i class="fa fa-calculator"></i>&nbsp;<?php echo get_phrase('Calculate Deduction'); ?></button>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Summary</h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="row p-t-20">
                            <div class="col-6">
                                <div class="form-group">
                                    <?php $joining_salary = $this->db->get_where('teacher', array('teacher_id' => $employee_id))->row()->joining_salary;?>
                                    <label for="basic"><?php echo get_phrase ('Basic');?></label>
                                    <input type="text" class="form-control" id="basic" name="basic" value="<?php echo $joining_salary;?>">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="total_allowance"><?php echo get_phrase ('Total Allowance');?></label>
                                    <input type="text" class="form-control" name="total_allowance" id="total_allowance" value="0">
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="total_deduction"><?php echo get_phrase ('Total Deduction');?></label>
                                    <input type="text" class="form-control" id="total_deduction" name="total_deduction" value="0">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="net_salary"><?php echo get_phrase ('Net Salary');?></label>
                                    <input type="text" class="form-control" name="net_salary" id="net_salary" value="<?php echo $joining_salary;?>">
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label"><?php echo get_phrase('Status');?></label>
                                    <select class="form-control custom-select" name="status">
                                        <option value="1"><?php echo get_phrase('paid'); ?></option>
                                        <option value="0"><?php echo get_phrase('unpaid'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Create Payslip'); ?></button>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->

    <input type="hidden" name="teacher_id" value="<?php echo $employee_id;?>">
    <input type="hidden" name="month" value="<?php echo $month;?>">
    <input type="hidden" name="year" value="<?php echo $year;?>">

<?php echo form_close();?>