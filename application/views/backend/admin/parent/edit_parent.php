<?php
$select_parent = $this->db->get_where('parent', array('parent_id' => $param2))->result_array();
foreach ($select_parent as $key => $parent):
?>

<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Update Club'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url().'admin/parent/update/' . $parent['parent_id'], array('enctype'=>'multipart/form-data'));?>
    <div class="modal-body">
        <div class="form-group">
            <label for="name"><?php echo get_phrase ('Name');?></label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $parent ['name'];?>">
        </div>
        <div class="form-group">
            <label for="email"><?php echo get_phrase ('Email');?></label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $parent ['email'];?>">
        </div>
        <div class="form-group">
            <label for="phone"><?php echo get_phrase ('Phone');?></label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $parent ['phone'];?>">
        </div>
        <div class="form-group">
            <label for="profession"><?php echo get_phrase ('Profession');?></label>
            <input type="text" class="form-control" id="profession" name="profession" value="<?php echo $parent ['profession'];?>">
        </div>
        <div class="form-group">
            <label for="address"><?php echo get_phrase ('Address');?></label>
            <textarea class="form-control" name="address" id="address"><?php echo $parent['address'];?></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Update'); ?></button>
    </div>
<?php echo form_close();?>

<?php endforeach;?>