<?php echo view ("Admin/Adminsidebar.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-white">List Debit Note</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white">List Debit Note</li>
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
                <h3 class="card-title">List Debit Note</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>Sr.No</th>
                        <th>Action</th>
                        <th>Debit Note Date</th>
                        <th>Client Name</th>
                        <th>Po No.</th>
                        <th>Vendor Code</th>
                        <th>Total Amount</th>
                       
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($debitnote_data)) {  $i=1;?>
                        <?php foreach ($debitnote_data as $data): 
                          
                          $adminModel = new \App\Models\Adminmodel();
                          $wherecond1 = array('is_deleted' => 'N', 'id' => $data->po_no);
                          $po_data = $adminModel->get_single_data('tbl_po', $wherecond1);
                          ?>
                            <tr>
                            <td><?php echo $i; ?></td>

                                <td>
                                
                                <a href="edit_debitnote/<?=$data->id ; ?>"><i class="far fa-edit me-2"></i></a>
                                <a href="<?=base_url(); ?>delete_compan/<?php echo base64_encode($data->id); ?>/tbl_debitnote" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="far fa-trash-alt me-2"></i></a>
                            
                                <a href="debitnote/<?=$data->id ; ?>"><i class="far fa-eye me-2"></i></a>

                                </td>
                                
                                <td><?php echo $data->debitnote_date; ?></td>

                               
                                <td><?php echo $data->client_name; ?></td>
                                <td><?php if(!empty($po_data)){ echo $po_data->doc_no;}?></td>

                                <td><?php echo $data->suppplier_code; ?></td>
                              

                                <td><?php echo $data->totalamounttotal; ?></td>

                          

                                

                               

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
                    <th>Debit Note Date</th>
                    <th>Client Name</th>
                    <th>Po No.</th>
                    <th>Vendor Code</th>
                    <th>Total Amount</th>
                 
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
            console.log("Debit Note updated successfully");
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error("Error updating status:", error);
        }
    });
}
</script>