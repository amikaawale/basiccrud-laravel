<?php
/**
 * Created by PhpStorm.
 * User: amika
 * Date: 9/18/20
 * Time: 12:58 PM
 */

namespace App\Modules\Todo\Repositories;

interface TodoInterface
{
    public function getTodoById($id);

    public function getAllTodos();

    public function getFormattedTodos();

    public function format($todo);
}