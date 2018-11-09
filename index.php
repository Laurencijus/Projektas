


<?php

require_once 'header.php';

// require_once 'index1.php';
//require_once 'task1.php';

const IMAGE_FILE_EXTENSIONS = ['png', 'jpeg', 'jpg', 'pdf'];
?>

<div class="container">

<?php

require_once 'task.php';
function listFolder(string $directory, string $filename, int $level): void
{
    if ($filename != '..' && $filename != '.') {
        for ($i = 0; $i <= $level; $i++) {
            echo ' - ';
        }
        echo $filename . '<br>';
        listFiles($directory . '/' . $filename, $level + 1);
    }
}

function listFile(string $directory, string $filename, int $level): void
{
    $pathInfo = pathinfo($filename);
    $extension = $pathInfo['extension'];
    for ($i = 0; $i <= $level; $i++) {
        echo ' - ';
    }

    if ($extension == 'php') {
        echo '<a href="readfile.php?file=' . $directory . '/' . $filename . '" >'
            . $filename
            . '</a>'
        ;
    } else if (in_array($extension, IMAGE_FILE_EXTENSIONS)) {
        echo '<a href="viewImage.php?file=' . $directory . '/' . $filename . '" >'
            . $filename
            . '</a>'
        ;
    } else {
        echo '<a class="btn" href="download.php?file=' . $directory . '/' . $filename . '" >'
            . $filename
            . '</a>'
        ;
    }

    echo '<br>';
}

function listFiles(string $directory, int $level = 0): void
{
    $dir = opendir($directory);
    while ($filename = readdir($dir)) {
        if (is_dir($directory . '/' . $filename)) {
            listFolder($directory, $filename, $level);
        }

        if (is_file($directory . '/' . $filename)) {
            listFile($directory, $filename, $level);
        }
    }

    closedir($dir);
}

listFiles(FILE_FOLDER);
?>

</div>

<?php
require_once 'footer.php';
