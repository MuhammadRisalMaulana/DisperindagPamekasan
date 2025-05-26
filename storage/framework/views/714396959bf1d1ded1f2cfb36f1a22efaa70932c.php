

<?php $__env->startSection('title'); ?>
    MADUKONCER | Data Berita
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Data Berita
            </h2>

            <div class="my-4 mb-6">
                <a href="<?php echo e(route('berita.create')); ?>" 
                   class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                   Tambah Berita
                </a>
            </div>

            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger mb-4">
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
                                <th class="px-4 py-3">Gambar</th>
                                <th class="px-4 py-3">Judul</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <?php $__empty_1 = true; $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <img src="<?php echo e(Storage::url($berita->gambar)); ?>" alt="Gambar Berita" class="h-20 w-32 object-cover rounded-md">
                                    </td>
                                    <td class="px-4 py-3 text-sm font-semibold">
                                        <?php echo e($berita->judul); ?>

                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo e($berita->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY')); ?>

                                    </td>
                                    <td class="px-4 py-3 text-sm flex space-x-2">
                                        <a href="<?php echo e(route('berita.show', $berita->id)); ?>"
                                            class="px-3 py-1 text-white bg-blue-600 rounded hover:bg-blue-700">
                                            Detail
                                        </a>
                                        <a href="<?php echo e(route('berita.edit', $berita->id)); ?>"
                                            class="px-3 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                            Edit
                                        </a>
                                        <form action="<?php echo e(route('berita.destroy', $berita->id)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="px-3 py-1 text-white bg-red-600 rounded hover:bg-red-700">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center text-gray-400 py-4">
                                        Data Kosong
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    
                    <div class="mt-4">
                        <?php echo e($beritas->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DISPERINDAG_PROJECT-main\resources\views/pages/admin/berita/index.blade.php ENDPATH**/ ?>