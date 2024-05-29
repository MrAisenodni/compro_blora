<?php

namespace App\Repositories\Settings\Menu;

use App\Models\Settings\Menu;

class MenuRepository implements MenuRepositoryInterface
{
    public function getAll()
    {
        $data = Menu::where('disabled', 0)->get();

        return $data;
    }

    public function findById($id)
    {
        $data = Menu::where('id', $id)->where('disabled', 0);

        return $data->first();
    }

    public function findByCondition($select, $where)
    {
        $data = Menu::selectRaw("$select")->whereRaw("$where");

        return $data->first();
    }

    public function save(array $data)
    {
        return Menu::create($data);
    }

    public function update($id, $data)
    {
        $detail = Menu::where('id', $id)->update($data);

        return $detail;
    }

    public function delete($id)
    {
        $detail = $this->findById($id);
        $detail->delete();

        return true;
    }
}