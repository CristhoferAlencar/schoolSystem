<?php
$select_circular = $this->db->get_where('circular', array('circular_id' => $param2))->result_array();
foreach ($select_circular as $key => $circular):
?>

<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Update Circular'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url() . 'admin/circular/update/' . $circular['circular_id']);?>
    <div class="modal-body">
        <div class="form-group">
            <label for="circularTitle"><?php echo get_phrase('Circular Title');?></label>
            <input type="text" class="form-control" id="circularTitle" name="title" value="<?php echo $circular['title']; ?>" required>
        </div>
        <div class="form-group">
            <label for="referenceNo"><?php echo get_phrase('Reference No');?></label>
            <input type="text" class="form-control" id="referenceNo" name="reference" value="<?php echo $circular['reference']; ?>" required>
        </div>
        <div class="form-group">
            <label for="circularDate"><?php echo get_phrase('Circular Date');?></label>
            <textarea class="form-control" id="circularDate" name="content" required><?php echo $circular['content']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="date"><?php echo get_phrase('Date');?></label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $circular['date']; ?>" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Update'); ?></button>
    </div>
<?php echo form_close();?>

<?php endforeach;?>