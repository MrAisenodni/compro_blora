<?php

namespace App\Repositories\Masters\Template;

interface TemplateRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function save(array $data);
    public function update($id, $data);
    public function delete($id);
}
