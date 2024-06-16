<?php

namespace App\Repositories\Settings\Menu;

use App\Models\Settings\Menu;

class MenuRepository implements MenuRepositoryInterface
{
    public function findBySlug($slug)
    {
        $data = Menu::selectRaw("id, title, route, url, description")->whereRaw("disabled = 0 AND is_login = 0 AND is_shown = 1 AND url = '$slug'");

        return $data->first();
    }

    public function findById($id)
    {
        $data = Menu::where('id', $id)->where('disabled', 0);

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