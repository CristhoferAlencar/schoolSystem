<?php
$edit_expense =	$this->db->get_where('payment' , array('payment_id' => $param2) )->result_array();
foreach ($edit_expense as $key => $row):
?>

<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Update Expense'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url() . 'expense/expense/update/'.$row['payment_id'] , array('target'=>'_top', 'enctype' => 'multipart/form-data'));?>
    <div class="modal-body">
        <div class="form-group">
            <label for="title"><?php echo get_phrase ('Title');?></label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title'];?>">
        </div>
        <div class="form-group">
            <label for="category"><?php echo get_phrase ('Category');?></label>
            <select class="form-control select2" name="expense_category_id" id="category">
                <option value=""><?php echo get_phrase('select_expense_category');?></option>
                <?php 
                    $categories = $this->db->get('expense_category')->result_array();
                    foreach ($categories as $row2):
                ?>
                        <option value="<?php echo $row2['expense_category_id'];?>"
                            <?php if ($row['expense_category_id'] == $row2['expense_category_id'])
                                echo 'selected';?>><?php echo $row2['name'];?>
                        </option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="description"><?php echo get_phrase ('Description');?></label>
            <textarea class="form-control" rows="5" name="description" id="description"><?php echo $row['description'];?></textarea>
        </div>
        <div class="form-group">
            <label for="amount"><?php echo get_phrase ('Amount');?></label>
            <input type="text" class="form-control" id="amount" name="amount" value="<?php echo $row['amount'];?>">
        </div>
        <div class="form-group">
            <label for="method"><?php echo get_phrase ('Method');?></label>
            <select class="form-control select2" name="method" id="method">
                <option value="cash"<?php if ($row['method'] == 1) echo 'selected;' ?>><?php echo get_phrase('Cash');?></option>
                    <option value="cheque"<?php if ($row['method'] == 2) echo 'selected;' ?>><?php echo get_phrase('Cheque');?></option>
                    <option value="card"<?php if ($row['method'] == 3) echo 'selected;' ?>><?php echo get_phrase('Card');?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="timestamp"><?php echo get_phrase ('Date');?></label>
            <input type="date" class="form-control" id="timestamp" name="timestamp" value="<?php echo $row['timestamp']; ?>">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Update'); ?></button>
    </div>
<?php echo form_close();?>

<?php endforeach;?>