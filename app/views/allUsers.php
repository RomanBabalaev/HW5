
<a href="usercreate">Создание пользователя</a>
<table>
    <tr>
        <th>ID пользователя</th>
        <th>Имя пользователя</th>
        <th>Управление</th>
    </tr>
    <?php
    foreach ($users as $user) : ?>
        <tr>
            <td><a href="say.php?id=<?= $user->id; ?>"><?= $user->id ?></a></td>
            <td><a href="say.php?id=<?= $user->id; ?>"><?= $user->name ?></a></td>
            <td>
                <a href="useredit?id=<?= $user->id; ?>">Добавление</a>
                <a href="userdelete?id=<?= $user->id; ?>">Удаление</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>