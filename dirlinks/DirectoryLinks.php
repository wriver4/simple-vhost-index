<?php

/**
 * Description of DirectorLinks
 *
 * @author mark weisser <mark at whizbangdevelopers.com>
 *
 * $path = __DIR__;
  $port = '81';
 */
class DirectoryLinks
{

    public function link($path, $extensions, $port, $ignores)
    {

        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path,
                RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::LEAVES_ONLY);

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
                    $splitpp = explode(DIRECTORY_SEPARATOR,
                            $path_parts['dirname']);
                    foreach ($ignores as $ignore)
                    {
                        $go = in_array($ignore, $splitpp);
                        if ($go == TRUE) break;
                    }

                    if ($go == TRUE)
                    {

                        unset($go);
                        continue;
                    }
                    else
                    {
                        $endsplitpp = end($splitpp);
                        $arraydiff = array_diff($splitpp, $drsplit);
                        $implode = implode('/', $arraydiff);
                        $href = $host . ':' . $port . '/' . $implode;
                        $links[$href] = $endsplitpp;
                        unset($go);
                    }
                }
            }
        }

        return $links;
    }

}
