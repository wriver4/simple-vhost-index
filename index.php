<?php //opcache_reset();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title><?php echo ucfirst($_SERVER['SERVER_NAME']);?> Index</title>
        <meta name="description" content="" />
        <meta name="author" content="Mark" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="http://local:81/dirlinks/css/style.css" />
        <link rel="shortcut icon" href="http://local:81/dirlinks/img/favicon.png" />
        <script src="http://local:81/dirlinks/js/jquery-2.0.3.min.js"></script>
        <script src="http://local:81/dirlinks/js/jquery.quick.pagination.min.js"></script>
    </head>
    <body>
        <div id="wrap">
            <div id="header">
                <h1><?php echo ucfirst($_SERVER['SERVER_NAME']);?> list of sub domains by name</h1>
            </div>
            <div id="main">
                <div id="content" >
                    <ul class="pagination">
                        <?php
                        $dir_iterator = new RecursiveDirectoryIterator(__DIR__,
                                RecursiveDirectoryIterator::SKIP_DOTS);
                        $directory_count = 0;
                        foreach ($dir_iterator as $directory)
                        {
                            $directory = end(explode(DIRECTORY_SEPARATOR,
                                            $directory));
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
                        echo"</div></div>";
                        ?>
                    </ul>
                </div>
                <div style="clear:both;">
                    <div id="footer"><p>&copy; Copyright  by Mark</p></div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function (){
                $("ul.pagination").quickPagination({pageSize: "1"});
            });
        </script>
    </body>
</html>