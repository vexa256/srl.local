<div class="modal fade" id="GuideNow">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title"> SRL Uganda |

                    <span class="text-danger">

                        Marking Guidelines for the course

                        <?php echo e($CourseName); ?>


                    </span>


                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
                    <thead>
                        <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                            <th>Course Name</th>
                            <th>Marking Guide Title</th>
                            <th> View Guide </th>
                            <th>Date Created</th>

                            



                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($Guides)): ?>
                            <?php $__currentLoopData = $Guides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <td><?php echo e($data->CourseName); ?></td>
                                    <td><?php echo e($data->MarkingGuideTitle); ?></td>


                                    <td>
                                        <a data-doc="  <?php echo e($data->MarkingGuideTitle); ?> "
                                            data-source="<?php echo e(asset('assets/data/' . $data->url)); ?>" data-bs-toggle="modal"
                                            href="#PdfJS" class="btn btn-sm  PdfViewer btn-info"> <i
                                                class="fas fa-file-pdf" aria-hidden="true"></i>
                                        </a>
                                    </td>


                                    <td><?php echo date('F j, Y', strtotime($data->created_at)); ?></td>









                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>



                    </tbody>
                </table>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                
            </div>

        </div>
    </div>
</div>


<?php echo $__env->make('pdf.PDFJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/srl.local/sys/MarkPretest/Guide.blade.php ENDPATH**/ ?>