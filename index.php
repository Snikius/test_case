<?php
/*
* На вход данному скрипту передаются неизвестные параметры
* Задача: максимально оптимизировать код, чтобы при любых условиях он на 100% сохранил свою функциональность
* Т.е. вывод скрипта до и после оптимизации должен быть одинаковым
* Оптимизация подразумевает собой хороший PHP5 стиль, безопасность, подготовленность к highload и т.д.
* В результате эти несколько строчек должны стать "идеальным" кодом с Вашей точки зрения
*/

$users = [];
$users[] = isset($_REQUEST['user1']) ? $_REQUEST['user1'] : null;
$users[] = isset($_REQUEST['user2']) ? $_REQUEST['user2'] : null;
$users[] = isset($_REQUEST['user3']) ? $_REQUEST['user3'] : null;

if(in_array(null, $users)) {
    die("Недостаточно параметров");
}

// Без подключения к БД
$stmt = $pdo->prepare('SELECT name FROM users WHERE user IN (?, ?, ?)');
$stmt->execute($users);
while ($row = $stmt->fetch()) {
    echo $row['name'] . "<br>";
}
