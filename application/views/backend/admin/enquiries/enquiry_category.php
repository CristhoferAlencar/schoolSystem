<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('Manage Category'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item"><a href="#"><?php echo get_phrase('Enquiries'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('Enquiry Category'); ?></li>
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
                    <div class="col-md-6 align-self-center">
                        <h4 class="card-title"><?php echo get_phrase('All Categories');?></h4>
                    </div>
                    <div class="col-md-6">
                        <button onclick="showAjaxModal('<?php echo base_url();?>modal/popup/enquiries-add_enquiry_category');" 
                            class="btn btn-info float-right mt-1">
                                <i class="fa fa-plus"></i> <?php echo get_phrase('add_category'); ?>
                        </button>
                    </div>
                </div>

                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th><?php echo get_phrase ('category');?></th>
                            <th><?php echo get_phrase ('purpose');?></th>
                            <th><?php echo get_phrase ('whom');?></th>
                            <th><?php echo get_phrase ('option');?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($enquiry_category as $key => $row):?>

                                <tr>
                                    <td><?php echo $row['enquiry_category_id'];?></td>
                                    <td><?php echo $row['category'];?></td>
                                    <td><?php echo $row['purpose'];?></td>
                                    <td><?php echo $row['whom'];?></td>
                                    <td>
                                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/enquiries-edit_enquiry_category/<?php echo $row['enquiry_category_id'];?>')" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url();?>admin/enquiry_category/delete/<?php echo $row['enquiry_category_id'];?>" onclick="return confirm('Are you sure want to delete?');" class="btn btn-secondary"><i class="fa fa-times"></i></a>
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