<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('Manage Circular'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('Manage Circular'); ?></li>
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
                <h4 class="card-title"><?php echo get_phrase('Add Circular'); ?></h4>

                <?php echo form_open(base_url(). 'admin/circular/insert' , array('class' => 'form pt-3'));?>
                
                    <div class="form-group">
                        <label for="circularTitle"><?php echo get_phrase('Circular Title');?></label>
                        <input type="text" class="form-control" id="circularTitle" placeholder="<?php echo get_phrase('Enter Circular Title');?>" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="referenceNo"><?php echo get_phrase('Reference No');?></label>
                        <input type="text" class="form-control" id="referenceNo" placeholder="<?php echo get_phrase('Enter Reference No');?>" name="reference" required>
                    </div>
                    <div class="form-group">
                        <label for="circularDate"><?php echo get_phrase('Circular Date');?></label>
                        <textarea class="form-control" id="circularDate" name="content" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date"><?php echo get_phrase('Date');?></label>
                        <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d');?>" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-rounded btn-block btn-sm"><i class="fa fa-save"></i> <?php echo get_phrase('Add Circular');?></button>
                    </div>

                <?php echo form_close(); ?>

            </div>
        </div>
    </div>

    <div class="col-7">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo get_phrase('List Circular');?></h4>

                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><div>#</div></th>
                                <th><div><?php echo get_phrase('Title');?></div></th>
                                <th><div><?php echo get_phrase('Reference');?></div></th>
                                <th><div><?php echo get_phrase('Content');?></div></th>
                                <th><div><?php echo get_phrase('Date');?></div></th>
                                <th><div><?php echo get_phrase('Options');?></div></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $count = 1;  foreach($select_circular as $key => $circular): ?>

                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo $circular ['title'];?></td>
                                    <td><?php echo $circular ['reference'];?></td>
                                    <td><?php echo $circular ['content'];?></td>
                                    <td><?php echo $circular ['date'];?></td>
                                    <td>
                                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/circular-edit_circular/<?php echo $circular['circular_id'];?>')" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url();?>admin/circular/delete/<?php echo $circular['circular_id'];?>" onclick="return confirm('Are you sure want to delete?');" class="btn btn-secondary"><i class="fa fa-times"></i></a>
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