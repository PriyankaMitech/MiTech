<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white">List PO</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">List PO</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List PO</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>Sr.No</th>
                        <th>Action</th>
                        <th>Client Name </th>
                        <th>Select Type</th>
                        <th>DOC NO.</th>
                        <th>DOC Date</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Type Of Payment Terms</th>
                       
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($po_data)) {  $i=1;?>
                        <?php foreach ($po_data as $data): ?>
                            <tr>
                            <td><?php echo $i; ?></td>

                                <td>
                                
                                <a href="edit_po/<?=$data->id ; ?>"><i class="far fa-edit me-2"></i></a>
                                <a href="<?=base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_po" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                            
                                <?php if($data->po_file != ''){ ?>
                                  <a href="<?=base_url(); ?>public/uploades/PDF/<?=$data->po_file ; ?>"><i class="far fa-eye me-2"></i></a>
                                  <?php } ?>
                                </td>
                                
                                <td><?php echo $data->client_name; ?></td>

                               
                                <td><?php echo $data->select_type; ?></td>
                                <td><?php echo $data->doc_no; ?></td>

                                <td><?php echo $data->doc_date; ?></td>
                              

                                <td><?php echo $data->start_date; ?></td>
                                <td><?php echo $data->end_date; ?></td>

                                <td><?php echo $data->paymentTerms; ?></td>
                                <!-- Add other table cells as needed -->
                            </tr>
                        <?php $i++; endforeach; ?>
                        <?php 
                        } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                        <th>Sr.No</th>
                        <th>Action</th>
                        <th>Client Name </th>
                        <th>Select Type</th>
                        <th>DOC NO.</th>
                        <th>DOC Date</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Type Of Payment Terms</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
</div>



 


   
<?php echo view("Admin/Adminfooter.php"); ?>


<script>
function updatestatus(selectElement, id) {
    var selectedValue = selectElement.value;
    var id = id;

    // Make AJAX request
    $.ajax({
        type: "POST",
        url: "<?=base_url(); ?>update_status", // URL to your server-side script
        data: {
            id: id,
            selectedValue: selectedValue
        },
        success: function(response) {
            // Handle success response
            console.log("PO updated successfully");
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error("Error updating status:", error);
        }
    });
}
</script>