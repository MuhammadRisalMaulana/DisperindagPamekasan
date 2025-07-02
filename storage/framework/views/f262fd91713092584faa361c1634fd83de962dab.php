<?php $__env->startSection('title'); ?>
    MADUKONCER | Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Panel Informasi
            </h2>

            <?php if($pending > 0): ?>
                <div class="p-4 mb-6 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded">
                    Ada <strong><?php echo e($pending); ?></strong> pengaduan baru yang belum diproses.
                    <a href="<?php echo e(url('/admin/pengaduans')); ?>" class="underline">Lihat sekarang</a>
                </div>
            <?php endif; ?>


            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:tex  t-blue-100 dark:bg-blue-500">
                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Jumlah Pengaduan
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            <?php echo e($pengaduan); ?>

                        </p>
                    </div>
                </div>


                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Belum di Proses
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            <?php echo e($pending); ?>

                        </p>
                    </div>
                </div>


                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div
                        class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L13.586 5H8zM12 15a1 1 0 100-2H6.414l1.293-1.293a1 1 0 10-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L6.414 15H12z" />
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Sedang di Proses
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            <?php echo e($process); ?>

                        </p>
                    </div>
                </div>



                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                        <svg class="w-5 h-5" viewBox=" 0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Selesai
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            <?php echo e($success); ?>

                        </p>
                    </div>
                </div>
            </div>
            <?php if(Auth::user()->roles == 'ADMIN'): ?>
                <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div
                            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L13.586 5H8zM12 15a1 1 0 100-2H6.414l1.293-1.293a1 1 0 10-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L6.414 15H12z" />
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Total Berita
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                <?php echo e($berita); ?>

                            </p>
                        </div>
                    </div>


                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div
                            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Jumlah Petugas
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                <?php echo e($petugas); ?>

                            </p>
                        </div>
                    </div>


                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Jumlah Tanggapan
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                <?php echo e($tanggapan); ?>

                            </p>
                        </div>
                    </div>
                </div>


                
                <div class="bg-white rounded-lg shadow p-6 mt-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Grafik Pengaduan Bulanan</h3>
                    <canvas id="pengaduanChart" height="100"></canvas>
                </div>

                
                <div class="bg-white rounded-lg shadow p-6 mt-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Pengaduan Terbaru</h3>
                    <ul class="divide-y divide-gray-200">
                        <?php $__currentLoopData = $pengaduan_terbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="py-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-800"><?php echo e($item->isi_laporan); ?></span>
                                    <span class="text-sm text-gray-500"><?php echo e($item->created_at->diffForHumans()); ?></span>
                                </div>
                                <p class="text-sm text-gray-600">Status: <span
                                        class="font-medium"><?php echo e($item->status); ?></span></p>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </main>
    <?php $__env->startPush('scripts'); ?>
        <!-- Pastikan Chart.js termuat -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

        <script>
            const ctx = document.getElementById('pengaduanChart').getContext('2d');

            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($bulanChart); ?>, // Contoh: ["Jan", "Feb", "Mar"]
                    datasets: [{
                        label: 'Jumlah Pengaduan',
                        data: <?php echo json_encode($jumlahChart); ?>, // Contoh: [5, 12, 7]
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DISPERINDAG_PROJECT-main\resources\views/pages/admin/dashboard.blade.php ENDPATH**/ ?>