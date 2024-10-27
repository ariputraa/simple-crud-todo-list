<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>To-Do List!</title>
</head>

<body>



    


    <div class="card">
        <div class="card-header pb-0 border 0">
            <div class="card-body">

                <div class="container">
                    <div class="row">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="table-info">
                                        <th scope="col row">ID</th>
                                        <th scope="col row">Day</th>
                                        <th scope="col row">Goal</th>
                                        <th scope="col row">Time(Minutes)</th>
                                        <th scope="col row">Status</th>

                                    </tr>
                                <tbody>
                                    <?php $__currentLoopData = $tdls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($tdl->id); ?></td>
                                            <td><?php echo e($tdl->day); ?></td>
                                            <td><?php echo e($tdl->goal); ?></td>
                                            <td><?php echo e($tdl->time); ?></td>
                                            <td>
                                                <?php
                                                    $statusClasses = [
                                                        'Not Started Yet' => 'bg-danger',
                                                        'On Progress' => 'bg-warning',
                                                        'Completed' => 'bg-success',
                                                        // Nih kita siapin array untuk status badge
                                                    ];
                                                    $statusClass = $statusClasses[$tdl->status] ?? 'bg-secondary'; // Pilih class sesuai status, kalo gak ada ya default abu-abu
                                                ?>
                                                <span class=" mt-2 badge <?php echo e($statusClass); ?>"
                                                    style="font-size: 17px"><?php echo e($tdl->status); ?></span>
                                            </td>

                                            
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>

</body>

</html>
<?php /**PATH C:\Users\ari putra\sembilan\resources\views/fileoverview.blade.php ENDPATH**/ ?>