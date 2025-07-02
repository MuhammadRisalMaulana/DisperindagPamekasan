<?php $__env->startSection('title'); ?>
    MADUKONCER | Data Petugas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Data Petugas
            </h2>

            <div class="my-4 mb-6">
                <a href="<?php echo e(route('petugas.create')); ?> "
                    class="px-5 py-3  font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                    Tambah Petugas
                </a>
            </div>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?> </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Alamat</th>
                                <th class="px-4 py-3">No. Hp</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Role</th>
                                <td class="flex items-center gap-2 px-4 py-3">
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $petugas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo e($petugas->name); ?>

                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo e($petugas->alamat); ?>

                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo e($petugas->phone); ?>

                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo e($petugas->email); ?>

                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo e($petugas->roles); ?>

                                    </td>
                                    <td class="flex items-center px-4 py-3 space-x-2">
                                        <!-- Edit -->
                                        <a href="<?php echo e(route('petugas.edit', $petugas->id)); ?>"
                                            class="p-2 text-blue-600 rounded hover:bg-blue-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="none" viewBox="0 0 24 24">
                                                <path d="M17 3C17 3 19 5 21 7C21 7 20 8 19 9L15 5C16 4 17 3 17 3Z"
                                                    stroke="#3b82f6" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M15 5L5 15V19H9L19 9" stroke="#3b82f6" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>

                                        <!-- Delete -->
                                        <?php if(!($petugas->roles === 'ADMIN' && $jumlahAdmin <= 1) && !($petugas->roles === 'PETUGAS' && $jumlahPetugas <= 1)): ?>
                                            <form action="<?php echo e(route('petugas.destroy', $petugas->id)); ?>" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus petugas ini?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="p-2 text-red-600 rounded hover:bg-red-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path d="M4 7H20" stroke="#dc2626" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M10 11V17" stroke="#dc2626" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M14 11V17" stroke="#dc2626" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path
                                                            d="M5 7V19C5 20.105 5.895 21 7 21H17C18.105 21 19 20.105 19 19V7"
                                                            stroke="#dc2626" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M10 4H14" stroke="#dc2626" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </td>


                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="text-center text-gray-400">
                                        Data Kosong
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DISPERINDAG_PROJECT-main\resources\views/pages/admin/petugas/index.blade.php ENDPATH**/ ?>