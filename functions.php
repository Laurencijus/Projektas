<?php declare (strict_types = 1);

require_once 'config.php';

function countVisit(): void
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['pages_count'])) {
        $_SESSION['pages_count'] = 1;
    } else {
        $_SESSION['pages_count']++;
    }

    if (!isset($_SESSION['first_visit_time'])) {
        $_SESSION['first_visit_time'] = time();
    }
}

function getSecondsFromFirstVisit(): int
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // if (isset($_SESSION['first_visit_time'])) {
    //     return  time() - $_SESSION['first_visit_time'];
    // }

    // return 0;
    return isset($_SESSION['first_visit_time']) ? time() - $_SESSION['first_visit_time'] : 0;
}

function getVisits(): int
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    return isset($_SESSION['pages_count']) ? $_SESSION['pages_count'] : 0;
}

function isLoggedIn(): bool
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true;
}

function addFlashMessage(string $messageType, string $text)
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['flash_messages'])) {
        $_SESSION['flash_messages'] = [];
    }

    $_SESSION['flash_messages'][] = [
        'type' => $messageType,
        'text' => $text,
    ];
}

function checkLoginAndRedirect(): void
{
    if (!isLoggedIn()) {
        header('Location:' . BASE_URL . '/form.php');
        addFlashMessage('danger', 'You must be logged in!');
        exit();
    }
}

function checkPassword(string $password): bool
{
    return password_verify($password, ADMIN_PASSWORD_HASH);
}

function login(): void
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION['admin_logged_in'] = true;
}

function logout(): void
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    session_destroy();
}
