<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>タスク編集</title>
</head>

<body style="background-color: #ADD8E6">
    <h1 class="app-title">Todoアプリ ＜タスク編集＞</h1>
    <hr style="height: 1px; background-color: #333333">
    @foreach ($todos as $todo)
        <div style="display: flex; align-items:flex-end; gap: 4px">
            <form action="/" method="post">
                @csrf
                <div style="display: flex; align-items: flex-end; gap: 4px">
                    <div>
                        <label for="task" style="display: block">タスク</label>
                        <input type="text" name="task" id="task" value="{{ $todo->task }}">
                    </div>
                    <div>
                        <label for="datetime" style="display: block">期限</label>
                        <input type="datetime-local" name="datetime" id="datetime" value="{{ $todo->deadline }}">
                    </div>
                    <div>
                        <input type="submit" value="確定">
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ $todo->id }}">
                <input type="hidden" name="method" value="edit">
            </form>
            <form action="/" method="POST">
                @csrf
                <input type="submit" value="キャンセル">
            </form>
        </div>
    @endforeach
</body>

</html>
