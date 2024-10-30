<div class="wrap">
    <div id="icon-options-general" class="icon32"><br /></div>
    <h2>Skype Settings</h2>
<br/>

<form action="" method="post">
    <table>
    <tr>
        <td width="190"> Skype ID:</td> 
        <td><input type="text" name="skype_id" id="skype_id" value="<?php echo $result['skype_id']; ?>"/></td>
    </tr>
    <tr>
        <td width="190"> Choose your skype option:</td> 
        <td>
        <label for="call"><input type="checkbox" name="skype_option[]" <?php if(in_array('call',$result['skype_option']))echo 'checked="checked"'; ?> value="call">Voice</label>
        <label for="chat"><input type="checkbox" name="skype_option[]" <?php if(in_array('chat',$result['skype_option']))echo 'checked="checked"'; ?> value="chat">Chat</label>
        </td>
    </tr>

    <tr>
        <td width="190">Image Size:</td> 
        <td><input type="text" name="image_size" id="image_size" value="<?php if($result['image_size'])echo $result['image_size'];else echo '32'; ?>"/>px</td>
    </tr>

    <tr>
        <td width="190" style="text-align:left;">
            <input type="hidden" name="action" value="addskype">
            <input type="submit" class="button button-primary button-large" name="submit" value="Submit">
        </td>     
    </tr>

    </table>
    <br/>
    <p>Use the shortcode <b style="color:red">  [jc-skype-addon]  </b> anywhere on the page, post to get the skype addon into action.</p>
    <p> To use the shortcode directly on theme file for eg. in header.php use place the following code 
        <?php  highlight_string("<?php echo do_shortcode['jc-skype-addon']; ?>");?>
    </p>
</form>
</div>


<div class="donate" style="margin-top: 40px;margin-right:30px;float:right;">
<p style="font-weight: bold;">Donate and help us keep going on</p>
    <form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
    <input type="hidden" name="pay_to_email" value="obsession.raj@gmail.com" />
    <input type="hidden" name="language" value="EN" />
    <select name="currency" size="1">
    <option value="USD">US dollar</option>
    </select>
    Amount:<input type="text" name="amount" value="2.00" size="10" />
    <p><input type="image" alt="click to make a donation to help us continue" value="Donate!" height="80" src="<?php echo plugins_url(); ?>/jc-skype-addon/images/donate.jpg" width="150" /></p>
    <input type="hidden" name="detail1_description" value="donation to contributer rajiv-jyasha" />
    <input type="hidden" name="detail1_text" value="donation to contributer rajiv-jyasha" />
</form>
</div>

