<?php
/**
*  Disable PMPro Member Email by Level
* The function below will disable email sent by PMPro by level –
* in this case, level 1. You can change the level ID in the code to your level
* ID on line 25
*
* title: Disable PMPro Member Email by Level
* layout: snippet
* collection: email
* category: disable, levels
* link: https://www.paidmembershipspro.com/disable-emails-member-user-admin/
*
* You can add this recipe to your site by creating a custom plugin
* or using the Code Snippets plugin available for free in the WordPress repository.
* Read this companion article for step-by-step directions on either method.
* https://www.paidmembershipspro.com/create-a-plugin-for-pmpro-customizations/
*/

 function my_pmpro_disable_member_emails($recipient, $email)
 {
     $user = get_user_by('login', $email->data['user_login']);
     $level = pmpro_getMembershipLevelForUser($user->ID);
     
     if(!empty($level) && !empty($level->id) && $level->id == 1) //disable emails to level 1 only
           $recipient = NULL;	
     
     return $recipient;
 }
 add_filter("pmpro_email_recipient", "my_pmpro_disable_member_emails", 10, 2);