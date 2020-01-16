<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('List Payroll'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('List Payroll'); ?></li>
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

                <?php echo form_open(base_url() . 'admin/payroll_list/filter'); ?>
                    <div class="p-t-20">
                        <div class="row">
                            <div class="form-group col-3 offset-2">
                                <label class="control-label"><?php echo get_phrase('Month');?></label>
                                <select class="form-control custom-select" name="month">
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
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group col-3">
                                <label class="control-label"><?php echo get_phrase('Year');?></label>
                                <select class="form-control custom-select" name="year">
                                    <?php $list_year = array("2019", "2020", "2021","2022", "2023","2024", "2025");
                                    foreach($list_year as $key => $row){ ?>
                                        <option value="<?php echo $row;?>"<?php if($row == $year) echo 'selected';?>><?php echo $row;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-4 m-t-30">
                                <button type="submit" class="btn btn-info" id="deduction_amount_delete">
                                    <i class="fa fa-search"></i>&nbsp;<?php echo get_phrase('Search'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                <?php echo form_close(); ?>

                <?php $payroll = $this->db->get_where('payroll', array('date' => $month . ','. $year))->result_array();
                if(empty($payroll))
                { ?>
                    <div class="alert alert-info">Please select correct month and year, then click on search button to display information.</div>
                <?php } else { ?>

                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th><?php echo get_phrase ('Employee');?></th>
                                <th><?php echo get_phrase ('Summary');?></th>
                                <th><?php echo get_phrase ('Date');?></th>
                                <th><?php echo get_phrase ('Status');?></th>
                                <th><?php echo get_phrase ('Options');?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $counter = 1;
                                $payroll = $this->db->get_where('payroll', array('date' => $month . ','. $year))->result_array();
                                foreach($payroll as $key => $row):
                            ?>
                                <tr>
                                    <td><?php echo $counter++;?></td>
                                    <td><?php echo $row['payroll_code'];?></td>
                                    <td>
                                        <?php 
                                            $user =  $this->db->get_where('teacher',array('teacher_id' => $row['user_id']))->row();
                                            echo $user->name;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $total_allowance    = 0;
                                        $total_deduction    = 0;
                                        $allowances = json_decode($row['allowances']);
                                        $deductions = json_decode($row['deductions']);

                                        foreach($allowances as $key => $allowance)
                                            $total_allowance += $allowance->amount;
                                        foreach ($deductions as $key => $deduction)
                                            $total_deduction += $deduction->amount;

                                        $net_salary = ($user->joining_salary + $total_allowance) - $total_deduction;
                                        ?>

                                        <div>
                                            <table style="width: 100%;">
                                                <tr>
                                                    <td style="text-align: right;"><?php echo get_phrase('basic_salary'); ?></td>
                                                    <td style="width: 15%; text-align: right;"> : </td>
                                                    <td style="text-align: right;"><?php echo $user->joining_salary;?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right;"><?php echo get_phrase('total_allowance'); ?></td>
                                                    <td style="width: 15%; text-align: right;"> : </td>
                                                    <td style="text-align: right;"><?php echo $total_allowance;?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right;"><?php echo get_phrase('total_deduction'); ?></td>
                                                    <td style="width: 15%; text-align: right;"> : </td>
                                                    <td style="text-align: right;"><?php echo $total_deduction;?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><hr style="margin: 5px 0px;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right;"><?php echo get_phrase('net_salary'); ?></td>
                                                    <td style="width: 15%; text-align: right;"> : </td>
                                                    <td style="text-align: right;"><?php echo  $net_salary;?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                    <td>
                                        <?php $date = explode(',', $row['date']);
                                            $month_list = array('january', 'february', 'march', 'april','may', 'june', 'july', 'august', 'september',
                                            'october', 'november', 'december');
                                            for($i ==1; $i<= 12; $i++)
                                                if($i == $date[0])
                                                    $m = get_phrase($month_list[$i-1]);
                                                    echo $m . ', ' .$date[1]; 
                                        ?>
                                    </td>
                                    <td>
                                        <?php if($row['status'] == 1)
                                            echo '<div class="label label-success">'.get_phrase('paid').'</div>';
                                            else   
                                            echo '<div class="label label-danger">'.get_phrase('unpaid').'</div>';
                                        ?>
                                    </td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/payroll-payroll_details/<?php echo $row['payroll_id'];?>')" class="btn btn-secondary" title="View Details"><i class="fa fa-eye"></i></a>
                                                <?php if($row['status']== 0){ ?>
                                                    <a href="<?php echo base_url(); ?>admin/payroll_list/mark_paid/<?php echo $row['payroll_id'];?>/<?php echo $month;?>/<?php echo $year;?>" class="btn btn-secondary" title="Mark as Paid"><i class="fa fa-check-circle"></i></a>
                                                <?php } ?> 
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>

                        </tbody>
                    </table>
                </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- row -->