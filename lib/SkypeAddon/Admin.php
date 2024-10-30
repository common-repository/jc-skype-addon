<?php
class SkypeAddon_Admin
{
    
    public function __construct() {
        add_action('admin_menu', array($this, 'menu'));
    }
    
    /**
     * Register the Menu.
     */
    public function menu() {
        add_menu_page('Skype Addon Settings', 'Skype Addon Settings', 'administrator', plugin_basename(SkypeAddon::FILE), array($this, 'addskype'));
    }
    
    public function addskype() {
        if (isset($_POST['action'])) {
            $options = get_option(SkypeAddon::OPTION_KEY . '_skype', array());
            $data['skype_id'] = $_POST['skype_id'];
            $data['skype_option'] = $_POST['skype_option'];
            $data['image_size'] = $_POST['image_size'];
            $options = $data;
            update_option(SkypeAddon::OPTION_KEY . '_skype', $options);
            $this->addMessage('Skype setting is saved successfully', 'success');
        }
        
        $templates = get_option(SkypeAddon::OPTION_KEY, array());
        
        $queryArgs = array('page' => plugin_basename(SkypeAddon::FILE) . '-addskype',);
        
        $data = array('queryArgs' => $queryArgs, 'baseUrl' => admin_url('/admin.php'), 'templates' => $templates, 'result' => get_option(SkypeAddon::OPTION_KEY . '_skype', array()));
        echo SkypeAddon_View::render('admin_addskype', $data);
    }
    
    private function addMessage($msg, $type = 'success') {
        if ($type == 'success') {
            printf("<div class='updated'><p><strong>%s</strong></p></div>", $msg);
        } else {
            printf("<div class='error'><p><strong>%s</strong></p></div>", $msg);
        }
    }
    
    private function redirectUrl($url) {
        echo '<script>';
        echo 'window.location.href="' . $url . '"';
        echo '</script>';
    }
}
?>
