<?php $__env->startSection('title', 'MADUKONCER | Form Pengaduan'); ?>

<?php $__env->startSection('content'); ?>
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
                Silahkan Ajukan Pengaduan Anda!
            </h2>

            <?php if($errors->any()): ?>
                <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('pengaduan.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Nama Pelapor</span>
                        <input type="text" name="name" placeholder="Masukkan nama lengkap Anda"
                            class="block w-full mt-1 text-sm form-input" required>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Alamat Pelapor</span>
                        <input type="text" name="user_alamat" placeholder="Masukkan alamat lengkap Anda"
                            class="block w-full mt-1 text-sm form-input" required>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Nomor Telepon</span>
                        <input type="text" name="phone" id="phone" placeholder="Contoh: 081234567890"
                            class="block w-full mt-1 text-sm form-input" required>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Lokasi Kejadian</span>
                        <input type="text" name="lokasi_kejadian" value="<?php echo e(old('lokasi_kejadian')); ?>"
                            placeholder="Masukkan lokasi kejadian"
                            class="block w-full mt-1 text-sm form-input" required />
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Jenis Pengaduan</span>
                        <select name="description" required class="block w-full mt-1 text-sm form-select">
                            <option value="" disabled selected>Pilih Jenis Pengaduan</option>
                            <option value="Barang Kadaluarsa">Barang Kadaluarsa</option>
                            <option value="Barang Tidak Ber SNI">Barang Tidak Ber SNI</option>
                            <option value="Barang Tidak Sesuai Takaran">Barang Tidak Sesuai Takaran</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Keterangan Tambahan</span>
                        <textarea name="keterangan_tambahan" placeholder="Masukkan keterangan tambahan jika ada atau jika tidak ada beri tanda ( - )"
                            class="block w-full mt-1 text-sm form-textarea"><?php echo e(old('keterangan_tambahan')); ?></textarea>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Bukti Foto</span>
                        <input type="file" name="image" required class="block w-full mt-1 text-sm form-input" />
                    </label>

                    <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Laporkan
                    </button>

                </div>
            </form>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.masyarakat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DISPERINDAG_PROJECT-main\resources\views/pages/masyarakat/index.blade.php ENDPATH**/ ?>