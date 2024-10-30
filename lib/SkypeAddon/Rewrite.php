<?php
class SkypeAddon_Rewrite
{
    
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'theme_name_scripts'));
        
        add_action('parse_request', array(&$this, 'replace_content'));
    }
    
    public function theme_name_scripts() {
        wp_enqueue_script('skypejs', 'http://www.skypeassets.com/i/scom/js/skype-uri.js');
    }
    
    public function replace_content(&$wp) {
        add_shortcode('jc-skype-addon', array($this, 'filter_content'));
    }
    
    public function filter_content() {
        $skype = get_option(SkypeAddon::OPTION_KEY . '_skype', array());
        $rand = rand(0, 999999);
                
        //getting unique skype button
        $replace = '<div id="' . $rand . 'SkypeButton_Call_'.$skype['skype_id'].'_1">';
        $replace.= '<script type="text/javascript">';
        $replace.= 'Skype.ui({';
        if(count($skype['skype_option'])>1){    
            $replace.= '"name": "dropdown",';
        }elseif($skype['skype_option'][0] == 'call'){
            $replace.= '"name": "call",';    
        }elseif($skype['skype_option'][0] == 'chat'){
            $replace.= '"name": "chat",';    
        }    
        $replace.= '"element": "' . $rand . 'SkypeButton_Call_'.$skype['skype_id'].'_1",';
        $replace.= '"participants": ["'.$skype['skype_id'].'"],';
        $replace.= '"imageSize": '.$skype['image_size'];
        $replace.= '});';
        $replace.= '</script>';
        $replace.= '</div>';
        return $replace;
    }
}
