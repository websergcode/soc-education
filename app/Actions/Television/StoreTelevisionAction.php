<?php

namespace App\Actions\Television;

use App\Models\Television;

class StoreTelevisionAction
{
    public function execute(array $data): bool
    {
        $television = new Television;
        $television->brand = $data['brand'];
        $television->model = $data['model'];
        $television->size = $data['size'];
        $television->description = $data['description'];
        $television->price = $data['price'];
        $television->is_smart = $data['is_smart'];

        if (is_file($data['image'])) {
            $image = $data['image'];
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $television->image = $imageName;
        }

        return $television->save();
    }
}
