<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('Expenses Category'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('Expenses Category'); ?></li>
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
                <h4 class="card-title"><?php echo get_phrase('Add Category'); ?></h4>

                <?php echo form_open(base_url() . 'expense/expense_category/insert', array('class' => 'form pt-3'));?>
                
                    <div class="form-group">
                        <label for="tittle"><?php echo get_phrase('Title');?></label>
                        <input type="text" class="form-control" id="tittle" placeholder="<?php echo get_phrase('Enter Title');?>" name="name" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-rounded btn-block btn-sm"><i class="fa fa-save"></i> <?php echo get_phrase('Save');?></button>
                    </div>

                <?php echo form_close(); ?>

            </div>
        </div>
    </div>

    <div class="col-7">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo get_phrase('List Clubs');?></h4>

                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><div>#</div></th>
                                <th><div><?php echo get_phrase('Expense Title');?></div></th>
                                <th><div><?php echo get_phrase('options');?></div></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $count = 1; foreach ($select_expense_category as $key => $expense_category): ?>

                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo $expense_category ['name'];?></td>
                                    <td>
                                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/expense-edit_expense_category/<?php echo $expense_category['expense_category_id'];?>')" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url();?>expense/expense_category/delete/<?php echo $expense_category['expense_category_id'];?>" onclick="return confirm('Are you sure want to delete?');" class="btn btn-secondary"><i class="fa fa-times"></i></a>
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