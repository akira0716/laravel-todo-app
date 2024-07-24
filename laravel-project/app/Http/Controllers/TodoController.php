<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoModel;
use DateTimeZone;
use DateTime;

class TodoController extends Controller
{
    //コンストラクタ
    public function __construct(private TodoModel $todoModel) {}

    public function index(Request $request) {
        switch ($request->method) {
            case 'insert':
                $this->todoModel->setTodos($request);
                break;

            case 'delete':
                $this->todoModel->deleteTodos($request);
                break;

            case 'edit':
                $this->todoModel->editTodos($request);
                break;

            case 'done':
                $this->todoModel->doneTask($request);
                break;

            default:
                # code...
                break;
        }

        // 登録されているTodoをすべて取得
        $todos = $this->todoModel->getTodos();

        // タイムゾーンの設定
        $timezone = new DateTimeZone('Asia/Tokyo');
        // 設定したタイムゾーンで、現在日時を取得
        $now = new DateTime('now', $timezone);

        foreach ($todos as $todo) {
            // 期限前の場合
            if($todo->deadline > $now->format('Y-m-d H:i:s')) {
                $todo->hurryFlg = 0;
            }
            // 期限後の場合
            else {
                $todo->hurryFlg = 1;
            }
        }

        return view("todo", [
            "todos" => $todos,
        ]);
    }

    public function editForm(Request $request) {
        // リクエストで受け取ったidと一致するタスクを取得
        $todos = $this->todoModel->getTodos($request->id);

        return view("editForm", [
            "todos" => $todos,
        ]);
    }

    public function completeTasks(Request $request) {
        switch ($request->method) {
            case 'delete':
                $this->todoModel->deleteTodos($request);
                break;

            case 'return':
                $this->todoModel->returnTask($request);
                break;

            default:
                # code...
                break;
        }

        // 登録されているTodoをすべて取得
        $todos = $this->todoModel->getTodos();

        // タイムゾーンの設定
        $timezone = new DateTimeZone('Asia/Tokyo');
        // 設定したタイムゾーンで、現在日時を取得
        $now = new DateTime('now', $timezone);

        foreach ($todos as $todo) {
            // 期限前の場合
            if($todo->deadline > $now->format('Y-m-d H:i:s')) {
                $todo->hurryFlg = 0;
            }
            // 期限後の場合
            else {
                $todo->hurryFlg = 1;
            }
        }

        return view("completeTasks", [
            "todos" => $todos,
        ]);
    }
}
