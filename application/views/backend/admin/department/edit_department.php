<?php
$department_id  = $this->db->get_where('department', array('department_code' => $param2))->row()->department_id;
$department     = $this->db->get_where('department', array('department_id' => $department_id))->result_array();
foreach ($department as $row):
$first_designation = $this->db->get_where('designation', array('department_id' => $department_id))->row();
?>

<div class="modal-header">
    <h4 class="modal-title"><?php echo get_phrase('Update Department'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php echo form_open(base_url() . 'department/department/update/' . $row['department_code'], array('enctype' => 'multipart/form-data')); ?>
    <div class="modal-body">
        <div class="form-group">
            <label for="departmentName"><?php echo get_phrase ('Department Name');?></label>
            <input type="text" class="form-control" id="departmentName" name="name" value="<?php echo $row['name'] ?>">
        </div>

        <div id="designation_edit">
            <div class="form-group">
                <label for="designation"><?php echo get_phrase ('Designation');?></label>
                <input type="text" class="form-control" id="designation" name="designation_<?php echo $first_designation->designation_id; ?>" value="<?php echo $first_designation->name; ?>">
            </div>

            <?php
            $query = $this->db->get_where('designation', array('department_id' => $department_id));
            if($query->num_rows() > 1) {
                $count          = 1;
                $designations   = $query->result_array();
                foreach($designations as $row2) {
                    if($count > 1) { ?>
                        <div class="row">
                            <div class="form-group col-6">
                                <input type="text" class="form-control" name="designation_<?php echo $row2['designation_id']; ?>" value="<?php echo $row2['name']; ?>">
                            </div>
                            <div class="form-group col-6">
                                <button type="button" class="btn btn-danger btn-circle btn-xs" onclick="deleteParentElement(this, <?php echo $row2['designation_id']; ?>)">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                    <?php }
                    $count ++;
                }
            } 
            ?>
        </div>
        <span id="designation_input_edit">
            <div class="row">
                <div class="form-group col-6">
                    <input type="text" class="form-control" name="designation[]"  value="" / placeholder= "designation here">
                </div>
                <div class="form-group col-6">
                    <button type="button" class="btn btn-danger btn-circle btn-xs" onclick="deleteParentElement(this)">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
        </span>
        <div class="form-group">
            <button type="button" class="btn waves-effect waves-light btn-rounded btn-info" onClick="add_designation()"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Add Designation'); ?></button>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo get_phrase('Update'); ?></button>
    </div>
<?php echo form_close();?>

<?php endforeach;?>

<script>
    
    $('#designation_input_edit').hide();
    
    // CREATING BLANK DESIGNATION INPUT
    var blank_designation = '';
    $(document).ready(function () {
        blank_designation = $('#designation_input_edit').html();
    });

    function add_designation()
    {
        $("#designation_edit").append(blank_designation);
    }

    // REMOVING DESIGNATION INPUT
    function deleteParentElement(n, designation_id) {
        $.ajax({
            url     : '<?php echo base_url(); ?>department/delete_designation/' + designation_id,
            success : function (response) {
                response = 'success';
            }
        });

        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }
</script>