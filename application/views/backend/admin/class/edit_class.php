<?php
$class = $this->db->get_where('class', array('class_id' => $param2))->result_array();
foreach ($class as $key => $class):
?>

<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Edit Vacancy'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url() . 'admin/classes/update/' . $param2);?>
    <div class="modal-body">
        <div class="form-group">
            <label for="name"><?php echo get_phrase('Name');?></label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $class['name'];?>">
        </div>
        <div class="form-group">
            <label for="name_numeric"><?php echo get_phrase('Name Numeric');?></label>
            <input type="number" class="form-control" id="name_numeric" name="name_numeric" value="<?php echo $class['name_numeric'];?>">
        </div>
        <div class="form-group">
            <label><?php echo get_phrase('Teacher');?></label>
            <select class="form-control custom-select" name="teacher_id" required>
                <option value=""><?php echo get_phrase('select_teacher');?></option>
                <?php $teacher =  $this->db->get('teacher')->result_array();
                foreach($teacher as $key => $teacher):?>
                <option value="<?php echo $teacher['teacher_id'];?>"
                <?php if($class['teacher_id'] == $teacher['teacher_id']) echo 'selected';?>>
                <?php echo $teacher['name'];?>
                </option>
                <?php endforeach;?>
            </select>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Update'); ?></button>
    </div>
<?php echo form_close();?>

<?php endforeach;?>