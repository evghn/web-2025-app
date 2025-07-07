<?php

namespace core\models;

class BaseView
{
    public string $layout = "main";
    public string $cssDefault = "site.css";
    private array $cssFiles = [];
    private array $jsFiles = [];
    public ?object $controller = null;

    public function __construct()
    {
        $this->setCssFile(ASSETS_CSS_PATH . $this->cssDefault);
    }

    public function renderLayout(string $html): string
    {
        $fileLayout = LAYOUT_PATH . $this->layout . ".php";
        return $this->renderHtmlFile($fileLayout, ["content" => $html]);
    }

    public function render(string $fileHtml, array $data = []): string
    {
        $fileHtml = VIEW_PATH . $fileHtml . ".php";
        return $this->renderHtmlFile($fileHtml, $data);
    }

    private function renderHtmlFile(string $fileHtml, array $data = [])
    {
        extract($data);
        ob_start();
        include $fileHtml;
        $buf = ob_get_contents();
        ob_end_clean();
        return $buf;
    }


    public function setCssFile(string $fileCss)
    {
        $this->cssFiles[] = $fileCss;
    }

    public function getLinkCssFiles()
    {
        return implode("\n", array_map(
            fn($val) => "<link rel=\"stylesheet\" href=\"$val\">",
            $this->cssFiles
        ));
    }

    public function setJsFile(string $fileJs)
    {
        $this->jsFiles[] = $fileJs;
    }

    public function getLinkJsFiles()
    {
        return implode("\n", array_map(
            fn($val) => "<script src=\"$val\"></script>",
            $this->jsFiles
        ));
    }
}
