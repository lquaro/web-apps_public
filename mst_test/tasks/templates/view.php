<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>MST-test Задачи</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
        <div id="header">
            <h1>Задачи</h1>
            <button id="openPopup">СОЗДАТЬ</button>
        </div>
        <div id="sheet">
            <form method="get">
                <h3>Статус</h3>
                <div>
                    <p>Сортировка:</p>
                    <select name="status" onchange="this.form.submit()">
                        <option value="all" <?= $status === 'all' ? 'selected' : '' ?>>Все</option>
                        <option value="new" <?= $status === 'new' ? 'selected' : '' ?>>Новые</option>
                        <option value="in_progress" <?= $status === 'in_progress' ? 'selected' : '' ?>>В работе</option>
                        <option value="done" <?= $status === 'done' ? 'selected' : '' ?>>Готовые</option>
                    </select>
                </div>
            </form>
            <table>
                <tr>
                    <th style="width: 30px">id</th>
                    <th style="width: 200px">Сотрудник</th>
                    <th style="width: 300px">Задача</th>
                    <th style="width: 90px">Статус</th>
                    <th>Создана</th>
                </tr>
                <?php foreach ($tasks as $t): ?>
                    <tr>
                        <td style="text-align: center;"><?=htmlspecialchars($t['id'])?></td>
                        <td><?=htmlspecialchars($t['employee_name'])?></td>
                        <td><?=htmlspecialchars($t['task_name'])?></td>
                        <td style="text-align: center"><?=htmlspecialchars($t['status'])?></td>
                        <td style="text-align: center"><?=htmlspecialchars($t['created_at'])?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <div id="inputs">
        <h2>Добавить задачу</h2>
        <form id="add" method="post">
            <input class="add" type="text" name="employee_name" placeholder="Имя сотрудника">
            <input style="border-top: 1px solid #EAEAEA" class="add" type="text" name="task_name" placeholder="Задача">
            <button type="submit" id="closePopup">Добавить</button>
        </form>
    </div>
    <script>
        const popup = document.getElementById('inputs');
        const openBtn = document.getElementById('openPopup');
        const closeBtn = document.getElementById('closePopup');

        openBtn.addEventListener('click', () => {
            popup.classList.add('show');
        });

        closeBtn.addEventListener('click', () => {
            popup.classList.remove('show');
        });
    </script>
</body>
</html>