<?php /** @var $data \Ramaadi\Karyawanapp\Internal\ViewData */ ?>

<div>
    <label for="<?= $data->get('name') ?? 'name' ?>-input"
           class="block text-sm font-medium text-gray-700"><?= $data->get('label') ?? 'label' ?></label>
    <div class="mt-1">
        <input type="<?= $data->get('type') ?? 'text' ?>" name="<?= $data->get('name') ?? 'name' ?>"
               id="<?= $data->get('name') ?? 'name' ?>-input"
               value="<?= $data->get('value') ?? '' ?>"
            <?= $data->get('required') ? 'required' : '' ?>
               class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
</div>
