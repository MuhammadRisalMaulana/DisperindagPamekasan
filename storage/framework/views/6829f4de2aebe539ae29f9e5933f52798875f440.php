<?php $__env->startSection('title'); ?>
MADUKONCER | Laporan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <div class="my-6 mb-6">
      <a href="<?php echo e(url('admin/laporan/cetak')); ?> "
        class="px-5 py-3  font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Export ke PDF
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
        <div class="flex justify-between mb-4">
          <form method="GET" action="<?php echo e(route('laporan.index')); ?>" class="flex space-x-4">
              <input type="text" name="name" placeholder="Cari Nama" value="<?php echo e(request('name')); ?>"
                  class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-purple-300" />

              <input type="date" name="date" value="<?php echo e(request('date')); ?>"
                  class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-purple-300" />

              <button type="submit"
                  class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 focus:outline-none">
                  Cari
              </button>
          </form>
      </div>
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">No</th>
              <th class="px-4 py-3">Nama</th>
              <th class="px-4 py-3">Alamat</th>
              <th class="px-4 py-3">Pengaduan</th>
              <th class="px-4 py-3">Tanggal</th>
              <th class="px-4 py-3">Status</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <?php $__empty_1 = true; $__currentLoopData = $pengaduan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="text-gray-700 dark:text-gray-400 ">
              <td class="px-4 py-3 text-sm">
                <?php echo e($item->id); ?>

              </td>
              <td class="px-4 py-3 text-sm">
                <?php echo e($item->name); ?>

              </td>
              <td class="px-4 py-3 text-sm">
                <?php echo e($item->user_alamat); ?>

              </td>
              <td class="px-4 py-3 text-sm">
                <?php echo e($item->description); ?>

              </td>
              <td class="px-4 py-3 text-sm">
                <?php echo e($item->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY - HH:mm:ss')); ?>

            </td>
            
              
              
              <?php if($item->status =='Belum di Proses'): ?>
              <td class="px-4 py-3 text-xs">
                <span
                  class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                  <?php echo e($item->status); ?>

                </span>
              </td>
              <?php elseif($item->status =='Sedang di Proses'): ?>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DISPERINDAG_PROJECT-main\resources\views/pages/admin/laporan.blade.php ENDPATH**/ ?>