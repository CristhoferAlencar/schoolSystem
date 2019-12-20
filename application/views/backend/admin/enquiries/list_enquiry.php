<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('All Enquiries'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item"><a href="#"><?php echo get_phrase('Enquiries'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('All Enquiryies'); ?></li>
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
                <h4 class="card-title"><?php echo get_phrase('List Enquiries');?></h4>

                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase ('Category');?></th>
                                <th><?php echo get_phrase ('Mobile');?></th>
                                <th><?php echo get_phrase ('Purpose');?></th>
                                <th><?php echo get_phrase ('Name');?></th>
                                <th><?php echo get_phrase ('Who to See');?></th>
                                <th><?php echo get_phrase ('Content');?></th>
                                <th><?php echo get_phrase ('Email');?></th>
                                <th><?php echo get_phrase ('Date Submitted');?></th>
                                <th><?php echo get_phrase ('Options');?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($select_enquiry as $key => $select_enquiry):?>
                                <tr>
                                    <td><?php echo $select_enquiry ['category'];?></td>
                                    <td><?php echo $select_enquiry ['mobile'];?></td>
                                    <td><?php echo $select_enquiry ['purpose'];?></td>
                                    <td><?php echo $select_enquiry ['name'];?></td>
                                    <td><?php echo $select_enquiry ['whom_to_meet'];?></td>
                                    <td><?php echo $select_enquiry ['content'];?></td>
                                    <td><?php echo $select_enquiry ['email'];?></td>
                                    <td><?php echo $select_enquiry ['date'];?></td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="<?php echo base_url();?>admin/list_enquiry/delete/<?php echo $select_enquiry['enquiry_id'];?>" onclick="return confirm('Are you sure want to delete?');" class="btn btn-secondary"><i class="fa fa-times"></i></a>
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