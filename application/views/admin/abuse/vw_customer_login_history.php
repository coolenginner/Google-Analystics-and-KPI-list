<?php $this->load->view('admin/includes/head'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_basic.js"></script>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Customer Login History</h5>
    </div>
    <?php
    $user_data = $this->session->userdata('shoppalatt_admin');
    $admin_id = isset($user_data['user_id']) ? $user_data['user_id'] : 0;
    $user_data_shop = $this->session->userdata('shoppalatt_shop');
    $shop_id = isset($user_data_shop['shop_id']) ? $user_data_shop['shop_id'] : 0;
    $admin_uri = $this->uri->segment(1);
    ?>

    <!-- <div class=" ">-->
    <table class="table" id="table">
        <thead>
            <tr>
                <th data-type="numeric">Sr#</th>
                <th>Full Name</th>
                <th  data-orderable="false">Device Type</th>
                <th  data-orderable="false">Latitude</th>
                <th  data-orderable="false">Longitude</th>
                <th>Date Time</th>
            </tr>
        </thead>
        <tbody>


        </tbody>
    </table>


</div>

<?php $this->load->view('admin/includes/footer'); ?>
<script type="text/javascript">

    var table;

    $(document).ready(function () {

        //datatables
        table = $('#table').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "pageLength": 25,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('admin/customer/ajax_list/' . $customerid) ?>",
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],
            /* "columns": [
             null,
             null,
             null,
             null, {
             mRender: function (data, type, row) {
             return '<a class="table-edit" data-id="' + row[0] + '">EDIT</a>'
             }
             }, {
             mRender: function (data, type, row) {
             return '<a class="table-delete" data-id="' + row[0] + '">DELETE</a>'
             }
             },
             ],*/
        });
        $('.dataTables_filter input[type=search]').attr('placeholder', 'Type to filter...');
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            width: 'auto'
        });

    });

</script>