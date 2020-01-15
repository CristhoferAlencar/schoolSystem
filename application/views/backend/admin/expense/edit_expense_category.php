<?php
$edit_expense_category = $this->db->get_where('expense_category' , array('expense_category_id' => $param2) )->result_array();
foreach ($edit_expense_category as $key => $row):
?>

<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Update Category'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url() . 'expense/expense_category/update/' . $row['expense_category_id']); ?>
    <div class="modal-body">
        <div class="form-group">
            <label for="tittle"><?php echo get_phrase('Title');?></label>
            <input type="text" class="form-control" id="tittle" value="<?php echo $row['name'];?>" name="name">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Update'); ?></button>
    </div>
<?php echo form_close();?>

<?php endforeach;?>