//to disable user copy paste below code
update_user_meta( User ID, 'user_active_status', sanitize_text_field( 'no' ) ); // replace User Id with your user id


//and after that copy pase below code in theme function.php or in child theme function.php
add_filter( 'authenticate', 'check_active_user',100,2);
function check_active_user ($user,$username){
 $user_data = $user->data;
 $user_id = $user_data->ID;
 $user_sts = get_user_meta($user_id,"user_active_status",true);
 if ($user_sts==="no"){
	return new WP_Error( 'disabled_account','Account is disabled, Please contact Administrator for the same'); // here you can change message with your own message you want to display when diable user try to login

 }else{
   return $user;
 }
	return $user;
}
