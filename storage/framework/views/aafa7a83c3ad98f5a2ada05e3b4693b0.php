<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Tdl/Notes</title>
</head>

<body>
    <h1>Hey.</h1>
    <h2>You can edit your tdl notes however you like!</h2>

    <div>
        <?php if($errors->any()): ?>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
    </div>

    <div class="flex">
        <form method="post" action="<?php echo e(route('tdl.update', ['tdl' => $tdl])); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
            <div>
                <label>Day</label>
                <input type="text" name="day" placeholder="Add DAY here ..." value="<?php echo e($tdl->day); ?>">
            </div>
            <div>
                <label>Goal</label>
                <input type="text" name="goal" placeholder="Add GOAL here ..." value="<?php echo e($tdl->goal); ?>">
            </div>
            <div>
                <label>Time</label>
                <input type="text" name="time" placeholder="Add TIME here ..." value="<?php echo e($tdl->time); ?>">
            </div>

            <div>
                <input type="submit" value="Confirm To-Do List!">
            </div>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\Users\ari putra\delapan\resources\views/Tdl/edit.blade.php ENDPATH**/ ?>