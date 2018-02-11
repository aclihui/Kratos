<?php

function validdomain($login,$email,$errors){
    $validDomains = explode("\r\n",kratos_option('dwhite'));
    $invalidDomains = explode("\r\n",kratos_option('dblack'));
    if(kratos_option('dmode')=='black'){
        $isValidEmailDomain = true;
        foreach($invalidDomains as $badDomain){
          if(!empty( $badDomain)){
            $domainLength = strlen($badDomain);
            $emailDomain = strtolower(substr($email,-($domainLength),$domainLength));
            if($emailDomain==strtolower($badDomain)){
              $isValidEmailDomain = false;
              break;
            }
          }
        }
    }else{
        $isValidEmailDomain = false;
        foreach($validDomains as $domain){
          if(!empty($domain)){
            $domainLength = strlen($domain);
            $emailDomain = strtolower(substr($email,-($domainLength),$domainLength));
            if($emailDomain==strtolower($domain)){
              $isValidEmailDomain = true;
              break;
            }
          }
        }
    }
    if($isValidEmailDomain===false) $errors->add('domain_error','<strong>错误</strong>: '.kratos_option('derror'));
}
add_action('register_post','validdomain',10,3);

