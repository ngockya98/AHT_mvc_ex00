<?php
namespace AHT\Core;

    class Controller
    {
        var $vars = [];
        var $layout = "default";

        public function set($d)
        {
            $this->vars = array_merge($this->vars, $d);
        }

        public function render($filename)
        {
            extract($this->vars);
            ob_start();
            $namespace = get_class($this);
            $namespaceArr = explode("\\", $namespace);
            $nameController = end($namespaceArr);
            require(ROOT . "Views/" . ucfirst(str_replace('Controller', '', $nameController)) . '/' . $filename . '.php');
            $content_for_layout = ob_get_clean();

            if ($this->layout == false)
            {
                $content_for_layout;
            }
            else
            {
                require(ROOT . "Views/Layouts/" . $this->layout . '.php');
            }
        }

        private function secure_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        protected function secure_form($form)
        {
            foreach ($form as $key => $value)
            {
                $form[$key] = $this->secure_input($value);
            }
        }

        protected function convertToString($str)
        {
            $str = "'" . $str . "'";
            return $str;
        }

    }
?>