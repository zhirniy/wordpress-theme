<?php

class ZhTheme
{
    private function actionEnqueueScripts($function)
    {
        add_action('wp_enqueue_scripts', function() use ($function){
            $function();
        });
    }

    public function addStyle($handle,  $src = '',  $deps = array(), $ver = false, $media = 'all')
    {
        $this->actionEnqueueScripts(function() use ($handle, $src, $deps, $ver, $media){
            wp_enqueue_style($handle,  $src,  $deps, $ver, $media);
        });
        return $this;
    }

    public function addScript($handle,  $src = '',  $deps = array(), $ver = false, $in_footer = false)
    {
        $this->actionEnqueueScripts(function() use ($handle, $src, $deps, $ver, $in_footer){
            wp_enqueue_script($handle,  $src,  $deps, $ver, $in_footer);
        });
        return $this;
    }

    private function actionAfterSetup($function)
    {
        add_action('after_setup_theme', function() use ($function) {
            $function();
        });
    }

    private function addSupportWithoutParams($option)
    {
        add_theme_support($option);
    }

    private function addSupportWithParams($option, array $place)
    {
        add_theme_support($option, $place);
    }

    public function addSupport($option, array $place = null)
    {
        $this->actionAfterSetup(function() use ($option, $place) {
            if($place){
                $this->addSupportWithParams($option, $place);
            }else{
                $this->addSupportWithoutParams($option);
            }
        });
        return $this;
    }

    public function addNavMenus($locations = array())
    {
        $this->actionAfterSetup(function() use ($locations){
            register_nav_menus($locations);
        });
    }

}