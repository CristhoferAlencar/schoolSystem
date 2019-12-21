<?php
$select_accountant = $this->db->get_where('accountant', array('accountant_id' => $param2))->result_array();
foreach($select_accountant as $key => $accountant):
?>

<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Update Accountant'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url() . 'admin/accountant/update/'. $accountant['accountant_id'] , array('enctype' => 'multipart/form-data'));?>
    <div class="modal-body">
        <div class="form-group">
            <label for="name"><?php echo get_phrase ('Name');?></label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $accountant['name'];?>">
        </div>
        <div class="form-group">
            <label for="dob"><?php echo get_phrase ('DOB');?></label>
            <input type="date" class="form-control" id="dob" name="birthday" value="<?php echo $accountant['birthday']; ?>">
        </div>
        <div class="form-group">
            <label for="phone"><?php echo get_phrase ('Sex');?></label>
            <select class="form-control select2" name="sex">
                <option value="Male"<?php if ($accountant['sex'] == 'Male') echo 'selected;' ?>><?php echo get_phrase('Male');?></option>
                <option value="Female"<?php if ($accountant['sex'] == 'Female') echo 'selected;' ?>><?php echo get_phrase('Female');?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="religion"><?php echo get_phrase ('Religion');?></label>
            <input type="text" class="form-control" id="religion" name="religion" value="<?php echo $accountant['religion']; ?>">
        </div>
        <div class="form-group">
            <label for="bloodGroup"><?php echo get_phrase ('Blood Group');?></label>
            <input type="text" class="form-control" id="bloodGroup" name="blood_group" value="<?php echo $accountant['blood_group']; ?>">
        </div>
        <div class="form-group">
            <label for="email"><?php echo get_phrase ('Email');?></label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $accountant['email']; ?>">
        </div>
        <div class="form-group">
            <label for="phone"><?php echo get_phrase ('Phone');?></label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $accountant['phone']; ?>">
        </div>
        <div class="form-group">
            <label for="qualification"><?php echo get_phrase ('Qualification');?></label>
            <input type="text" class="form-control" id="qualification" name="qualification" value="<?php echo $accountant['qualification']; ?>">
        </div>
        <div class="form-group">
            <label for="maritalStatus"><?php echo get_phrase ('Marital Status');?></label>
            <select class="form-control select2" name="marital_status" id="maritalStatus">
                <<option value="Married"<?php if ($accountant['marital_status'] == 'Married') echo 'selected;' ?>><?php echo get_phrase('Married');?></option>
                <option value="Single"<?php if ($accountant['marital_status'] == 'Single') echo 'selected;' ?>><?php echo get_phrase('Single');?></option>
                <option value="Other"<?php if ($accountant['marital_status'] == 'Other') echo 'selected;' ?>><?php echo get_phrase('Other');?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="address"><?php echo get_phrase ('Address');?></label>
            <textarea class="form-control" name="address" id="address"><?php echo $accountant['address'];?></textarea>
        </div>
        <div class="form-group">
            <label for="facebook"><?php echo get_phrase ('Facebook');?></label>
            <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo $accountant['facebook']; ?>">
        </div>
        <div class="form-group">
            <label for="facebook"><?php echo get_phrase ('Twitter');?></label>
            <input type="text" class="form-control" id="Twitter" name="twitter" value="<?php echo $accountant['twitter']; ?>">
        </div>
        <div class="form-group">
            <label for="googleplus"><?php echo get_phrase ('Googleplus');?></label>
            <input type="text" class="form-control" id="googleplus" name="googleplus" value="<?php echo $accountant['googleplus']; ?>">
        </div>
        <div class="form-group">
            <label for="linkedin"><?php echo get_phrase ('Linkedin');?></label>
            <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?php echo $accountant['linkedin']; ?>">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <!-- <button class="btn btn-outline-secondary" type="button" id="userFileZoom">Button</button> -->
                <a class="btn btn-outline-secondary image-popup-vertical-fit" href="<?php echo base_url() . 'uploads/accountant_image/' . $accountant['accountant_id'] . '.jpg'; ?>"><?php echo get_phrase('View'); ?></a>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="userFile" name="userfile" aria-describedby="userFileZoom">
                <label class="custom-file-label form-control" for="userFile"><?php echo get_phrase('Image');?></label>
            </div>
        </div>
        <!-- <div class="custom-file mt-3 mb-3">
            <input type="file" class="custom-file-input" id="userFile" name="userfile">
            <label class="custom-file-label form-control" for="userFile"><?php echo get_phrase('Image');?></label>
        </div> -->
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Update'); ?></button>
    </div>
<?php echo form_close();?>

<?php endforeach;?>