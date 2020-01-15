<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('Manage Applications'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('Applications'); ?></li>
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
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-3">
                        <h4 class="card-title"><?php echo get_phrase('List Applicants');?></h4>

                        <div class="list-group m-t-40">
                            <a href="<?php echo base_url();?>admin/application/applied" class="list-group-item <?php if ($status == 'applied') echo 'active';?>"><?php echo get_phrase('Applied');?></a>
                            <a href="<?php echo base_url();?>admin/application/on_review" class="list-group-item <?php if ($status == 'on_review') echo 'active';?>"><?php echo get_phrase('On Review');?></a>
                            <a href="<?php echo base_url();?>admin/application/interviewed" class="list-group-item <?php if ($status == 'interviewed') echo 'active';?>"><?php echo get_phrase('Interviewed');?></a>
                            <a href="<?php echo base_url();?>admin/application/offered" class="list-group-item <?php if ($status == 'offered') echo 'active';?>"><?php echo get_phrase('Offered');?></a>
                            <a href="<?php echo base_url();?>admin/application/hired" class="list-group-item <?php if ($status == 'hired') echo 'active';?>"><?php echo get_phrase('Hired');?></a>
                            <a href="<?php echo base_url();?>admin/application/declined" class="list-group-item <?php if ($status == 'declined') echo 'active';?>"><?php echo get_phrase('Declined');?></a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="card-title text-left"><?php echo get_phrase('List Applicants');?></h4>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/application-add_applicant_modal');" 
                                    class="btn btn-outline-success float-right"><i class="fa fa-plus"></i> <?php echo get_phrase('New Applicant'); ?>
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><div>#</div></th>
                                        <th><div><?php echo get_phrase('Applicant Name'); ?></div></th>
                                        <th><div><?php echo get_phrase('Position'); ?></div></th>
                                        <th><div><?php echo get_phrase('Application Date'); ?></div></th>
                                        <th><div><?php echo get_phrase('Status'); ?></div></th>
                                        <th><div><?php echo get_phrase('Options'); ?></div></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    $counter = 1;
                                    $select_application = $this->db->get_where('application', array ('status' => $status))->result_array();
                                    foreach ($select_application as $key => $applicant):
                                    ?>

                                        <tr>
                                            <td><?php echo $counter++;?></td>
                                            <td><?php echo $applicant['applicant_name'];?></td>
                                            <td><?php echo $this->db->get_where('vacancy', array('vacancy_id' => $applicant['vacancy_id']))->row()->name; ?></td>
                                            <td><?php echo date('Y-m-d', $applicant['apply_date']);?></td>
                                            <td><?php echo $applicant['status'];?></td>
                                            <td>
                                                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                                        <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/application-edit_application/<?php echo $applicant['application_id'];?>')" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                        <a href="javascript:void(0)" onclick="confirm_modal('<?php echo base_url();?>admin/application/delete/<?php echo $applicant['application_id'];?>')" class="btn btn-secondary"><i class="fa fa-times"></i></a>
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
    </div>
</div>