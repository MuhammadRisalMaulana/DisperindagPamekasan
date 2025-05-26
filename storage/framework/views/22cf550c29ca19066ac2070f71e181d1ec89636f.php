

<?php $__env->startSection('title', 'Cek Status Pengaduan'); ?>

<?php $__env->startSection('content'); ?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
      Cek Status Pengaduan Anda
    </h2>

    <?php if(session('status')): ?>
      <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
        <?php echo e(session('status')); ?>

      </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
      <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
        <?php echo e(session('error')); ?>

      </div>
    <?php endif; ?>

    <form action="<?php echo e(route('pengaduan.check')); ?>" method="GET">
      <?php echo csrf_field(); ?>
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
          <span class="text-gray-700">Masukkan Token Pengaduan</span>
          <input type="text" name="token" value="<?php echo e(old('token')); ?>" class="block w-full mt-1 text-sm form-input" placeholder="Contoh: ABC123" required>
        </label>

        <button type="submit"
          class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
          Lihat Pengaduan
        </button>
      </div>
    </form>

    <?php if(isset($pengaduan)): ?>
    <div class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <h3 class="text-lg font-semibold mb-4">Detail Pengaduan</h3>
      <p><strong>Nama Pelapor:</strong> <?php echo e($pengaduan->name); ?></p>
      <p><strong>Alamat:</strong> <?php echo e($pengaduan->user_alamat); ?></p>
      <p><strong>Nomor Telepon:</strong> <?php echo e($pengaduan->phone); ?></p>
      <p><strong>Lokasi Kejadian:</strong> <?php echo e($pengaduan->lokasi_kejadian); ?></p>
      <p><strong>Jenis Pengaduan:</strong> <?php echo e($pengaduan->description); ?></p>
      <p><strong>Keterangan Tambahan:</strong> <?php echo e($pengaduan->keterangan_tambahan ?? '-'); ?></p>
      <p><strong>Token:</strong> <?php echo e($pengaduan->token); ?></p>
      <p><strong>Waktu Pengaduan:</strong> <?php echo e($pengaduan->created_at->format('d M Y H:i')); ?></p>
      <p><strong>Status:</strong> <?php echo e($pengaduan->status); ?></p>
      <p><strong>Bukti Foto:</strong><br>
        <img src="<?php echo e(asset('storage/' . $pengaduan->image)); ?>" alt="Bukti Foto" class="mt-2 w-64 rounded">
      </p>
    </div>
    <?php endif; ?>

  </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.masyarakat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DISPERINDAG_PROJECT-main\resources\views/pages/pengaduan/pengaduan_status.blade.php ENDPATH**/ ?>