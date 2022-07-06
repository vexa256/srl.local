<?php if(isset($PreTests)): ?>
    <?php $__currentLoopData = $PreTests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="Marker<?php echo e($res->SelectedExamID); ?>">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header bg-gray">
                        <h5 class="modal-title"> SRL Uganda |

                            <span class="text-danger">

                                Mark Pre Test Answer Submitted by the Student

                                <?php echo e($res->Name); ?> . | The Course is <?php echo e($CourseName); ?>


                            </span>


                        </h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body ">

                        <form action="<?php echo e(route('MassUpdate')); ?>" class="row" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">



                                <input type="hidden" name="TableName" value="attempt_pre_tests">


                                <div class="mt-3  mb-3 col-md-12 ">
                                    <label id="label" for="" class=" required form-label">Enter the Score for
                                        this student

                                        (Follow the assessment rules)
                                    </label>

                                    <input type="text" required name="Score" class="form-control IntOnlyNow">

                                </div>



                                <div class="mt-3  mb-3 col-md-12 ">
                                    <label id="label" for="" class=" required form-label">Student Answer
                                    </label>

                                    <textarea class="editorme">

                                        <?php echo $res->StudentAnswer; ?>

                                    </textarea>
                                </div>

                                <input type="hidden" name="id" value="<?php echo e($data->SelectedExamID); ?>">


                                <input type="hidden" name="Marked" value="true">


                            </div>



                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-dark">Save
                            Changes</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/srl.local/sys/MarkPretest/ScorePreTest.blade.php ENDPATH**/ ?>