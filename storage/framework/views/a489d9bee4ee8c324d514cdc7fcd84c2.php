<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">
    <title>To-Do List!</title>
</head>

<body>
    <div>
        <?php if(session()->has('Confirmed')): ?>
            <div>
                <?php echo e(session('Confirmed')); ?>

            </div>
        <?php endif; ?>
    </div>

    <?php echo $__env->make('layouts.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div>
        <a href="<?php echo e(route('tdl.create')); ?>">
            <button class="btn btn-dark mt-2">Create New Tdl Here!</button>
        </a>
    </div>
    <div class="container">
        <div class="row">
            <div class="md">
                <table id="Table">
                    <thead>
                        <div class="">
                            <tr>
                                <th>ID</th>
                                <th>Day</th>
                                <th>Goal</th>
                                <th>Time(Minutes)</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </div>
                    <tbody>
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
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
    
</body>

</html>
<?php /**PATH C:\Users\ari putra\delapan\resources\views/Tdl/index.blade.php ENDPATH**/ ?>