<?php
$select_club = $this->db->get_where('club', array('club_id' => $param2))->result_array();
foreach ($select_club as $key => $club):
?>

<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Edit Club'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url() . 'admin/club/update/' . $club['club_id']);?>
    <div class="modal-body">
            <div class="form-group">
                <label for="clubName" class="control-label"><?php echo get_phrase('Club Name'); ?></label>
                <input type="text" class="form-control" id="clubName" name="club_name" value="<?php echo $club['club_name'];?>">
            </div>
            <div class="form-group">
                <label for="description" class="control-label"><?php echo get_phrase('Description'); ?></label>
                <textarea rows="3" class="form-control" id="description" name="desc"><?php echo $club['description'];?></textarea>
            </div>
            <div class="form-group">
                <label for="date" class="control-label"><?php echo get_phrase('Date'); ?></label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo $club['date'];?>">
            </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Update'); ?></button>
    </div>
<?php echo form_close();?>

<?php endforeach;?>