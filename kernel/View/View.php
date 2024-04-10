<?php 

namespace Kernel\View;

use Kernel\Session\SessionInterface;
use Kernel\Exception\ViewNotFoundExeption;

class View implements ViewInterface
{
    public SessionInterface $session;

    public function __construct(SessionInterface $session)
    {
       $this->session = $session; 
    }

    public function page($name)
    {
        $filePath = APP_PATH . "/views/pages/$name.php";

        if (!file_exists($filePath)) {
            throw new ViewNotFoundExeption('Not found that file');
        }

        extract($this->defaultData());

        include $filePath; 
    }


    public function components($name)
    {
        $filePath = APP_PATH . "/views/layouts/$name.php";

        if (!file_exists($filePath)) {
            echo "Layouts $name not found";
            return;
        }

        include $filePath;
    }

    private function defaultData(): array
    {
        return [
            'view' => $this,
            'session' => $this->session
        ];
    }
}