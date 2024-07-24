<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TodoModel extends Model
{
    use HasFactory;

    // タスクの取得
    public function getTodos($id = "") {
        // idの指定がない場合
        if($id == "") {
            $todos = DB::select('SELECT * FROM todos');
        }
        // idの指定がある場合
        else {
            $todos = DB::select('SELECT * FROM todos WHERE id = ?', [$id]);
        }

        return $todos;
    }

    // タスクの追加
    public function setTodos($request) {
        // タスク
        $task = $request->task;
        // 期限
        $datetime = $request->datetime;

        DB::insert('insert into todos (id, task, status, deadline) values (null, ?, false, ?)', [$task, $datetime]);
    }

    // タスクの編集
    public function editTodos($request) {
        // id
        $id = $request->id;
        // タスク
        $task = $request->task;
        // 期限
        $datetime = $request->datetime;

        DB::update('update todos set task = ?, deadline = ? where id = ?', [$task, $datetime, $id]);
    }

    // タスクの削除
    public function deleteTodos($request) {
        // id
        $id = $request->id;

        DB::delete('delete from todos where id = ?', [$id]);
    }

    // タスクの完了
    public function doneTask($request) {
        // id
        $id = $request->id;

        DB::update('update todos set status = 1 where id = ?', [$id]);
    }

    // タスクの戻し
    public function returnTask($request) {
        // id
        $id = $request->id;

        DB::update('update todos set status = 0 where id = ?', [$id]);
    }
}
