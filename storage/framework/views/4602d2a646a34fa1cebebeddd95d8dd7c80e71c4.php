<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert($icon = 'fa-info', $class = 'alert-primary', $Title = Auth::user()->name . ',  View your score board', $Msg = 'Track your performance. Use the print certificate  option to download your certificate  after you attempt all course tests and score a total of 80% and above'); ?>

</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Course</th>
                <th>Modular Exercises</th>
                <th>Practical Assessments</th>
                <th>Attendance</th>
                <th>Post Test</th>
                <th>Total Score</th>

                



            </tr>
        </thead>
        <tbody>

            <tr>

                <td><?php echo e($CourseName); ?></td>
                <td><?php echo e($ModulaScore); ?></td>
                <td><?php echo e($PracticalScore); ?></td>
                <td><?php echo e($Attendance); ?></td>
                <td><?php echo e($PostScore); ?></td>
                <td><?php echo e($TotalScore); ?>%</td>
                


            </tr>



        </tbody>
    </table>
</div>
<?php /**PATH /var/www/html/srl.local/sys/Scoreboard/Scoreboard.blade.php ENDPATH**/ ?>