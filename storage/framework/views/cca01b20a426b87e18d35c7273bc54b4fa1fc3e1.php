

<?php $__env->startSection('title', 'Log Aktivitas'); ?>

<?php $__env->startSection('content'); ?>
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 py-6 mx-auto">
            <h2 class="mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Log Aktivitas
            </h2>

            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div
                        class="bg-gray-50 p-4 rounded-md shadow-md border border-gray-200 transform transition hover:shadow-lg hover:bg-gray-100">

                        <h3 class="text-lg font-semibold text-gray-800">
                            <?php echo e(optional($log->user)->name ?? 'Pengguna tidak ditemukan'); ?>

                        </h3>

                        <p class="text-gray-500 mt-1">
                            <?php echo e($log->status); ?>

                        </p>

                        <span class="text-gray-400 mt-2 block text-sm">
                            <?php echo e($log->created_at->format('d F Y, H:i')); ?>

                        </span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full bg-gray-50 p-4 rounded-md shadow-md border border-gray-200">
                        <p class="text-gray-500">Belum ada riwayat aktivitas.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                <?php echo e($logs->links('pagination::tailwind_next_back')); ?>

            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DISPERINDAG_PROJECT-main\resources\views/pages/admin/log_aktivitas/index.blade.php ENDPATH**/ ?>