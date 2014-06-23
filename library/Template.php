<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhu
 * Date: 14-6-23
 * Time: ÏÂÎç9:55
 * To change this template use File | Settings | File Templates.
 */
class Template{
    private $templateDir = 'template/';
    private $compileDir = 'compile/';
    private $templateSuffix = '.tp.php';
    private $cache_time = 7200;
    private $tempFile ;
    private $compileFile;
    private $var = array();

    public function __construct($arrConfig=array()){
        if($arrConfig){
            foreach($arrConfig as $k=>$config){
                $this->$k = $config;
            }
        }
    }

    public function setConf($arrConf=array()){
        if($arrConf){
            foreach($arrConf as $k=>$config){
                $this->$k = $config;
            }
        }
    }

    public function getConf($key){
        return $this->$key;
    }


    public function assign($arr){
        if($arr){
            foreach($arr as $k=>$v){
                $this->var[$k] = $v;
            }
        }
    }

    public function show($file){
        $this->tempFile = $this->templateDir.$file.$this->templateSuffix;
        if( ! is_file($this->tempFile)){
            die('template file is not found');
        }
        ##compiled file
        $this->compileFile = $this->compileDir.md5($file).'.php';
        extract($this->var);
        if( ! is_file($this->compileFile)){
            ob_start();
            require($this->tempFile);
            $str = ob_get_contents();
            ob_clean();
            file_put_contents($this->compileFile,$str);
        }
        ##template file is exist
        require $this->compileFile ;
    }



}