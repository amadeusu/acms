<?php

namespace Engine\Core\Template;

class Theme {

    const RULES_NAME_FILE = [
        'header' => 'header-%s',
        'footer' => 'footer-%s',
        'sidebar' => 'sidebar-%s',
    ];

    /**
     * Url current theme
     * @type string
     */
    public $url = '';

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param null $name
     * @throws \Exception
     */
    public function header($name = null) {
        $name = (string)$name;
        $file = 'header';

        if($name !== '') {
            $file = sprintf(self::RULES_NAME_FILE['header'], $name);
        }

        $this->loadTemplateFile($file);
    }

    /**
     * @param string $name
     * @throws \Exception
     */
    public function footer($name = '') {
        $name = (string)$name;
        $file = 'footer';

        if($name !== '') {
            $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
        }

        $this->loadTemplateFile($file);
    }

    /**
     * @param string $name
     * @throws \Exception
     */
    public function sidebar($name = '') {
        $name = (string)$name;
        $file = 'sidebar';

        if($name !== '') {
            $file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }

        $this->loadTemplateFile($file);
    }

    /**
     * @param string $name
     * @param array $data
     * @throws \Exception
     */
    public function block($name = '', $data = []) {
        $name = (string)$name;

        if($name !== '') {
            $this->loadTemplateFile($name, $data);
        }
    }

    /**
     * @param $filename
     * @param array $data
     * @throws \Exception
     */
    private function loadTemplateFile($filename, $data = []) {
        $file = ROOT_DIR . '/content/themes/default/' . $filename . '.php';
        if(is_file($file)) {
            extract($data);
            require $file;
        } else {
            throw new \Exception(
                sprintf('View file %s does not exist', $file))
            ;
        }
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}