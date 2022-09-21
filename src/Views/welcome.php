<?php /** @var $data \Ramaadi\Karyawanapp\Internal\ViewData */ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= $data->url('assets/css/app.css') ?>">
    <title>PT Maimai Sejahtera</title>
</head>
<body class="h-screen w-screen">
<div style="background-image: url('assets/img/pp.png'); background-size: cover; background-position: center;"
     class="h-full w-full flex items-center justify-center">
    <section
            class="bg-white shadow-md rounded-md flex-col min-w-[40vw] space-y-4 items-center min-h-[20vh] flex justify-center p-4">
        <img src="https://maimai.sega.com/assets/img/universe/common/logo.png" alt="logo" class="w-64">
        <div class="space-y-2">
            <h1 class="text-xl font-bold">PT MAIMAI SEJAHTERA</h1>
            <p class="text-md font-semibold text-center">Employee Portal</p>
        </div>

        <div class="flex space-y-2 w-full flex-col justify-between">
            <a href="#"
               class="inline-flex items-center w-full px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Employee Portal
            </a>

            <a href="#"
               class="inline-flex items-center w-full px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Office Branches Portal
            </a>

            <a href="#"
               class="inline-flex items-center w-full px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Employee Locations Portal
            </a>
        </div>

        <p class="pt-10 text-gray-400 text-md">&copy; 2022 PT Senang Entrepreneur Group Abadi (SEGA)</p>
    </section>
</div>
<script src="<?= $data->url('assets/js/app.js') ?>"></script>
</body>
</html>