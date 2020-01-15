<?php
$edit_application = $this->db->get_where('application', array('application_id' => $param2))->result_array();
foreach($edit_application as $key => $row):
?>

<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Edit Application'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url() . 'admin/application/update/' . $param2);?>
    <div class="modal-body">
        <div class="form-group">
            <label for="applicant_name"><?php echo get_phrase('Applicant Name');?></label>
            <input type="text" class="form-control" id="applicant_name" name="applicant_name" required value="<?php echo $row['applicant_name'];?>">
        </div>
        <div class="form-group">
            <label class="control-label"><?php echo get_phrase('Position');?></label>
            <select class="form-control custom-select" name="vacancy_id" required>
                <option value=""><?php echo get_phrase('select_a_position'); ?></option>
                <?php
                $vacancies = $this->db->get('vacancy')->result_array();
                foreach ($vacancies as $key => $row2)
                    if($row2['number_of_vacancies'] > 0) { ?>
                        <option value="<?php echo $row2['vacancy_id']; ?>" <?php if($row2['vacancy_id'] == $row['vacancy_id']) echo 'selected'; ?>>
                            <?php echo $row2['name']; ?>
                        </option>
                    <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="date"><?php echo get_phrase('Application Date');?></label>
            <input type="date" class="form-control" id="date" name="apply_date" value="<?php echo date('Y-m-d', $row['apply_date']); ?>">
        </div>
        <div class="form-group">
            <label class="control-label"><?php echo get_phrase('Status');?></label>
            <select class="form-control custom-select" name="status">
                <option value="applied" <?php if($row['status'] == 'applied') echo 'selected'; ?>>
                    <?php echo get_phrase('applied'); ?></option>
                <option value="on_review" <?php if($row['status'] == 'on_review') echo 'selected'; ?>>
                    <?php echo get_phrase('on_review'); ?></option>
                <option value="interviewed" <?php if($row['status'] == 'interviewed') echo 'selected'; ?>>
                    <?php echo get_phrase('interviewed'); ?></option>
                <option value="offered" <?php if($row['status'] == 'offered') echo 'selected'; ?>>
                    <?php echo get_phrase('offered'); ?></option>
                <option value="hired" <?php if($row['status'] == 'hired') echo 'selected'; ?>>
                    <?php echo get_phrase('hired'); ?></option>
                <option value="declined" <?php if($row['status'] == 'declined') echo 'selected'; ?>>
                    <?php echo get_phrase('declined'); ?></option>
            </select>
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Update'); ?></button>
    </div>
<?php echo form_close();?>

<?php endforeach;?>