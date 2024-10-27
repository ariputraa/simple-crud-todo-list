<div class="card">
    <div class="card-header pb-0 border 0">
        <div class="card-body">
            <form action="<?php echo e(route('tdl.index')); ?>" method="get">
                <input name="search" placeholder="Search sumtings here ..." class="form-control w-100" type="text">

                <div>
                    <label for="status" class="block text-gray-700 text-sm">Status Filter</label>
                    <select name="status" id="status"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                        <option value="">ALL</option>
                        <option value="Not Started Yet" <?php echo e(request('status') == 'Not Started Yet' ? 'selected' : ''); ?>>Not Started Yet</option>
                        <option value="On Progress" <?php echo e(request('status') == 'On Progress' ? 'selected' : ''); ?>>On Progress</option>
                        <option value="Completed" <?php echo e(request('status') == 'Completed' ? 'selected' : ''); ?>>Completed</option>
                    </select>
                </div>

                <button class="btn btn-info mt-2 col-md-12">Apply Now.</button>

                
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\ari putra\sembilan\resources\views/layouts/search.blade.php ENDPATH**/ ?>