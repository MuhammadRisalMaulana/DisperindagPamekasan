

<?php $__env->startSection('title', 'Riwayat Aksi Admin'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Full width, rapi tanpa ruang polos kiri dan kanan -->
    <div class="w-full py-8 bg-gray-50 min-h-screen">
        <!-- Konten dengan padding horizontal agar tidak menempel ujung -->
        <div class="w-full px-6">
            <!-- Judul -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">
                    📊 Riwayat Aksi Admin & Petugas
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Semua aktivitas yang dilakukan oleh Admin dan Petugas tercatat di bawah ini.
                </p>
            </div>

            <!-- Tabel Aktivitas -->
            <div class="bg-white shadow-md rounded-lg border border-gray-200 w-full">
                <table class="w-full table-auto divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold">No</th>
                            <th class="px-6 py-3 text-left font-semibold">Pengguna</th>
                            <th class="px-6 py-3 text-left font-semibold">Status</th>
                            <th class="px-6 py-3 text-left font-semibold">Model</th>
                            <th class="px-6 py-3 text-left font-semibold">Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 font-medium text-gray-700">
                                    <?php echo e($loop->iteration + ($logs->currentPage() - 1) * $logs->perPage()); ?></td>
                                <td class="px-6 py-4 text-gray-800"><?php echo e(optional($log->user)->name ?? 'Tidak diketahui'); ?>

                                </td>
                                <td class="px-6 py-4 text-blue-600 font-semibold"><?php echo e($log->status); ?></td>
                                <td class="px-6 py-4 text-gray-700"><?php echo e($log->model ?? '-'); ?></td>
                                <td class="px-6 py-4 text-gray-500"><?php echo e($log->created_at->format('d-m-Y H:i:s')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="px-6 py-6 text-center text-gray-500">Belum ada log aktivitas.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>


            <!-- Paginasi -->
            <div class="mt-6">
                <?php echo e($logs->links('pagination::tailwind')); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DISPERINDAG_PROJECT-main\resources\views/pages/admin/log_aktivitas/index.blade.php ENDPATH**/ ?>