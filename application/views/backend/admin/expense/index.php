<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo get_phrase('Manage Expenses'); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo get_phrase('Manage Expenses'); ?></li>
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
                <h4 class="card-title"><?php echo get_phrase('New Expense'); ?></h4>
               
                <?php echo form_open(base_url() . 'expense/expense/insert/' , array('class' => 'mt-4', 'enctype' => 'multipart/form-data'));?>
                   
                    <div class="form-group">
                        <label for="title"><?php echo get_phrase ('Title');?></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="<?php echo get_phrase('Enter Title');?>">
                    </div>
                    <div class="form-group">
                        <label for="category"><?php echo get_phrase ('Category');?></label>
                        <select class="form-control select2" name="expense_category_id" id="category">
                            <option value=""><?php echo get_phrase('select_expense_category');?></option>
                            <?php 
                                $categories = $this->db->get('expense_category')->result_array();
                                foreach ($categories as $row):
                            ?>
                                <option value="<?php echo $row['expense_category_id'];?>"><?php echo $row['name'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description"><?php echo get_phrase ('Description');?></label>
                        <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="amount"><?php echo get_phrase ('Amount');?></label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="<?php echo get_phrase('Enter Amount');?>">
                    </div>
                    <div class="form-group">
                        <label for="method"><?php echo get_phrase ('Method');?></label>
                        <select class="form-control select2" name="method" id="method">
                            <option value="1"><?php echo get_phrase('Cash');?></option>
                            <option value="2"><?php echo get_phrase('Cheque');?></option>
                            <option value="3"><?php echo get_phrase('Card');?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="timestamp"><?php echo get_phrase ('Date');?></label>
                        <input type="date" class="form-control" id="timestamp" name="timestamp" value="<?php echo date('Y-m-d') ?>">
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
                <h4 class="card-title"><?php echo get_phrase('List Expenses');?></h4>

                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase ('Title');?></th>
                                <th><?php echo get_phrase ('Category');?></th>
                                <th><?php echo get_phrase ('Method');?></th>
                                <th><?php echo get_phrase ('Amount');?></th>
                                <th><?php echo get_phrase ('Date');?></th>
                                <th><?php echo get_phrase ('Options');?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $count = 1; foreach ($select_expense as $key => $expense): ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $expense['title'];?></td>
                                    <td>
                                        <?php 
                                            if($expense['expense_category_id']!= 0 || $expense['expense_category_id']!= '')
                                            echo $this->db->get_where('expense_category', array('expense_category_id' => $expense['expense_category_id']))->row()->name;
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if($expense['method'] == 1)
                                                echo get_phrase('cash');   
                                            
                                            if($expense['method'] == 2)
                                                echo get_phrase('cheque'); 
                                            
                                            if($expense['method'] == 3)
                                                echo get_phrase('card');           
                                        ?>
                                    </td>
                                    <td><?php echo $expense['amount'];?></td>
                                    <td><?php echo $expense['timestamp'];?></td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/expense-edit_expense/<?php echo $expense['payment_id'];?>')" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0)" onclick="confirm_modal('<?php echo base_url();?>expense/expense/delete/<?php echo $expense['payment_id'];?>')" class="btn btn-secondary"><i class="fa fa-times"></i></a>
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