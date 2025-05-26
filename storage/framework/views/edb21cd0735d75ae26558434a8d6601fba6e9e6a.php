<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo e($item->judul); ?> | MADUKONCER DISPERINDAG PAMEKASAN</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="icon" href="<?php echo e(asset('img/logoicon.png')); ?>">
</head>

<body class="bg-white text-gray-800 font-sans">

    <!-- Navbar -->
    <nav class="bg-green-600 text-white shadow-md fixed top-0 w-full z-50">
        <div class="container mx-auto flex items-center justify-between p-4 px-6">
            <div class="flex items-center space-x-3">
                <img src="<?php echo e(asset('img/logodisperindag.png')); ?>" class="w-10 h-10 transform hover:scale-110 transition"
                    alt="Logo" />
                <span class="font-bold text-xl">MADUKONCER</span>
            </div>
            <ul class="flex space-x-4 hidden md:flex">
                <li><a href="/" class="hover:text-blue-200 font-semibold">Home</a></li>
                <li><a href="/" class="hover:text-blue-200 font-semibold">Tata Cara</a></li>
                <li><a href="/" class="hover:text-blue-200 font-semibold">Berita</a></li>
                <li><a href="/" class="hover:text-blue-200 font-semibold">Lokasi</a></li>
                <li><a href="/pengaduan/status" class="hover:text-blue-200 font-semibold">Cek Pengaduan</a></li>
            </ul>
        </div>
    </nav>

    <!-- Detail Berita -->
    <section class="pt-28 pb-20 px-6 bg-gray-50 min-h-screen">
        <div class="container mx-auto max-w-4xl bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-3xl font-bold text-green-700 mb-4"><?php echo e($item->judul); ?></h1>
            <p class="text-sm text-gray-500 mb-6">Diterbitkan pada <?php echo e($item->created_at->format('d M Y')); ?></p>

            <?php if($item->gambar): ?>
                <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" alt="<?php echo e($item->judul); ?>"
                    class="w-full h-auto object-cover rounded mb-6">
            <?php endif; ?>

            <div class="text-lg text-gray-800 leading-relaxed">
                <?php echo $item->keterangan; ?>

            </div>

            <div class="mt-10">
                <a href="<?php echo e(url()->previous()); ?>"
                    class="inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700 transition">
                    ← Kembali
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-green-600 text-white py-4 text-center">
        © <?php echo e(now()->year); ?> MADUKONCER DISPERINDAG PAMEKASAN | By
        <a href="/" class="underline hover:text-green-200" target="_blank">POLINEMA PSDKU PAMEKASAN</a>
    </footer>

    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\DISPERINDAG_PROJECT-main\resources\views/berita/detail_berita.blade.php ENDPATH**/ ?>