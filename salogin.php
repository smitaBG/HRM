<?php
session_start();


$users = [
    'superadmin1' => ['password' => 'superadmin1pass', 'role' => 'superadmin'],
    'superadmin2' => ['password' => 'superadmin2pass', 'role' => 'superadmin'],
    'admin1' => ['password' => 'admin1pass', 'role' => 'admin'],
    'admin2' => ['password' => 'admin2pass', 'role' => 'admin'],
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        // Login successful
        $_SESSION['user_role'] = $users[$username]['role'];
        $_SESSION['username'] = $username;

        // Redirect based on role
        if ($users[$username]['role'] === 'superadmin') {
            header('Location: index.php');
            exit();
        } elseif ($users[$username]['role'] === 'admin') {
            header('Location: sign.php');
            exit();
        }
    } else {
      
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['username'] = $username;
            header('Location: form1.php');
            exit();
        } else {
            echo "Invalid login";
        }
    }
}
?>


<form method="post" action="aslogin.php">
    Username: <input type="text" name="username" /><br />
    Password: <input type="password" name="password" /><br />
    <input type="submit" value="Login" />
</form>
