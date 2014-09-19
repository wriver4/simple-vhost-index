<?php

/**
 * Description of Dirlinks
 *
 * @author mark weisser <mark at whizbangdevelopers.com>
 */
class Dirlinks
{

    function show($path)
    {
        $dir_iterator = new RecursiveDirectoryIterator($path,
                RecursiveDirectoryIterator::SKIP_DOTS);
        $directory_count = 0;
        foreach ($dir_iterator as $directory)
        {
            if ($directory->isDir() === TRUE and $directory->getFilename() !== "dirlinks" and $directory->getFilename()
                    !== "nbproject")
            {
                $directory = end(explode(DIRECTORY_SEPARATOR, $directory));
                $directory_count = $directory_count + 1;
                if ($directory_count == 1)
                {
                    echo "<div class=\"container\"><div class=\"column-a\">";
                }
                echo "<li><a href='$directory' target=\"_blank\">$directory</a></li>";

                if ($directory_count == 12)
                {
                    echo "</div><div class=\"column-b\">";
                }
                if ($directory_count == 24)
                {
                    echo "</div></div>";
                    $directory_count = 0;
                }
            }
        }
        echo"</div></div>";
    }

    function header($path, $host)
    {
        echo '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><title>'
        . ucfirst(end(explode(DIRECTORY_SEPARATOR, $path)))
        . ' Index</title><meta name="description" content="" /><meta name="author" content="Mark"><meta name="viewport" content="width=device-width; initial-scale=1.0"><link rel="stylesheet" type="text/css" href="'
        . $host
        . 'dirlinks/css/style.css"><link rel="shortcut icon" href="'
        . $host
        . 'dirlinks/img/favicon.png"></head><body><div id="wrap"><div id="header"><h1>'
        . ucfirst(end(explode(DIRECTORY_SEPARATOR, $path)))
        . ' sub domains by name</h1></div><div id="main"><div id="content" ><ul class="pagination">';
    }

    function footer($host)
    {
        echo '</ul></div><div style="clear:both;"><div id="footer"><p>&copy; Copyright  by Mark</p></div></div></div></div>'
        . '<script src="'
        . $host
        . 'dirlinks/js/jquery-2.0.3.min.js"></script><script src="'
        . $host
        . 'dirlinks/js/jquery.quick.pagination.min.js"></script><script type="text/javascript">$(document).ready(function (){ $("ul.pagination").quickPagination({pageSize: "1"});});</script>'
        . '</body></html>';
    }

}
