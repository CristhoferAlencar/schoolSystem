<?php
$subject = $this->db->get_where('subject', array('subject_id' => $param2))->result_array();
foreach ($subject as $key => $subject):
?>

<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Edit Subject'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url() . 'subject/subject/update/' . $param2);?>
    <div class="modal-body">

        <div class="form-group">
            <label for="name"><?php echo get_phrase('Name');?></label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $subject['name'];?>">
        </div>
        <div class="form-group">
            <label><?php echo get_phrase('Class');?></label>
            <select class="form-control custom-select" name="class_id" required>
                <option value=""><?php echo get_phrase('select_class');?></option>
                <?php $class =  $this->db->get('class')->result_array();
                foreach($class as $key => $class):?>
                <option value="<?php echo $class['class_id'];?>"
                <?php if($subject['class_id'] == $class['class_id']) echo 'selected';?>>
                <?php echo $class['name'];?>
                </option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label><?php echo get_phrase('Teacher');?></label>
            <select class="form-control custom-select" name="teacher_id" required>
                <option value=""><?php echo get_phrase('select_teacher');?></option>
                <?php $teacher =  $this->db->get('teacher')->result_array();
                foreach($teacher as $key => $teacher):?>
                <option value="<?php echo $teacher['teacher_id'];?>"
                <?php if($subject['teacher_id'] == $teacher['teacher_id']) echo 'selected';?>>
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