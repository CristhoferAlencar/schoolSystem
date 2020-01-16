<?php
$edit_data = $this->db->get_where('payroll', array('payroll_id' => $param2))->result_array();
foreach ($edit_data as $key => $row):
    $teacher = $this->db->get_where('teacher', array('teacher_id' => $row['user_id']))->row();
    $date = explode(',', $row['date']);
    $month_list = array('january', 'february', 'march', 'april', 'may', 'june', 'july',
        'august', 'september', 'october', 'november', 'december');
    for ($i = 1; $i <= 12; $i++)
        if ($i == $date[0])
            $month = get_phrase($month_list[$i]);
?>
<div class="printableArea">
    <div class="modal-header">
        <h4 class="modal-title"><?php echo get_phrase('Payroll Details'); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right text-right">
                    <address>
                        <p class="text-muted m-l-30"><?php echo get_phrase('payslip_code'); ?> : <?php echo $row['payroll_code']; ?>
                            <br> <?php echo get_phrase('employee'); ?> : <?php echo $teacher->name; ?>
                            <br> <?php echo get_phrase('date'); ?> : <?php echo $month . ', ' . $date[1]; ?>
                            <br> <?php echo get_phrase('status'); ?> : <?php if($row['status'] == 0)
                                                                                echo get_phrase('unpaid');
                                                                            else
                                                                                echo get_phrase('paid'); ?></p>
                    </address>
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-responsive m-t-40" style="clear: both;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th><?php echo get_phrase('Type'); ?></th>
                                <th class="text-right"><?php echo get_phrase('Amount'); ?></th>
                                <th class="text-right"><?php echo get_phrase('Kind'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_allowance    = 0;
                            $allowances         = json_decode($row['allowances']);
                            $i = 1;
                            foreach ($allowances as $allowance){
                                $total_allowance += $allowance->amount; ?>
                                <tr class="table-success">
                                    <td class="text-center"><?php echo $i++; ?></td>
                                    <td><?php echo $allowance->type; ?></td>
                                    <td class="text-right"><?php echo $allowance->amount; ?></td>
                                    <td class="text-right"><?php echo get_phrase('Allowance'); ?></td>
                                </tr>
                            <?php }  ?>
                            <?php
                            $total_deduction = 0;
                            $deductions = json_decode($row['deductions']);
                            $i = 1;
                            foreach ($deductions as $deduction) {
                                $total_deduction += $deduction->amount;
                                ?>
                                <tr class="table-danger">
                                    <td class="text-center"><?php echo $i++; ?></td>
                                    <td><?php echo $deduction->type; ?></td>
                                    <td class="text-right"><?php echo $deduction->amount; ?></td>
                                    <td class="text-right"><?php echo get_phrase('Deduction'); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="pull-right m-t-30 text-right">
                    <p><?php echo get_phrase('Basic Salary'); ?> - <?php echo $teacher->joining_salary; ?></p>
                    <p><?php echo get_phrase('Total Allowance'); ?> : <?php echo $total_allowance; ?> </p>
                    <p><?php echo get_phrase('Total Deduction'); ?> : <?php echo $total_deduction; ?> </p>
                    <hr>
                    <h3><b><?php echo get_phrase('Net Salary'); ?> :</b> <?php $net_salary = ($teacher->joining_salary + $total_allowance) - $total_deduction;
                                                                        echo $net_salary; ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button id="print" class="btn btn-info btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
    </div>
</div>

<?php endforeach; ?>