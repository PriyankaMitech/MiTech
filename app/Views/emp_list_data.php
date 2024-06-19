<!-- Include pdf-lib library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.16.0/pdf-lib.min.js"></script>

<table>
    <thead>
        <tr>
            <th>Sr.No</th>
            <th>Print</th>
            <th>Name</th>
            <th>Mobile No.</th>
            <th>Email</th>
            <th>Technology</th>
            <th>Permanent Address</th>
            <th>Current Address</th>
            <th>Photo File</th>
            <th>Resume File</th>
            <th>PAN File</th>
            <th>Aadhar File</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($emp_data)) {
            $i = 1;
            foreach ($emp_data as $data) {
                $model = new \App\Models\AdminModel();
                $ids = $data->emp_department;
                $wherecond = array('id' => $ids);
                $departmentName = $model->getsinglerow('tbl_department', $wherecond);
                ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <!-- Print All Documents button for this employee -->
                        <button class="print-docs-btn btn" 
                                data-resume="<?= !empty($data->ResumeFile) ? base_url('public/uploads/resumes/' . $data->ResumeFile) : ''; ?>" 
                                data-pan="<?= !empty($data->PANFile) ? base_url('public/uploads/pan/' . $data->PANFile) : ''; ?>" 
                                data-aadhar="<?= !empty($data->AadharFile) ? base_url('public/uploads/aadhar/' . $data->AadharFile) : ''; ?>">
                            Print All Documents
                        </button>
                    </td>
                    <td><?= $data->emp_name; ?></td>
                    <td><?= $data->mobile_no; ?></td>
                    <td><?= $data->emp_email; ?></td>
                    <td><?php if (!empty($departmentName)) { echo $departmentName->DepartmentName; } ?></td>
                    <td><?= $data->permanent_address; ?></td>
                    <td><?= $data->current_address; ?></td>
                    <td>
                        <?php if (!empty($data->PhotoFile)): ?>
                            <a href="<?php echo base_url('public/uploads/photos/' . $data->PhotoFile); ?>" target="_blank" class="btn">View</a>
                        <?php else: ?>
                            No photo available
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($data->ResumeFile)): ?>
                            <a href="<?php echo base_url('public/uploads/resumes/' . $data->ResumeFile); ?>" target="_blank" class="btn">View</a>
                        <?php else: ?>
                            No resume available
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($data->PANFile)): ?>
                            <a href="<?php echo base_url('public/uploads/pan/' . $data->PANFile); ?>" target="_blank" class="btn">View</a>
                        <?php else: ?>
                            No PAN available
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($data->AadharFile)): ?>
                            <a href="<?php echo base_url('public/uploads/aadhar/' . $data->AadharFile); ?>" target="_blank" class="btn">View</a>
                        <?php else: ?>
                            No Aadhar available
                        <?php endif; ?>
                    </td>
                </tr>
                <?php
                $i++;
            }
        }
        ?>
    </tbody>
</table>
<script>
    // JavaScript for printing documents
    document.querySelectorAll('.print-docs-btn').forEach(button => {
        button.addEventListener('click', function() {
            // Get data attributes
            const resumeUrl = this.getAttribute('data-resume');
            const panUrl = this.getAttribute('data-pan');
            const aadharUrl = this.getAttribute('data-aadhar');

            // Function to merge PDFs and open in a new tab
            const mergeAndOpenPDFs = async (urls) => {
                const mergedPdf = await PDFLib.PDFDocument.create();

                for (const url of urls) {
                    if (url) {
                        const fetchedPdfBytes = await fetch(url).then(res => res.arrayBuffer());
                        const fetchedPdf = await PDFLib.PDFDocument.load(fetchedPdfBytes);
                        const copiedPages = await mergedPdf.copyPages(fetchedPdf, fetchedPdf.getPageIndices());
                        copiedPages.forEach((page) => {
                            mergedPdf.addPage(page);
                        });
                    }
                }

                // Open merged PDF in a new tab for printing
                const pdfBytes = await mergedPdf.save();
                const blob = new Blob([pdfBytes], { type: 'application/pdf' });
                const url = URL.createObjectURL(blob);
                window.open(url, '_blank');
            };

            // Array of PDF URLs
            const urls = [resumeUrl, panUrl, aadharUrl].filter(url => url);

            // Merge and open PDFs
            mergeAndOpenPDFs(urls);
        });
    });
</script>
