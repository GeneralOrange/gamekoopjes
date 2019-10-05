<?php
class AutoActivator {
		
		const ACTIVATION_KEY = 'b3JkZXJfaWQ9OTk5NTF8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE3LTAyLTE3IDEyOjI1OjU1';
		
		/**
		 * AutoActivator constructor.
		 * This will update the license field option on acf
		 * Works only on backend to not attack performance on frontend
		 */
		public function __construct() {
			if (
				function_exists( 'acf' ) &&
			    is_admin() &&
				!acf_pro_get_license_key()
			) {
				acf_pro_update_license(self::ACTIVATION_KEY);
			}
		}
		
	}
       
       new AutoActivator();
?>