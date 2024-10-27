<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List!</title>
</head>
<body>
    <h1>Hey there!</h1>
    <h2>You can view your own TDL in here! Throw some activity!</h2>

    <div>
        <?php if(session()->has('Confirmed')): ?>
            <div>
                <?php echo e(session('Confirmed')); ?>

            </div>
        <?php endif; ?>
    </div>

    <div>
        <div>
            <a href="<?php echo e(route('tdl.create')); ?>">Create New Tdl Here!</a>
        </div>
        <table border="5">
            <tr>
                <th>ID</th>
                <th>Day</th>
                <th>Goal</th>
                <th>Time</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php $__currentLoopData = $tdls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($tdl->id); ?></td>
                    <td><?php echo e($tdl->day); ?></td>
                    <td><?php echo e($tdl->goal); ?></td>
                    <td><?php echo e($tdl->time); ?></td>
                    <td>
                        <a href="<?php echo e(route('tdl.edit', ['tdl' => $tdl])); ?>">Change</a>
                    </td>
                    <td>
                        <form method="post" action="<?php echo e(route('tdl.destroy', ['tdl' => $tdl])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <input type="submit" value="Delete">
                        </form>
                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</body>
</html>
<?php /**PATH C:\Users\ari putra\tujuh\resources\views/Tdl/index.blade.php ENDPATH**/ ?>