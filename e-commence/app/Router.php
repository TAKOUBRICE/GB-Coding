<?php 
namespace App;

class Router {

    private $viewpath;
    private $router;

    public function __construct(string $viewpath)
    {
        $this ->viewpath = $viewpath;
        $this ->router = new \AltoRouter();
        // $this ->router ->setBasePath($racine);
    }

    public function base (string $racine){
        $this ->router ->setBasePath($racine);
    }

    public function get(string $url, string $view , string $name){
        $this ->router -> map('GET', $url, $view, $name);
        return $this;
    }

    public function run()
    {
        $match = $this ->router->match();
        if($match ){
            $view = $match['target'];
            // ob_start();
            require $this ->viewpath . $view .'.php';
            // $content = ob_get_clean();
           
        }else{
            echo 'erro:404';
         }
         return $this;
    }
}
?>