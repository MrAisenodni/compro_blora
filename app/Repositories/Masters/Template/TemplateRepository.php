<?php

namespace App\Repositories\Masters\Template;

use App\Models\Masters\Template;

class TemplateRepository implements TemplateRepositoryInterface
{
    public function getAll()
    {
        $data = Template::where('disabled', 0)->get();

        return $data;
    }

    public function findById($id)
    {
        $data = Template::where('id', $id)->where('disabled', 0);

        return $data->first();
    }

    public function findByUsername($username)
    {
        $data = Template::where('username', $username)->where('disabled', 0);

        return $data->first();
    }

    public function save(array $data)
    {
        return Template::create($data);
    }

    public function update($id, $data)
    {
        $detail = Template::where('id', $id)->update($data);

        return $detail;
    }

    public function delete($id)
    {
        $detail = $this->findById($id);
        $detail->delete();

        return true;
    }
}