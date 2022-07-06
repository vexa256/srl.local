<?php if(isset($PreTests)): ?>
    <?php $__currentLoopData = $PreTests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="AnsNow<?php echo e($res->SelectedExamID); ?>">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header bg-gray">
                        <h5 class="modal-title"> SRL Uganda |

                            <span class="text-danger">

                                View Pre Test Answer Submitted by the Student

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

                        <form action="#" class="row" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">

                                <input type="hidden" name="id" value="<?php echo e($res->SelectedExamID); ?>">

                                <div class="col-12">
                                    <textarea class="editorme">

                                        <?php echo $res->StudentAnswer; ?>

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

<?php if(isset($Marked)): ?>
    <?php $__currentLoopData = $Marked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="AnsNow<?php echo e($data2->SelectedExamID); ?>">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header bg-gray">
                        <h5 class="modal-title"> SRL Uganda |

                            <span class="text-danger">

                                View Post Test Answer Submitted by the Student

                                <?php echo e($data2->Name); ?> . | The Course is <?php echo e($CourseName); ?>


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

                        <form action="#" class="row" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">

                                <input type="hidden" name="id" value="<?php echo e($data2->SelectedExamID); ?>">

                                <div class="col-12">
                                    <textarea class="editorme">

                                        <?php echo $data2->StudentAnswer; ?>

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
<?php /**PATH /var/www/html/srl.local/sys/MarkPretest/PreTestAns.blade.php ENDPATH**/ ?>