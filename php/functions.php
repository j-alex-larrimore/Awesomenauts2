<?php
require_once 'php/core/init.php';

$state = 0;
$player2;

function newProf(){
    if(Token::check(Input::get('token'))){
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'username' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 20,
                    'unique' => 'users'
                ),
                'password' => array(
                    'required' => true,
                    'min' => 6,
                ),
                'password_again' => array(
                    'required' => true,
                    'matches' => 'password'
                ),
            ));
            if($validation->passed()){

                $user = new User();
                //echo Input::get('username');
                $salt = Hash::salt(32);
                try{

                    $user->create(array(
                        'username' => Input::get('username'),
                        'password' => Hash::make(Input::get('password'), $salt),
                        'salt' => $salt,
                        //'name' => Input::get('name'),
                        'joined' => date('Y-m-d H:i:s'),
                        'group' => 1,
                        'exp' => 0,
                        'exp1' => 0,
                        'exp2' => 0,
                        'exp3' => 0,
                        'exp4' => 0,

                    ));
                     //Session::flash('home', 'You registered successfully!');
                     //Redirect::to('.php');
                    $state = 3; //to use with Javascript
                    $login = $user->login(Input::get('username'), Input::get('password'));
                    $player2 = $user;
                    //echo $user->data()->username;
                    return $user;
                }catch(Exception $e){
                    die($e->getMessage());
                }
            }
            else{
                foreach($validation->errors() as $error){
                    echo $error, '<br>';
                }
            }
        }
}

function playerLoad(){
        if(Token::check(Input::get('token'))){
            $validate = new Validate();
            $validation = $validate->check(array(
                'username' => array('required' => true),
                'password' => array('required' => true)
            ));

            if($validation->passed()){
                $user = new User();

                //$remember = (Input::get('remember') === 'on') ? true : false;
                //$login = $user->login(Input::get('username'), Input::get('password'), $remember);
                $login = $user->login(Input::get('username'), Input::get('password'));


                if($login){
                    $state = 4; //to use with Javascript
                    $player2 = $user;
                    return $player2;
                }
                else{
                    echo 'login fail';
                }
            }
            else{
                foreach($validation->errors() as $error){
                    echo $error, '<br>';
                }
            }

        }
}

function playerSave($old){
    $user = new User();
    $login = $user->login(Input::get('player'), Input::get('pword'));
        try{
                $user->update(array(
                    'EXP' => Input::get('exp'),
                    'EXP1' => Input::get('exp1'),
                    'EXP2' => Input::get('exp2'),
                    'EXP3' => Input::get('exp3'),
                    'EXP4' => Input::get('exp4')
                ));
                return $user;
            }
            catch(Exception $e){
                die($e->getMessage());
            }
}


?>
