<?php

namespace Swu\Settings;

require_once "./src/utils/getPathLocation.php";

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

class Views
{
    private $loader;
    private $twig;
    private $path;
    private $dir = [];

    public function __construct()
    {
        $this->path = getPathLocation("Views/")['root'];
        array_push($this->dir, [
            "views" => $this->path,
            "cache" => $this->path . "cache/"
        ]);

        $this->initFileSystemMapper();
    }

    private function initFileSystemMapper()
    {
        $dirObject = (object) $this->dir[0];

        $this->loader = new FilesystemLoader($dirObject->views);

        $this->twig = new Environment($this->loader, [
            'debug' => true,
            'auto_reload' => true,
            'charset' => 'utf-8',
            'cache' => $dirObject->cache
        ]);

        $this->twig->addExtension(new DebugExtension);
    }

    public function render($renderPage, $data = [])
    {
        echo $this->twig->render($renderPage, $data);
    }

    public function display($page)
    {
        $this->twig->display($page);
    }
}
