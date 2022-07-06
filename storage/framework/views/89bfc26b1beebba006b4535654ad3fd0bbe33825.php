<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert($icon = 'fa-info', $class = 'alert-primary', $Title = 'Explore Available Courses', $Msg = null); ?>

</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    
    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Course Name</th>
                <th>Course Code</th>
                <th>CEUs</th>
                
                <th>Date Added</th>
                <th>Description</th>
                <th>View Notes and Modules</th>
                



            </tr>
        </thead>
        <tbody>
            <?php if(isset($Courses)): ?>
                <?php $__currentLoopData = $Courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                        <td><?php echo e($data->CourseName); ?></td>
                        <td><?php echo e($data->CourseCode); ?></td>
                        <td><?php echo e($data->CEU); ?></td>


                        
                        <td><?php echo date('F j, Y', strtotime($data->created_at)); ?></td>


                        <td>
                            <a data-bs-toggle="modal" class="btn btn-dark shadow-lg btn-sm"
                                href="#Desc<?php echo e($data->id); ?>">

                                <i class="fas fa-binoculars" aria-hidden="true"></i>
                            </a>

                        </td>



                        <td>
                            <a class="btn btn-danger shadow-lg btn-sm"
                                href="<?php echo e(route('ViewModules', ['id' => $data->id])); ?>">

                                <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>

                        </td>


                        





                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>



        </tbody>
    </table>
</div>



<?php if(isset($Courses)): ?>
    <?php echo $__env->make('viewer.viewer', [
        'PassedData' => $Courses,
        'Title' => 'View the Description of the selected course',
        'DescriptionTableColumn' => 'CourseDescription',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>



<?php /**PATH /var/www/html/srl.local/sys/instructors/InstructorViewCourses.blade.php ENDPATH**/ ?>