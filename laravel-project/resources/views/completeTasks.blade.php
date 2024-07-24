<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>完了済みタスク一覧</title>
</head>

<body style="background-color: #ADD8E6">
    <h1 class="app-title">Todoアプリ ＜完了済みタスク一覧＞</h1>
    <hr style="height: 1px; background-color: #333333">
    <div style="margin-top: 24px">
        @if (isset($todos))
            @php
                $taskCount = 0;
            @endphp
            @foreach ($todos as $todo)
                @if ($todo->status == 0)
                    @continue
                @endif
                @php
                    $taskCount++;
                @endphp
                @if ($todo->hurryFlg > 0)
                    <div style="height: 40px; display: flex; gap: 12px; align-items: center">
                        <form action="/completeTasks" method="post">
                            @csrf
                            <button type="submit">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_54_12)">
                                        <path
                                            d="M14.8201 5.2738V9.7738C20.3429 9.7738 24.8201 14.251 24.8201 19.7738C24.8201 20.0465 24.8092 20.3166 24.7878 20.5838C23.3256 17.8102 20.4582 15.8928 17.1331 15.7791L16.8201 15.7738H14.82L14.8201 20.2738L6.82007 12.7738L14.8201 5.2738ZM8.82007 5.2738V8.0108L3.74007 12.7738L8.81907 17.5348L8.82007 20.2738L0.820068 12.7738L8.82007 5.2738Z"
                                            fill="black" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_54_12">
                                            <rect width="24" height="24" fill="white"
                                                transform="translate(0.820068 0.773804)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                            <input type="hidden" name="method" value="return">
                        </form>
                        <p style="width:300px; color: red">{{ $todo->task }}</p>
                        <p style="color: red">{{ $todo->deadline }}</p>
                        <form action="/completeTasks" method="post">
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
                        <form action="/completeTasks" method="post">
                            @csrf
                            <button type="submit">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_54_12)">
                                        <path
                                            d="M14.8201 5.2738V9.7738C20.3429 9.7738 24.8201 14.251 24.8201 19.7738C24.8201 20.0465 24.8092 20.3166 24.7878 20.5838C23.3256 17.8102 20.4582 15.8928 17.1331 15.7791L16.8201 15.7738H14.82L14.8201 20.2738L6.82007 12.7738L14.8201 5.2738ZM8.82007 5.2738V8.0108L3.74007 12.7738L8.81907 17.5348L8.82007 20.2738L0.820068 12.7738L8.82007 5.2738Z"
                                            fill="black" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_54_12">
                                            <rect width="24" height="24" fill="white"
                                                transform="translate(0.820068 0.773804)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                            <input type="hidden" name="method" value="return">
                        </form>
                        <p style="width:300px">{{ $todo->task }}</p>
                        <p>{{ $todo->deadline }}</p>
                        <form action="/completeTasks" method="post">
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
                <h3>完了済みのタスクはありません。</h3>
            @endif
        @endif
    </div>
    <div style="margin-top: 36px">
        <a href="/"
            style="padding: 12px 24px; background-color:#00008B; text-decoration:none; color:#fff">タスク一覧へ</a>
    </div>
</body>

</html>
