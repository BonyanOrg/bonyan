<?php  
/**
 * Check User Role
 */
function check_user_role($roles)
{

	if (is_user_logged_in()) { /*@ Check user logged-in */

		$user = wp_get_current_user();  /*@ Get current logged-in user data */

		$currentUserRoles = $user->roles; /*@ Fetch only roles */

		$isMatching = array_intersect($currentUserRoles, $roles);/*@ Intersect both array to check any matching value */
		$response = false;

		if (!empty($isMatching)) { /*@ If any role matched then return true */
			$response = true;
		}
		return $response;
	}
}