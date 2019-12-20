<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('Manage Parnets'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('Manage Parnets'); ?></li>
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
                <h4 class="card-title"><?php echo get_phrase('Add Parent'); ?></h4>
               
                <?php echo form_open(base_url().'admin/parent/insert', array('class' => 'mt-4', 'enctype'=>'multipart/form-data'));?>
                   
                    <div class="form-group">
                        <label for="name"><?php echo get_phrase ('Name');?></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo get_phrase('Enter Name');?>">
                    </div>
                    <div class="form-group">
                        <label for="email"><?php echo get_phrase ('Email');?></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo get_phrase('Enter Email');?>">
                    </div>
                    <div class="form-group">
                        <label for="phone"><?php echo get_phrase ('Phone');?></label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo get_phrase('Enter Phone');?>">
                    </div>
                    <div class="form-group">
                        <label for="profession"><?php echo get_phrase ('Profession');?></label>
                        <input type="text" class="form-control" id="profession" name="profession" placeholder="<?php echo get_phrase('Enter Profession');?>">
                    </div>
                    <div class="form-group">
                        <label for="address"><?php echo get_phrase ('Address');?></label>
                        <textarea class="form-control" name="address" id="address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="password"><?php echo get_phrase ('Password');?></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo get_phrase('Enter Password');?>">
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
                
                <?php echo form_close();?>

            </div>
        </div>
    </div>
</div>
<!-- row -->
<!-- row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo get_phrase('Parents');?></h4>

                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase ('Name');?></th>
                                <th><?php echo get_phrase ('Email');?></th>
                                <th><?php echo get_phrase ('Phone');?></th>
                                <th><?php echo get_phrase ('Profession');?></th>
                                <th><?php echo get_phrase ('Options');?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $count = 1; foreach ($select_parent as $key => $parent): ?>
                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo $parent ['name'];?></td>
                                    <td><?php echo $parent ['email'];?></td>
                                    <td><?php echo $parent ['phone'];?></td>
                                    <td><?php echo $parent ['profession'];?></td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/parent-edit_parent/<?php echo $parent['parent_id'];?>')" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url();?>admin/parent/delete/<?php echo $parent['parent_id'];?>" onclick="return confirm('Are you sure want to delete?');" class="btn btn-secondary"><i class="fa fa-times"></i></a>
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