<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タスク一覧</title>
</head>

<body style="background-color: #ADD8E6">
    <h1 class="app-title">Todoアプリ ＜タスク一覧＞</h1>
    <hr style="height: 1px; background-color: #333333">
    <form action="/" method="post">
        @csrf
        <div style="display: flex; align-items: flex-end; gap: 4px">
            <div>
                <label for="task" style="display: block">タスク</label>
                <input type="text" name="task" id="task">
            </div>
            <div>
                <label for="datetime" style="display: block">期限</label>
                <input type="datetime-local" name="datetime" id="datetime">
            </div>
            <div>
                <input type="submit" value="登録">
            </div>
        </div>
        <input type="hidden" name="method" value="insert">
    </form>
    <div style="margin-top: 24px">
        @if (isset($todos))
            @php
                $taskCount = 0;
            @endphp
            @foreach ($todos as $todo)
                @if ($todo->status == 1)
                    @continue
                @endif
                @php
                    $taskCount++;
                @endphp
                @if ($todo->hurryFlg > 0)
                    <div style="height: 40px; display: flex; gap: 12px; align-items: center">
                        <form action="/" method="post">
                            @csrf
                            <button type="submit">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.9157 15.8789L20.1081 6.68652L21.5223 8.10073L10.9157 18.7073L4.55176 12.3434L5.96598 10.9292L10.9157 15.8789Z"
                                        fill="black" />
                                </svg>
                            </button>
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                            <input type="hidden" name="method" value="done">
                        </form>
                        <p style="width:300px; color: red">{{ $todo->task }}</p>
                        <p style="color: red">{{ $todo->deadline }}</p>
                        <form action="/edit" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                            <input type="hidden" name="method" value="edit">
                            <button type="submit">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.00171 19.39H6.41592L15.7296 10.0763L14.3154 8.66207L5.00171 17.9758V19.39ZM21.0017 21.39H3.00171V17.1473L16.4367 3.71232C16.8273 3.3218 17.4604 3.3218 17.8509 3.71232L20.6794 6.54075C21.0699 6.93127 21.0699 7.56444 20.6794 7.95496L9.24435 19.39H21.0017V21.39ZM15.7296 7.24786L17.1438 8.66207L18.558 7.24786L17.1438 5.83364L15.7296 7.24786Z"
                                        fill="#333333" />
                                </svg>
                            </button>
                        </form>
                        <form action="/" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                            <input type="hidden" name="method" value="delete">
                            <button type="submit">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.00171 4.5V2.5H17.0017V4.5H22.0017V6.5H20.0017V21.5C20.0017 22.0523 19.554 22.5 19.0017 22.5H5.00171C4.44943 22.5 4.00171 22.0523 4.00171 21.5V6.5H2.00171V4.5H7.00171ZM6.00171 6.5V20.5H18.0017V6.5H6.00171ZM9.00171 9.5H11.0017V17.5H9.00171V9.5ZM13.0017 9.5H15.0017V17.5H13.0017V9.5Z"
                                        fill="#333333" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @else
                    <div style="height: 40px; display: flex; gap: 12px; align-items: center">
                        <form action="/" method="post">
                            @csrf
                            <button type="submit">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.9157 15.8789L20.1081 6.68652L21.5223 8.10073L10.9157 18.7073L4.55176 12.3434L5.96598 10.9292L10.9157 15.8789Z"
                                        fill="black" />
                                </svg>
                            </button>
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                            <input type="hidden" name="method" value="done">
                        </form>
                        <p style="width:300px">{{ $todo->task }}</p>
                        <p>{{ $todo->deadline }}</p>
                        <form action="/edit" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                            <input type="hidden" name="method" value="edit">
                            <button type="submit">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.00171 19.39H6.41592L15.7296 10.0763L14.3154 8.66207L5.00171 17.9758V19.39ZM21.0017 21.39H3.00171V17.1473L16.4367 3.71232C16.8273 3.3218 17.4604 3.3218 17.8509 3.71232L20.6794 6.54075C21.0699 6.93127 21.0699 7.56444 20.6794 7.95496L9.24435 19.39H21.0017V21.39ZM15.7296 7.24786L17.1438 8.66207L18.558 7.24786L17.1438 5.83364L15.7296 7.24786Z"
                                        fill="#333333" />
                                </svg>
                            </button>
                        </form>
                        <form action="/" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                            <input type="hidden" name="method" value="delete">
                            <button type="submit">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.00171 4.5V2.5H17.0017V4.5H22.0017V6.5H20.0017V21.5C20.0017 22.0523 19.554 22.5 19.0017 22.5H5.00171C4.44943 22.5 4.00171 22.0523 4.00171 21.5V6.5H2.00171V4.5H7.00171ZM6.00171 6.5V20.5H18.0017V6.5H6.00171ZM9.00171 9.5H11.0017V17.5H9.00171V9.5ZM13.0017 9.5H15.0017V17.5H13.0017V9.5Z"
                                        fill="#333333" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endif
            @endforeach
            @if ($taskCount == 0)
                <h3>タスクがありません。</h3>
            @endif
        @endif
    </div>
    <div style="margin-top: 36px">
        <a href="/completeTasks"
            style="padding: 12px 24px; background-color:#00008B; text-decoration:none; color:#fff">完了済みタスク一覧へ</a>
    </div>
</body>

</html>
