<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('List Leave'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('List Leave'); ?></li>
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
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase ('Employee');?></th>
                                <th><?php echo get_phrase ('Start Date');?></th>
                                <th><?php echo get_phrase ('End Date');?></th>
                                <th><?php echo get_phrase ('Reason');?></th>
                                <th><?php echo get_phrase ('Status');?></th>
                                <th><?php echo get_phrase ('Options');?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                            $count = 1;
                            $leave = $this->db->get('leave')->result_array();
                            foreach($leave as $key =>$leave):
                            ?>
                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo $this->db->get_where('teacher',array('teacher_id' => $leave['teacher_id']))->row()->name;?></td>
                                    <td><?php echo $leave['start_date'];?></td>
                                    <td><?php echo $leave['end_date'];?></td>
                                    <td><?php echo substr($leave['reason'], 0, 50) . '...';?></td>
                                    <td>
                                        <?php 
                                        if($leave['status'] == 1) 
                                            echo '<div class="label label-success">' . get_phrase('approved') . '</div>';
                                        if($leave['status'] == 0) 
                                            echo '<div class="label label-warning">' . get_phrase('pending') . '</div>';
                                        if($leave['status'] == 2) 
                                            echo '<div class="label label-danger">' . get_phrase('declined') . '</div>';
                                        ?>
                                    </td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/leave-edit_leave/<?php echo $leave['leave_code'];?>')" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0)" onclick="confirm_modal('<?php echo base_url();?>admin/leave/delete/<?php echo $leave['leave_code'];?>')" class="btn btn-secondary"><i class="fa fa-times"></i></a>
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