<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 16:27
 */

namespace Config;


use Exception\BaseException;

class ConfigRegistry
{
    /**
     * @var array
     */
    private $configs;

    /**
     * @var string
     */
    private $configPath;

    public function __construct($configPath)
    {
        $this->configPath = $configPath;
    }

    /**
     * TODO:
     * @param $config
     * @return mixed
     */
    public function get($config){
        if(!isset($this->configPath[$config])) {
            //$config->get('routes')
            $fullConfigPath = $this->configPath . DIRECTORY_SEPARATOR . $config . '.php';
            if (file_exists($fullConfigPath)) {
                //TODO: Обработка ошибок
                $this->configs[$config] = include $fullConfigPath;
            }else{
                throw new BaseException(sprintf("File %s not exists", $fullConfigPath));
            }
        }

        return $this->configs[$config];
    }
}