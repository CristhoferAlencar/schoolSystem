<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Add Category'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url().'admin/enquiry_category/insert', array('enctype'=>'multipart/form-data'));?>
    <div class="modal-body">
            <div class="form-group">
                <label for="category" class="control-label"><?php echo get_phrase('Category'); ?></label>
                <input type="text" class="form-control" id="category" name="category">
            </div>
            <div class="form-group">
                <label for="purpose" class="control-label"><?php echo get_phrase('Purpose'); ?></label>
                <input type="text" class="form-control" id="purpose" name="purpose">
            </div>
            <div class="form-group">
                <label for="whom" class="control-label"><?php echo get_phrase('Whom'); ?></label>
                <input type="text" class="form-control" id="whom" name="whom">
            </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Save'); ?></button>
    </div>
<?php echo form_close();?>