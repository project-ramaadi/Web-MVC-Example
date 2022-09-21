<?php /** @var $data \Ramaadi\Karyawanapp\Internal\ViewData */ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= $data->url('assets/css/app.css') ?>">
    <script src="<?= $data->url('assets/js/app.js') ?>"></script>
    <title>PT Maimai Sejahtera</title>
</head>
<body class="h-screen w-screen">
<main class="max-w-7xl mx-auto m-4 p-4" x-data="{ deleteUser: [], deleteModalOpen: false }">

    <div class="w-full flex space-x-4 items-center">
        <img src="https://maimai.sega.com/assets/img/universe/common/logo.png" alt="logo" class="w-32">
        <div>
            <h1 class="text-lg font-bold">PT Maimai Sejahtera</h1>
            <p class="text-md text-gray-500">Office Management Portal</p>
        </div>
    </div>

    <div class="my-4">
        <?= $data->component('successMessageFlash') ?>
    </div>

    <div class="grid grid-cols-6 mt-6 gap-10">

        <div class="col-span-4 space-y-4">
            <h1 class="text-lg font-bold">Office List</h1>

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="border overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Address
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        City
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Telephone Number
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit or Delete</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($data->get('offices') as $id => $office): ?>
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <?= $id ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?= $office['name'] ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?= $office['address'] ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?= $office['city'] ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?= $office['phone_no'] ?>
                                        </td>
                                        <td class="px-6 py-4 space-x-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="<?= $data->url("offices/$id/edit") ?>"
                                               class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <?php if ($data->get('mode') !== 'edit'): ?>
                                                <button
                                                        @click="() => { deleteUser = { name: '<?= $office['name'] ?>', id: '<?= $id ?>' }; deleteModalOpen = true; }"
                                                        class="text-indigo-600 hover:text-indigo-900">Delete
                                                </button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-span-2 space-y-4">
            <h1 class="text-lg font-bold">
                <?= $data->get('mode') === 'edit' ? 'Edit office' : 'Create office' ?>
            </h1>

            <?php if ($data->get('mode') === 'edit'): ?>
                <div class="rounded-md bg-blue-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <!-- Heroicon name: solid/information-circle -->
                            <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3 flex-1 md:flex md:justify-between">
                            <p class="text-sm text-blue-700">You are currently editing office
                                "<?= $data->get('edit')['name'] ?>".</p>
                            <p class="mt-3 text-sm md:mt-0 md:ml-6">
                                <a href="<?= $data->url("offices") ?>"
                                   class="whitespace-nowrap font-medium text-blue-700 hover:text-blue-600">Cancel edit
                                    <span aria-hidden="true">&rarr;</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


            <div class="w-full rounded border p-4">
                <form action="<?= $data->get('mode') === 'list' ? $data->url("offices/submit") : $data->url("offices/{$data->get('edit_id')}/edit") ?>"
                      method="post" class="space-y-4">

                    <?= $data->component('input', [
                        'name' => 'name',
                        'label' => 'Name',
                        'type' => 'text',
                        'required' => true,
                        'value' => $data->get('mode') === 'edit' ? $data->get('edit')['name'] : ''
                    ]) ?>

                    <?= $data->component('input', [
                        'name' => 'address',
                        'label' => 'Address',
                        'type' => 'text',
                        'required' => true,
                        'value' => $data->get('mode') === 'edit' ? $data->get('edit')['address'] : ''
                    ]) ?>


                    <?= $data->component('input', [
                        'name' => 'city',
                        'label' => 'City',
                        'type' => 'text',
                        'required' => true,
                        'value' => $data->get('mode') === 'edit' ? $data->get('edit')['city'] : ''
                    ]) ?>

                    <?= $data->component('input', [
                        'name' => 'phone_no',
                        'label' => 'Telephone Number',
                        'type' => 'text',
                        'required' => true,
                        'value' => $data->get('mode') === 'edit' ? $data->get('edit')['phone_no'] : ''
                    ]) ?>

                    <div class="w-full flex justify-end items-center">
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="currentColor" class="-ml-1 mr-2 h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                            </svg>
                            <?= $data->get('mode') === 'edit' ? 'Edit office' : 'Create office' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php if ($data->get('mode') !== 'edit'): ?>
        <div @keydown.window.escape="deleteModalOpen = false" x-show="deleteModalOpen"
             class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" x-ref="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <div x-show="deleteModalOpen" x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     x-description="Background overlay, show/hide based on modal state."
                     class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="deleteModalOpen = false"
                     aria-hidden="true">
                </div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>

                <div x-show="deleteModalOpen" x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-description="Modal panel, show/hide based on modal state."
                     class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                        <button type="button"
                                class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                @click="deleteModalOpen = false">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6" x-description="Heroicon name: outline/x"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" x-description="Heroicon name: outline/exclamation"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Delete office
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Are you sure you want to delete the office "<span x-text="deleteUser.name"></span>"
                                    ? This action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                        <form
                                method="post"
                                :action="'<?= $data->url('offices/') ?>' + deleteUser.id + '/delete' ">
                            <input type="hidden" name="confirm">
                            <button type="submit"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Delete
                            </button>
                        </form>

                        <button type="button"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                                @click="deleteModalOpen = false">
                            Cancel
                        </button>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>

</main>

</body>
</html>