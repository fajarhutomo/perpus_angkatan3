<?php 
session_start();
session_regenerate_id(true);

    if (isset($_POST['login'])) { 
        $users = [
            [ 
                "name" => "Qaulan Tsaqila",
                "email" => "qaulantsaqila75@gmail.com",
                "password" => "12345678"
            ],
            [
                "name" => "Finding Nemo",
                "email" => "findingnemo@gmail.com",
                "password" => "12345678"
            ],
            [
                "name" => "Finding Dory",
                "email" => "findingdory@gmail.com",
                "password" => "12345678"
            ],
            [
                "name" => "Qaqak",
                "email" => "qaqak123@gmail.com",
                "password" => "12345678"
            ]
        ];

        $email = $_POST['email'];
        $password = $_POST['password'];
        $chekedLogin = false;

        foreach ($users as $user) {
            if ($user['email'] == $email && $user['password'] == $password) {
                $_SESSION['nama'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $chekedLogin = true;
                break;
            }
        }

        if ($chekedLogin) {
            header("Location: ../dashboard.php");
            exit();
        }else {
            header("Location: ../index.php?error=login-gagal");
            exit();

        }
    }
?>