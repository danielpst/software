 <div class="container">
    <?php if( ! isset($on_hold_message)){
     echo ' 
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="'.base_url().'img/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            

                ';
                echo form_open($login_url,['class'=>'std-form']);
                       
                    if( isset($login_error_mesg)){
                       echo' 
                        <div class="alert alert-danger" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span> Intento: '.  
                             $this->authentication->login_errors_count. ' de ' .config_item('max_allowed_attempts'). ' permitidos; Username, Email or Password Invalidos.
                        </div>
                            ';
                    }
			
	?>
                <span id="reauth-email" class="reauth-email"></span>
                <input class="form-control" placeholder="Usuario" name="login_string" id="login_string" type="text" value="" autocomplete="off" autofocus="" required>
                <input class="form-control" placeholder="Contraseña" name="login_pass" id="login_pass" type="password" value="" autocomplete="off" required <?php
                if(config_item('max_chars_for_password') >0)
                    echo 'maxlength="'.config_item ('max_chars_for_password').'"';
                ?>autocomplete="off" readonly="readonly" onfocus="this.removeAttribute('readonly');" />
                <?php
                    if(config_item('allow_remember_me')){
                        
                    
                 ?>
                <br />

			<label for="remember_me" class="form_label">Remember Me</label>
			<input type="checkbox" id="remember_me" name="remember_me" value="yes" />
                 <?php
                    }
                 ?>   
                        <p>
                                <?php
                                    $link_protocol = USE_SSL ? 'https' : NULL;
                            ?>
                            <a href="<?php echo site_url('test/recover', $link_protocol); ?>">
                                    No puedes acceder a tu cuenta?
                            </a>
                        </p>
                            
                <button type="submit" class="btn btn-lg btn-success btn-block btn-signin" name="submit" id="submit_buitton">Iniciar Sesi&oacute;n</button>
            </form><!-- /form -->
    <?php
        }
        else
        {
            echo ' 
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                    <p>
					Excessive Login Attempts
				</p>
				<p>
					You have exceeded the maximum number of failed login<br />
					attempts that this website will allow.
				<p>
				<p>
					Your access to login and account recovery has been blocked for ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes.
				</p>
				<p>
					Please use the <a href="/test/recover">Account Recovery</a> after ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes has passed,<br />
					or contact us if you require assistance gaining access to your account.
				</p>
            </div>
            ';
        }
          
            ?>
        </div><!-- /card-container -->
    </div><!-- /container -->



