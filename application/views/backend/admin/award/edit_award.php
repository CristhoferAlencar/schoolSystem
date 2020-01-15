<?php
$award = $this->db->get_where('award', array('award_code' => $param2))->result_array();
foreach($award as $key => $award):
?>

<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Edit Award'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url() . 'admin/award/update/' . $param2);?>
    <div class="modal-body">
        <div class="form-group">
            <label for="award_name"><?php echo get_phrase('Award Name');?></label>
            <input type="text" class="form-control" id="award_name" name="name" required value="<?php echo $award['name'];?>">
        </div>
        <div class="form-group">
            <label for="gift"><?php echo get_phrase('Gift');?></label>
            <input type="text" class="form-control" id="gift" name="gift" value="<?php echo $award['gift'];?>">
        </div>
        <div class="form-group">
            <label for="amount"><?php echo get_phrase('Amount');?></label>
            <input type="text" class="form-control" id="amount" name="amount" value="<?php echo $award['amount'];?>">
        </div>
        <div class="form-group">
            <label><?php echo get_phrase('Employee');?></label>
            <select class="form-control custom-select" name="user_id" required>
                <option value=""><?php echo get_phrase('select_an_employee'); ?></option>
                <optgroup label="<?php echo get_phrase('admin');?>">
                <?php $admin = $this->db->get('admin')->result_array();
                foreach ($admin as $key => $admin):?>
                <option value="admin-<?php echo $admin['admin_id'];?>"><?php echo $admin['name'];?></option>
                <?php endforeach;?>

                <optgroup label="<?php echo get_phrase('teacher');?>">
                <?php $teacher = $this->db->get('teacher')->result_array();
                foreach ($teacher as $key => $teacher):?>
                <option value="teacher-<?php echo $teacher['teacher_id'];?>"><?php echo $teacher['name'];?></option>
                <?php endforeach;?>
            

                <optgroup label="<?php echo get_phrase('hrm');?>">
                <?php $hrm = $this->db->get('hrm')->result_array();
                foreach ($hrm as $key => $hrm):?>
                <option value="hrm-<?php echo $hrm['hrm_id'];?>"><?php echo $hrm['name'];?></option>
                <?php endforeach;?>

                <optgroup label="<?php echo get_phrase('accountant');?>">
                <?php $accountant = $this->db->get('accountant')->result_array();
                foreach ($accountant as $key => $accountant):?>
                <option value="accountant-<?php echo $accountant['accountant_id'];?>"><?php echo $accountant['name'];?></option>
                <?php endforeach;?>

                <optgroup label="<?php echo get_phrase('parent');?>">
                <?php $parent = $this->db->get('parent')->result_array();
                foreach ($parent as $key => $parent):?>
                <option value="parent-<?php echo $parent['parent_id'];?>"><?php echo $parent['name'];?></option>
                <?php endforeach;?>

                <optgroup label="<?php echo get_phrase('hostel');?>">
                <?php $hostel = $this->db->get('hostel')->result_array();
                foreach ($hostel as $key => $hostel):?>
                <option value="hostel-<?php echo $hostel['hostel_id'];?>"><?php echo $hostel['name'];?></option>
                <?php endforeach;?>

                <optgroup label="<?php echo get_phrase('librarian');?>">
                <?php $librarian = $this->db->get('librarian')->result_array();
                foreach ($librarian as $key => $librarian):?>
                <option value="librarian-<?php echo $librarian['librarian_id'];?>"><?php echo $librarian['name'];?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="date"><?php echo get_phrase('Date');?></label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $award['date'];?>">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Update'); ?></button>
    </div>
<?php echo form_close();?>

<?php endforeach;?>