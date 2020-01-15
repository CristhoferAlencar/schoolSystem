<?php
$select_vacancy = $this->db->get_where('vacancy', array('vacancy_id' => $param2))->result_array();
foreach ($select_vacancy as $key => $vacancy):
?>

<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Edit Vacancy'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url() . 'admin/vacancy/update/' . $vacancy['vacancy_id']);?>
    <div class="modal-body">
        <div class="form-group">
            <label for="position_name"><?php echo get_phrase('Position Name');?></label>
            <input type="text" class="form-control" id="position_name" name="name" required value="<?php echo $vacancy['name'];?>">
        </div>
        <div class="form-group">
            <label for="number_of_vacancies"><?php echo get_phrase('Number of Vacancies');?></label>
            <input type="number" class="form-control" id="number_of_vacancies" name="number_of_vacancies" min="0" required value="<?php echo $vacancy['number_of_vacancies'];?>">
        </div>
        <div class="form-group">
            <label for="date"><?php echo get_phrase('Last Date of Application');?></label>
            <input type="date" class="form-control" id="date" name="last_date" value="<?php echo $vacancy['last_date'];?>">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Update'); ?></button>
    </div>
<?php echo form_close();?>

<?php endforeach;?>