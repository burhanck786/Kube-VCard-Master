<?php

if( !class_exists( 'KubeVcard' ) ){
	class KubeVcard {
		function __construct() {
			add_action('bp_before_member_header_meta',[ $this , 'kube_add_vcard_download_button']);
		}

		public function kube_add_vcard_download_button()
		{
			echo bp_displayed_user_id();

			echo '<pre>'; print_r( bp_get_member_profile_data() ); echo '</pre>';
			
		}

	}

	new KubeVcard();
}