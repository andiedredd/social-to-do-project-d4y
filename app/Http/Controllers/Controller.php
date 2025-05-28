<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Pluralizer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
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
