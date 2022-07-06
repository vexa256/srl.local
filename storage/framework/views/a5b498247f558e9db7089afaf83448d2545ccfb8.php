<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert($icon = 'fa-info', $class = 'alert-primary', $Title = 'Manage all UnMarked Pre Test Assessments', $Msg = null); ?>

</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo e(HeaderBtn($Toggle = 'GuideNow', $Class = 'btn-danger', $Label = 'Marking Guides', $Icon = 'fa-info')); ?>



    <?php echo e(HeaderBtn($Toggle = 'ResultsNow', $Class = 'btn-danger', $Label = 'Course Results Database', $Icon = 'fa-check')); ?>



    <table class="  table table-rounded table-bordered  border gy-3 gs-3">
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
                <th class="bg-dark text-light"> Mark </th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($PreTests)): ?>
                <?php $__currentLoopData = $PreTests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                        <td><?php echo e($data->Name); ?></td>
                        <td><?php echo e($data->ParentOrganization); ?></td>
                        <td><?php echo e($data->Email); ?></td>
                        <td><?php echo e($data->WorkTelephoneNumber); ?></td>
                        <td><?php echo e($data->CourseName); ?></td>
                        <td><?php echo e($data->PreTestTitle); ?></td>
                        <td><?php echo e($data->BriefDescription); ?></td>
                        <td> <a data-bs-toggle="modal" class="btn btn-info shadow-lg btn-sm"
                                href="#Qtn<?php echo e($data->SelectedExamID); ?>">



                                View
                            </a>


                        </td>
                        <td> <a data-bs-toggle="modal" class="btn btn-danger shadow-lg btn-sm"
                                href="#AnsNow<?php echo e($data->SelectedExamID); ?>">


                                View </a></td>

                        <td>
                            <a data-bs-toggle="modal" class="btn btn-dark btn-sm shadow-lg "
                                href="#Marker<?php echo e($data->SelectedExamID); ?>">


                                Mark
                            </a>

                        </td>







                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>



        </tbody>
    </table>
</div>
<?php if(isset($Marked)): ?>
    <?php $__currentLoopData = $Marked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="Qtn<?php echo e($mark->SelectedExamID); ?>">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header bg-gray">
                        <h5 class="modal-title"> SRL Uganda |

                            <span class="text-danger">

                                View Post Test Question Attempted by the Student

                                <?php echo e($mark->Name); ?> . | The Course is <?php echo e($CourseName); ?>


                            </span>


                        </h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon  btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body ">

                        <form action="#" class="row" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">

                                <input type="hidden" name="id" value="<?php echo e($mark->SelectedExamID); ?>">

                                <div class="col-12">
                                    <textarea class="editorme">

                                        <?php echo $mark->PreTestQuestion; ?>

                                    </textarea>
                                </div>


                            </div>



                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                        

                        </form>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>



<?php if(isset($PreTests)): ?>
    <?php $__currentLoopData = $PreTests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="Qtn<?php echo e($post->SelectedExamID); ?>">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header bg-gray">
                        <h5 class="modal-title"> SRL Uganda |

                            <span class="text-danger">

                                View Post Test Question Attempted by the Student

                                <?php echo e($post->Name); ?> . | The Course is <?php echo e($CourseName); ?>


                            </span>


                        </h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon  btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body ">

                        <form action="#" class="row" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">

                                <input type="hidden" name="id" value="<?php echo e($post->SelectedExamID); ?>">

                                <div class="col-12">
                                    <textarea class="editorme">

                                        <?php echo $post->PreTestQuestion; ?>

                                    </textarea>
                                </div>


                            </div>



                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                        

                        </form>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>



<?php echo $__env->make('MarkPretest.PreTestAns', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('MarkPretest.ScorePreTest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('MarkPretest.Guide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('MarkPretest.Results', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/srl.local/sys/MarkPretest/MarkPreTest.blade.php ENDPATH**/ ?>