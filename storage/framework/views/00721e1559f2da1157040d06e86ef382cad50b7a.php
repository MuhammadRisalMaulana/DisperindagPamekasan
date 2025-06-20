<?php $__env->startSection('title'); ?>
    MADUKONCER | Data Pengaduan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Data Pengaduan
            </h2>
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
                    <div class="flex justify-between mb-4">
                        <form method="GET" action="<?php echo e(route('pengaduans.index')); ?>" class="flex space-x-4">
                            <input type="text" name="name" placeholder="Cari Nama" value="<?php echo e(request('name')); ?>"
                                class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" />

                            <input type="date" name="date" value="<?php echo e(request('date')); ?>"
                                class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" />

                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                                Cari
                            </button>
                        </form>
                    </div>
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Bukti Foto</th>
                                <th class="px-4 py-3">Pelapor</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="text-gray-700 dark:text-gray-400 ">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->
                                            <div class="relative hidden mr-3  md:block">
                                                <img class=" h-32 w-35 " src="<?php echo e(Storage::url($item->image)); ?>"
                                                    alt="" loading="lazy" />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo e($item->name); ?>

                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo e($item->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY - HH:mm:ss')); ?>

                                    </td>
                                    <?php if($item->status == 'Belum di Proses'): ?>
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                                                <?php echo e($item->status); ?>

                                            </span>
                                        </td>
                                    <?php elseif($item->status == 'Sedang di Proses'): ?>
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                                                <?php echo e($item->status); ?>

                                            </span>
                                        </td>
                                    <?php else: ?>
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                                                <?php echo e($item->status); ?>

                                            </span>
                                        </td>
                                    <?php endif; ?>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4">
                                            <!-- Tombol Detail -->
                                            <a href="<?php echo e(route('pengaduans.show', $item->id)); ?>"
                                                class="flex items-center p-2 rounded-md text-blue-500 hover:bg-blue-100 transition duration-300">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>

                                            <!-- Tombol Delete -->
                                            <form action="<?php echo e(route('pengaduans.destroy', $item->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button onclick="return confirm('Are you sure you want to delete this?')"
                                                    class="flex items-center p-2 rounded-md text-red-500 hover:bg-orange-100 transition duration-300">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DISPERINDAG_PROJECT-main\resources\views/pages/admin/pengaduan/index.blade.php ENDPATH**/ ?>