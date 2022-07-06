<div class="modal fade" id="ResultsNow">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title"> SRL Uganda |

                    <span class="text-danger">

                        Pre Test Results For the Course

                        <?php echo e($CourseName); ?>. Use the search engine to filter students

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
                            <th>Student</th>
                            <th>Parent Organization</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Course</th>
                            <th>Pre-Test Title</th>
                            <th>Description</th>
                            <th>Test Question</th>
                            <th>Student Answer</th>
                            <th class="bg-dark text-light">Non Percent Score </th>
                            <th class="bg-dark text-light">Date Attempted </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($Marked)): ?>
                            <?php $__currentLoopData = $Marked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <td><?php echo e($data->Name); ?></td>
                                    <td><?php echo e($data->ParentOrganization); ?></td>
                                    <td><?php echo e($data->Email); ?></td>
                                    <td><?php echo e($data->WorkTelephoneNumber); ?></td>
                                    <td><?php echo e($data->CourseName); ?></td>
                                    <td><?php echo e($data->PreTestTitle); ?></td>
                                    <td><?php echo e($data->BriefDescription); ?></td>
                                    <td> <a data-bs-dismiss="modal" data-bs-toggle="modal"
                                            class="btn btn-info shadow-lg btn-sm" href="#Qtn<?php echo e($data->SelectedExamID); ?>">



                                            View Qtn
                                        </a>


                                    </td>
                                    <td> <a data-bs-dismiss="modal" data-bs-toggle="modal"
                                            class="btn btn-danger shadow-lg btn-sm"
                                            href="#AnsNow<?php echo e($data->SelectedExamID); ?>">


                                            View Answer</a></td>

                                    <td>
                                        <?php echo e($data->Score); ?>


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



<?php /**PATH /var/www/html/srl.local/sys/MarkPretest/Results.blade.php ENDPATH**/ ?>