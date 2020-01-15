<?php
$edit_teacher		=	$this->db->get_where('teacher' , array('teacher_id' => $param2) )->result_array();
foreach($edit_teacher as $key => $row):
?>

<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Update Teacher'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url() . 'admin/teacher/update/'. $row['teacher_id'] , array('enctype' => 'multipart/form-data'));?>
    <div class="modal-body">
        <div class="form-group">
            <label for="name"><?php echo get_phrase ('Name');?></label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'];?>" required>
        </div>
        <div class="form-group">
            <label for="phone"><?php echo get_phrase ('Role');?></label>
            <select class="form-control select2" name="role" required>
                <option value="1" <?php if($row['role'] == '1')echo 'selected';?>><?php echo get_phrase('class_teacher');?></option>
                <option value="2" <?php if($row['role'] == '2')echo 'selected';?>><?php echo get_phrase('subject_teacher');?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="birthday"><?php echo get_phrase ('Birthday');?></label>
            <input type="text" class="form-control" id="birthday" name="birthday" value="<?php echo $row['birthday'];?>">
        </div>
        <div class="form-group">
            <label for="phone"><?php echo get_phrase ('Gender');?></label>
            <select class="form-control select2" name="sex">
                <option value="male" <?php if($row['sex'] == 'male')echo 'selected';?>><?php echo get_phrase('male');?></option>
                <option value="female" <?php if($row['sex'] == 'female')echo 'selected';?>><?php echo get_phrase('female');?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="religion"><?php echo get_phrase ('Religion');?></label>
            <input type="text" class="form-control" id="religion" name="religion" value="<?php echo $row['religion']; ?>">
        </div>
        <div class="form-group">
            <label for="address"><?php echo get_phrase ('Address');?></label>
            <textarea class="form-control" name="address" id="address"><?php echo $row['address'];?></textarea>
        </div>
        <div class="form-group">
            <label for="bloodGroup"><?php echo get_phrase ('Blood Group');?></label>
            <input type="text" class="form-control" id="bloodGroup" name="blood_group" value="<?php echo $row['blood_group']; ?>">
        </div>
        <div class="form-group">
            <label for="qualification"><?php echo get_phrase ('Qualification');?></label>
            <input type="text" class="form-control" id="qualification" name="qualification" value="<?php echo $row['qualification']; ?>">
        </div>
        <div class="form-group">
            <label for="maritalStatus"><?php echo get_phrase ('Marital Status');?></label>
            <select class="form-control select2" name="marital_status" id="maritalStatus">
                <option value="Married" <?php if($row['marital_status'] == 'Married')echo 'selected';?>><?php echo get_phrase('Married');?></option>
                <option value="Single" <?php if($row['marital_status'] == 'Single')echo 'selected';?>><?php echo get_phrase('Single');?></option>
                <option value="Divorced" <?php if($row['marital_status'] == 'Divorced')echo 'selected';?>><?php echo get_phrase('Divorced');?></option>
                <option value="Engaged" <?php if($row['marital_status'] == 'Engaged')echo 'selected';?>><?php echo get_phrase('Engaged');?></option>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <!-- <button class="btn btn-outline-secondary" type="button" id="userFileZoom">Button</button> -->
                <a class="btn btn-outline-secondary image-popup-vertical-fit" href="<?php echo base_url() . 'uploads/teaccher_image/' . $row['teacher_id'] . '.jpg'; ?>"><?php echo get_phrase('View'); ?></a>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="userFile" name="userfile" aria-describedby="userFileZoom">
                <label class="custom-file-label form-control" for="userFile"><?php echo get_phrase('Browse Image');?></label>
            </div>
        </div>
        <div class="row" style="margin-bottom: -60px;">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo get_phrase('Account Information');?></h4>
                        <div class="form-group">
                            <label for="email"><?php echo get_phrase ('Email');?></label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="phone"><?php echo get_phrase ('Phone');?></label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="linkedin"><?php echo get_phrase ('Linkedin');?></label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?php echo $row['linkedin']; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
        <div class="row" style="margin-bottom: -60px;">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo get_phrase('Social information');?></h4>
                        <div class="form-group">
                            <label for="facebook"><?php echo get_phrase ('Facebook');?></label>
                            <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo $row['facebook']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="facebook"><?php echo get_phrase ('Twitter');?></label>
                            <input type="text" class="form-control" id="Twitter" name="twitter" value="<?php echo $row['twitter']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="googleplus"><?php echo get_phrase ('Googleplus');?></label>
                            <input type="text" class="form-control" id="googleplus" name="googleplus" value="<?php echo $row['googleplus']; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Update'); ?></button>
    </div>
<?php echo form_close();?>

<?php endforeach;?>