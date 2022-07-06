<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert($icon = 'fa-info', $class = 'alert-primary', $Title = 'Let\'s manage our course inventory.', $Msg = null); ?>

</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo e(HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Course', $Icon = 'fa-plus')); ?>

    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Course Name</th>
                <th>Course Code</th>
                <th>CEUs</th>
                <th>Thumbnail</th>
                <th>Date Added</th>
                <th>Description</th>
                <th class="bg-dark text-light"> Update </th>
                <th class="bg-danger fw-bolder text-light"> Delete </th>



            </tr>
        </thead>
        <tbody>
            <?php if(isset($Courses)): ?>
                <?php $__currentLoopData = $Courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                        <td><?php echo e($data->CourseName); ?></td>
                        <td><?php echo e($data->CourseCode); ?></td>
                        <td><?php echo e($data->CEU); ?></td>


                        <td>
                            <a class="btn btn-danger btn-sm shadow-lg" data-fslightbox="gallery"
                                href="<?php echo e(asset('assets/data/' . $data->Thumbnail)); ?>">
                                <i class="fas fa-binoculars" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td><?php echo date('F j, Y', strtotime($data->created_at)); ?></td>


                        <td>
                            <a data-bs-toggle="modal" class="btn btn-dark shadow-lg btn-sm" href="#Desc<?php echo e($data->id); ?>">

                                <i class="fas fa-binoculars" aria-hidden="true"></i>
                            </a>

                        </td>


                        <td>

                            <a data-bs-toggle="modal" class="btn shadow-lg btn-danger btn-sm admin"
                                href="#Update<?php echo e($data->id); ?>">

                                <i class="fas fa-edit" aria-hidden="true"></i>
                            </a>

                        </td>


                        <td>

                            <?php echo ConfirmBtn(
    $data = [
        'msg' => 'You want to delete this record',
        'route' => route('DeleteData', ['id' => $data->id, 'TableName' => 'courses']),
        'label' => '<i class="fas fa-trash"></i>',
        'class' => 'btn btn-danger btn-sm deleteConfirm admin',
    ],
); ?>


                        </td>





                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>



        </tbody>
    </table>
</div>
<!--end::Card body-->
<?php echo $__env->make('courses.NewCourse', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php if(isset($Courses)): ?>
    <?php echo $__env->make('viewer.viewer', [
        'PassedData' => $Courses,
        'Title' => 'View the Description of the selected course',
        'DescriptionTableColumn' => 'CourseDescription',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>


<?php if(isset($Courses)): ?>
    <?php $__currentLoopData = $Courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e(UpdateModalHeader($Title = 'Update the selected  record', $ModalID = $data->id)); ?>

        <form action="<?php echo e(route('MassUpdate')); ?>" class="" method="POST">
            <?php echo csrf_field(); ?>

            <div class="row">

                <input type="hidden" name="id" value="<?php echo e($data->id); ?>">

                <input type="hidden" name="TableName" value="courses">

                <?php echo e(RunUpdateModalFinal($ModalID = $data->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $data->id, $col = '12', $te = '12', $TableName = 'courses')); ?>

            </div>


            <?php echo e(UpdateModalFooter()); ?>


        </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/srl.local/sys/courses/MgtCourses.blade.php ENDPATH**/ ?>