<?php

namespace Ramaadi\Karyawanapp\Controllers;

use Ramaadi\Karyawanapp\Internal\Controller;
use Ramaadi\Karyawanapp\Internal\SessionFlashStorage;
use Ramaadi\Karyawanapp\Models\Office;

class OfficeController extends Controller
{
    private Office $office;


    public function __construct()
    {
        $this->office = new Office();
    }

    public function index(): bool|string
    {
        return $this
            ->view('offices')
            ->with([
                'mode' => 'list',
                'offices' => $this->office->all()
            ])->render();
    }

    public function create()
    {

        $this->office->create([
            'name' => $this->formData()['name'],
            'address' => $this->formData()['address'],
            'city' => $this->formData()['city'],
            'phone_no' => $this->formData()['phone_no']
        ]);

        SessionFlashStorage::addFlash(
            'success_message',
            'You\'ve added an office!'
        );

        header("Location: /offices");
    }

    public function edit($id)
    {
        return $this
            ->view('offices')
            ->with([
                'edit_id' => $id,
                'offices' => $this->office->all(),
                'edit' => $this->office->get($id),
                'mode' => 'edit'
            ])->render();
    }

    public function update($id)
    {
        $office = $this
            ->office
            ->update($id, $this->formData());
        SessionFlashStorage::addFlash(
            'success_message',
            "Edited the office {$office['name']} successfylly!"
        );
        header("Location: /offices");
    }


    public function delete($id)
    {
        $this->office->delete($id);

        SessionFlashStorage::addFlash(
            'success_message',
            'Office deleted successfully!'
        );

        header("Location: /offices");
    }
}