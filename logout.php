<?php
require_once 'functions.php';

logout();

header('Location:' . BASE_URL . '/form.php');
