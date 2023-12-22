<?php
class setup_helper{

		public static function setup(){
            $package_setup = array(
                'hostname'						=> 'localhost:3306',
                'username'						=> 'root',
                'password'						=> '',
                'database'						=> 'startwin',
			);
			return $package_setup;
		}

}
?>