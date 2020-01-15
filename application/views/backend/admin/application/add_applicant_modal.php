<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Add Application'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url() . 'admin/application/insert');?>
    <div class="modal-body">
        <div class="form-group">
            <label for="applicant_name"><?php echo get_phrase('Applicant Name');?></label>
            <input type="text" class="form-control" id="applicant_name" name="applicant_name" required>
        </div>
        <div class="form-group">
            <label class="control-label"><?php echo get_phrase('Position');?></label>
            <select class="form-control custom-select" name="vacancy_id" required>
                <option value=""><?php echo get_phrase('select_a_position'); ?></option>
                <?php
                $vacancies = $this->db->get('vacancy')->result_array();
                foreach ($vacancies as $row)
                    if($row['number_of_vacancies'] > 0) { ?>
                        <option value="<?php echo $row['vacancy_id']; ?>">
                            <?php echo $row['name']; ?>
                        </option>
                    <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="date"><?php echo get_phrase('Application Date');?></label>
            <input type="date" class="form-control" id="date" name="apply_date" value="<?php echo date('Y-d-m');?>">
        </div>
        <div class="form-group">
            <label class="control-label"><?php echo get_phrase('Status');?></label>
            <select class="form-control custom-select" name="status">
                <option value="applied"><?php echo get_phrase('applied'); ?></option>
                <option value="on review"><?php echo get_phrase('on_review'); ?></option>
                <option value="interviewed"><?php echo get_phrase('interviewed'); ?></option>
                <option value="offered"><?php echo get_phrase('offered'); ?></option>
                <option value="hired"><?php echo get_phrase('hired'); ?></option>
                <option value="declined"><?php echo get_phrase('declined'); ?></option>
            </select>
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Add Applicaton'); ?></button>
    </div>
<?php echo form_close();?>