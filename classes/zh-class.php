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

}