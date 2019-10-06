<?php

	/**
	 * @package		Website bán hàng online
	 * @author 		TeamPBDK
	 * @email 		nguyenkhanh97nd@gmail.com
	 * @copyright 	Copyright (c) 2017
	 * @since 		Version 1.0
	 * @filesource 	site/controllers/user.php
	 */
	
	require('containers/site/models/user.php');
	class UserController extends UserModel{


		public function index(){

			if( !isset($_SESSION['user']) ){
				require('containers/site/views/user/login.php');
			}
			else{

				//CART USER
				$cart = parent::user_order($_SESSION['user']);


				require('containers/site/views/user/index.php');
			}






		}


		public function login(){

			if(!isset($_SESSION['user'])){

				if(!empty($_POST)){

					if($_POST['username'] == NULL || $_POST['password'] == NULL){
						echo "<script>alert('Không được để trống')</script>";
						require('containers/site/views/user/login.php');
					}
					else{
						$user = array(
							'username' => $_POST['username'],
							'password' => md5($_POST['password'])
						);

						$check = parent::check_login($user);

						if($check == FALSE){

							echo "<script>alert('Sai tài khoản hoặc mật khẩu')</script>";
							require('containers/site/views/user/login.php');

						}
						else{

							echo "<script>alert('Đăng nhập thành công')</script>";
							$_SESSION['user'] = $check;
							echo "<script>window.location.href='..'</script>";

						}
					}


				}
				else{
					require('containers/site/views/user/login.php');
				}

				

			}
			else{
				header("Location: ..");
			}

		}



		public function register(){

			
			if(isset($_SESSION['user'])){

				header('Location: .');

			}

			else{

					if(!empty($_POST)){

						//neu ton tai $_POST

						if( $_POST['username'] == NULL || $_POST['password'] == NULL || $_POST['address'] == NULL || $_POST['phone'] == NULL || $_POST['email'] == NULL || $_POST['name'] == NULL ){

							require('containers/site/views/user/register.php');

						}
						else{
							$user = array(
								'username' => $_POST['username'],
								'password' => md5($_POST['password']),
								'address'  => $_POST['address'],
								'phone'    => $_POST['phone'],
								'email'	   => $_POST['email'],
								'name'     => $_POST['name'],
								'level'	   => 0,
							);

							parent::save_user($user);

							$_SESSION['user'] = $user;

							echo "<script>alert('Đăng ký thành công')</script>";
							require('containers/site/views/home/index.php');

						}


					
					}
					else{
						
						require('containers/site/views/user/register.php');
	
					}

				
			}
			

		}

		public function logout(){

			if(isset($_SESSION['user'])){
				unset($_SESSION['user']);
				header("Location: {$_SERVER['HTTP_REFERER']}");
			}
			else{
				header("Location: {$_SERVER['HTTP_REFERER']}");
			}

		}

	}