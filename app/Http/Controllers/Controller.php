<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Pluralizer;

class Controller
{
    protected $model;

    public function index()
    {
        $dir = $this->dir();
        $items = $this->model::query()->get();
        return view("$dir.index", [
            'items' => $items
        ]);
    }

    /**
     * Название папки (название класса из $model
     * переводится в множественное число
     * и первая буква переводится в нижний регистр)
     * @return string
     */
    private function dir()
    {
        $className = class_basename($this->model);
        $dir = Pluralizer::plural($className);
        return mb_lcfirst($dir);
    }
}
