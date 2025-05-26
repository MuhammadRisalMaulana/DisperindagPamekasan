<?php $__env->startSection('title'); ?>
MADUKONCER | Detail Pengaduan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
      Detail Pengaduan
    </h2>

    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <div class="text-gray-800 text-sm font-semibold px-4 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400">
          <h2>Nama Pelapor : <?php echo e($item->name); ?></h2>
          <h2 class="mt-4">Alamat : <?php echo e($item->user_alamat); ?></h2>
          <h2 class="mt-4">No Telepon : <?php echo e($item->phone); ?></h2>
          <h2 class="mt-4">Lokasi Kejadian : <?php echo e($item->lokasi_kejadian); ?></h2>
          <h2 class="mt-4">Keterangan Tambahan : <?php echo e($item->keterangan_tambahan ?? '-'); ?></h2>
          <h2 class="mt-4">Tanggal : <?php echo e($item->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY - HH:mm:ss')); ?></h2>
          <h2 class="mt-4">Status :
            <?php if($item->status == 'Belum di Proses'): ?>
              <span class="px-2 py-1 font-semibold text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700"><?php echo e($item->status); ?></span>
            <?php elseif($item->status == 'Sedang di Proses'): ?>
              <span class="px-2 py-1 font-semibold text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600"><?php echo e($item->status); ?></span>
            <?php else: ?>
              <span class="px-2 py-1 font-semibold text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100"><?php echo e($item->status); ?></span>
            <?php endif; ?>
          </h2>
        </div>

        <div class="px-4 py-3 mb-8 flex text-gray-800 bg-white rounded-lg shadow-md dark:bg-gray-800">
          <div class="relative hidden mr-3 md:block dark:text-gray-400">
            <h1 class="text-center mb-4 font-semibold">Foto</h1>
            <img class="h-auto w-auto max-h-64 max-w-sm rounded-lg" src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="Foto Pengaduan" loading="lazy" />
          </div>
          <div class="text-center flex-1 dark:text-gray-400">
            <h2 class="mb-4 font-semibold">Keterangan</h2>
            <p><?php echo e($item->description); ?></p>
          </div>
        </div>

        <div class="px-4 py-3 mb-8 flex bg-white rounded-lg shadow-md dark:text-gray-400 dark:bg-gray-800">
          <div class="text-center flex-1">
            <h1 class="mb-4 font-semibold">Tanggapan</h1>
            <p>
              <?php if(empty($tangap) || empty($tangap->tanggapan)): ?>
                <em>Belum ada tanggapan</em>
              <?php else: ?>
                <?php echo e($tangap->tanggapan); ?>

              <?php endif; ?>
            </p>
          </div>
        </div>
      </div>

      <div class="flex justify-center my-4">
        <a href="<?php echo e(url('admin/pengaduan/cetak', $item->id)); ?>"
          class="px-5 py-3 font-medium text-white bg-purple-600 rounded-lg hover:bg-purple-700">
          Export ke PDF
        </a>
      </div>
      <div class="flex justify-center my-6">
        <a href="<?php echo e(route('tanggapan.show', $item->id)); ?>"
          class="px-5 py-3 font-medium text-white bg-purple-600 rounded-lg hover:bg-purple-700">
          Berikan Tanggapan
        </a>
      </div>
    </div>
  </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DISPERINDAG_PROJECT-main\resources\views/pages/admin/pengaduan/detail.blade.php ENDPATH**/ ?>