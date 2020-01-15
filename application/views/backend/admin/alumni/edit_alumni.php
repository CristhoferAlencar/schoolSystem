<?php
$edit_alumni = $this->db->get_where('alumni' , array('alumni_id' => $param2))->result_array();
foreach ($edit_alumni as $key => $row):
?>

<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Update Alumni'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url() . 'admin/alumni/update/'.$row['alumni_id'] , array('target'=>'_top', 'enctype' => 'multipart/form-data'));?>
    <div class="modal-body">
        <div class="form-group">
            <label for="name"><?php echo get_phrase('Name');?></label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'];?>">
        </div>
        <div class="form-group">
            <label for="phone"><?php echo get_phrase('Sex');?></label>
            <select class="form-control select2" name="sex">
                <option value="male"><?php echo get_phrase('Male');?></option>
                <option value="female"><?php echo get_phrase('Female');?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="phone"><?php echo get_phrase ('Phone');?></label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone'];?>">
        </div>
        <div class="form-group">
            <label for="email"><?php echo get_phrase ('Email');?></label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'];?>">
        </div>
        <div class="form-group">
            <label for="address"><?php echo get_phrase ('Address');?></label>
            <textarea class="form-control" name="address" id="address"><?php echo $row['address'];?></textarea>
        </div>
        <div class="form-group">
            <label for="profession"><?php echo get_phrase ('Profession');?></label>
            <input type="text" class="form-control" id="profession" name="profession" value="<?php echo $row['profession'];?>">
        </div>
        <div class="form-group">
            <label for="maritalStatus"><?php echo get_phrase ('Marital Status');?></label>
            <select class="form-control select2" name="marital_status" id="maritalStatus">
                <option value="Married"<?php if ($row['marital_status'] == 'Married') echo 'selected;' ?>><?php echo get_phrase('Married');?></option>
                <option value="Single"<?php if ($row['marital_status'] == 'Single') echo 'selected;' ?>><?php echo get_phrase('Single');?></option>
                <option value="Other"<?php if ($row['marital_status'] == 'Other') echo 'selected;' ?>><?php echo get_phrase('Other');?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="graduationDate"><?php echo get_phrase ('Graduation Date');?></label>
            <input type="date" class="form-control" id="graduationDate" name="g_year" value="<?php echo $row['g_year']; ?>">
        </div>
        <div class="form-group">
            <label for="schoolClub"><?php echo get_phrase ('School Club');?></label>
            <input type="text" class="form-control" id="schoolClub" name="club" value="<?php echo $row ['club']; ?>">
        </div>
        <div class="form-group">
            <label for="interest"><?php echo get_phrase ('Interests');?></label>
            <input type="text" class="form-control" id="interest" name="interest" value="<?php echo $row ['interest']; ?>">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <a class="btn btn-outline-secondary image-popup-vertical-fit" href="<?php echo base_url() . 'uploads/alumni_image/' . $row['alumni_id'] . '.jpg'; ?>"><?php echo get_phrase('View'); ?></a>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="userFile" name="userfile" aria-describedby="userFileZoom">
                <label class="custom-file-label form-control" for="userFile"><?php echo get_phrase('Image');?></label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Update'); ?></button>
    </div>
<?php echo form_close();?>

<?php endforeach;?>