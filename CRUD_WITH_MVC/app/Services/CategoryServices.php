<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Category;

class CategoryServices
{

    public $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategories()
    {
        return $this->category->get();
    }

    public function getCategory($id)
    {
        return $this->category->find($id);
    }

    public function addCategory(object $data)
    {
        try {
            $this->category->name = $data->name;
            $this->category->description = $data->description;
            $this->category->status = $data->status;
            if (isset($data->image)) {
                $image = $data->image;
                $imagename = time() . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/category', $imagename);
                $this->category->image = $imagename;
            };
            $this->category->save();
            return $this->category;
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error occurred while adding category: ' . $e->getMessage());
            return null;
        }
    }

    public function deleteCategory($id)
    {
        $cate = $this->category->find($id);
        $cate->delete();
    }
}
