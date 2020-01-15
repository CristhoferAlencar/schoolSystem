<?php
$select_leave = $this->db->get_where('leave', array('leave_code' => $param2))->result_array();
foreach ($select_leave as $key => $leave):
?>

<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Update Leave'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url() . 'admin/leave/update/'.$leave['leave_code'] , array('target'=>'_top', 'enctype' => 'multipart/form-data'));?>
    <div class="modal-body">
        <div class="form-group">
            <label><?php echo get_phrase('Status');?></label>
            <select class="form-control select2" name="status">
                <option value="1" <?php if($leave['status'] == 1) echo 'selected'; ?>>
                    <?php echo get_phrase('approved'); ?></option>
                <option value="0" <?php if($leave['status'] == 0) echo 'selected'; ?>>
                    <?php echo get_phrase('pending'); ?></option>
                <option value="2" <?php if($leave['status'] == 2) echo 'selected'; ?>>
                    <?php echo get_phrase('declined'); ?></option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Update Leave'); ?></button>
    </div>
<?php echo form_close();?>

<?php endforeach;?>