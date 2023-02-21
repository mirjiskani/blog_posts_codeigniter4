<?php
namespace App\Controllers;
use CodeIgniter\controller;
use Config\Database;
use App\Models\UsersModel;

class SignupController extends controller {

    // Load user registration form

    public function signup() {
        $data[ 'middle' ] = 'users/signup';
        return view( 'template', $data );
    }

    // create user registration

    public function store() {
        helper( [ 'form' ] );
        $rules = [
            'first_name'          => 'required|min_length[2]|max_length[50]',
            'last_name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirm_password'  => 'matches[password]'
        ];

        if ( $this->validate( $rules ) ) {
            $userModel = new UsersModel();
            $data = [
                'first_name'     => $this->request->getVar( 'first_name' ),
                'last_name'     => $this->request->getVar( 'last_name' ),
                'email'    => $this->request->getVar( 'email' ),
                'password' => password_hash( $this->request->getVar( 'password' ), PASSWORD_DEFAULT )
            ];
            $userModel->save( $data );
            $data[ 'success' ] = 'User registered succesfully';
            $data[ 'middle' ] = 'users/signup';
            return view( 'template', $data );

        } else {
            $data[ 'validation' ] = $this->validator;
            $data[ 'middle' ] = 'users/signup';
            return view( 'template', $data );
        }
    }
}
?>