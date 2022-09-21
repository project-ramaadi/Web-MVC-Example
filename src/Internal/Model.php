<?php

namespace Ramaadi\Karyawanapp\Internal;

abstract class Model
{
    abstract protected function sessionModelName(): string;

    protected function fixEmptyModel()
    {
        if (!isset($_SESSION[$this->sessionModelName()])) {
            $_SESSION[$this->sessionModelName()] = [];
        }
    }

    protected function generateId(): int
    {
        $this->fixEmptyModel();

        return ModelIDCounter::getKeyForModel($this->sessionModelName());

    }

    public function create(array $data)
    {
        $this->fixEmptyModel();
        $_SESSION[$this->sessionModelName()][$this->generateId()] = $data;
        ModelIDCounter::incrementKeyForModel($this->sessionModelName());

    }

    public function all()
    {
        $this->fixEmptyModel();
        return $_SESSION[$this->sessionModelName()];
    }

    public function get(int|string $id)
    {
        $this->fixEmptyModel();
        return $_SESSION[$this->sessionModelName()][$id];
    }

    public function update(int $id, array $data)
    {
        $this->fixEmptyModel();
        $_SESSION[$this->sessionModelName()][$id] = $data;
        return $this->get($id);
    }

    public function delete(int $id)
    {
        $this->fixEmptyModel();
        unset($_SESSION[$this->sessionModelName()][$id]);
    }


}