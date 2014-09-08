<?php
opcache_reset();
/*
  $path = __DIR__;
  $port = '81';

  $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path,
  RecursiveDirectoryIterator::SKIP_DOTS),
  RecursiveIteratorIterator::LEAVES_ONLY);
  $extensions = array(
  "php",
  "html");

  echo '<ul>';

  foreach ($iterator as $fileinfo)
  {
  if (in_array($fileinfo->getExtension(), $extensions))
  {
  $extension = $fileinfo->getExtension();
  $filename = $fileinfo->getBasename($extension);
  $host = $_SERVER['SERVER_NAME'];
  if ($filename === "index.")
  {
  $file = $fileinfo->getPathname();
  $path_parts = pathinfo($file);
  $drsplit = explode('/', $_SERVER['DOCUMENT_ROOT']);
  $splitpp = explode(DIRECTORY_SEPARATOR, $path_parts['dirname']);
  $endsplitpp = end($splitpp);
  $arraydiff = array_diff($splitpp, $drsplit);
  $implode = implode('/', $arraydiff);
  $href = $host . ':' . $port . '/' . $implode;
  echo '<li><a href = "//' . $href . '">' . $endsplitpp . '</a></li>';
  }
  }
  }
  echo '</ul>';
 */
include'dirlinks/DirectoryLinks.php';
$list = new DirectoryLinks;
$links = $list->link($path = __DIR__,
        $extensions = ['php',
    'html',
    'htm'], $port = '81',
        $ignores = ['css',
    'js',
    'fonts',
    'img',
    'images']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title><?php echo ucfirst($_SERVER['SERVER_NAME']);?> Index</title>
        <meta name="description" content="" />
        <meta name="author" content="Mark" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="index/css/style.css" />
        <link rel="shortcut icon" href="index/img/favicon.png" />
        <script src="index/js/jquery-2.0.3.min.js"></script>
        <script src="index/js/jquery.quick.pagination.min.js"></script>
    </head>
    <body>
        <div id="wrap">
            <div id="header">
                <h1><?php
                    echo ucfirst($_SERVER['SERVER_NAME']);
                    ?> list of sub domains by name</h1>
            </div>
            <div id="main">
                <div id="content" >
                    <ul class="pagination">
                        <?php
                        /* $dir = opendir(".");
                          $files = array(
                          );
                          while (($file = readdir($dir)) !== false)
                          {
                          if ($file != "." and $file != ".." and $file != "index.php")
                          {
                          array_push($files, $file);
                          }
                          }
                          closedir($dir);
                          sort($files); */
                        $i = 0;
                        foreach ($links as $key => $value)
                        {
                            $i = $i + 1;
                            if ($i == 1)
                            {
                                echo "<div class=\"container\"><div class=\"column-a\">";
                            }
                            echo '<li><a href="//' . $key . '" target="_blank">' . $value . '</a></li>';
                            if ($i == 12)
                            {
                                echo "</div><div class=\"column-b\">";
                            }
                            if ($i == 24)
                            {
                                echo "</div></div>";
                                $i = 0;
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
            $(document).ready(function(){
                $("ul.pagination").quickPagination({pageSize: "1"});
            });
        </script>
    </body>
</html>