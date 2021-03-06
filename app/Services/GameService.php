<?php

namespace App\Http\Services;

use App\Game;

class GameService {

    protected $model;

    public function __construct(Game $model) {
        $this->model = $model;
    }

    public function store($data) {
        Transaction()->begin($this->model);
        try {
            $result = $this->model->create($data);
        } catch (\Exception $e) {
            Transaction()->rollback();
            throw $e;
        }
        Transaction()->commit();

        return $result;
    }
}
