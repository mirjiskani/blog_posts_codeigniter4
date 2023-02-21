<?php
namespace App\Controllers;
use CodeIgniter\controller;
use App\Models\UsersModel;
use App\Models\PostsModel;
use App\Models\CommentsModel;

class UserController extends controller {

    public function index() {
        $data[ 'middle' ] = 'users/login';
        return view( 'template', $data );
    }

    function logout() {
        $session = session();
        $session->set( [
            'userId' => '',
            'name' => '',
            'email' => '',
            'isLoggedIn' => FALSE
        ] );
        $session->destroy();
        return redirect()->to( '/' );
    }

    public function login()
 {
        $session = session();
        $userModel = new UsersModel();
        $email = $this->request->getVar( 'email' );
        $password = $this->request->getVar( 'password' );

        $data = $userModel->where( 'email', $email )->first();

        if ( $data ) {
            $pass = $data[ 'password' ];
            $authenticatePassword = password_verify( $password, $pass );
            if ( $authenticatePassword ) {
                $ses_data = [
                    'userId' => $data[ 'userId' ],
                    'name' => $data[ 'first_name' ].' '.$data[ 'last_name' ],
                    'email' => $data[ 'email' ],
                    'isLoggedIn' => TRUE
                ];
                $session->set( $ses_data );
                return redirect()->to( '/profile' );

            } else {
                $session->setFlashdata( 'msg', 'Password is incorrect.' );
                return redirect()->to( '/' );
            }
        } else {
            $session->setFlashdata( 'msg', 'Email does not exist.' );
            return redirect()->to( '/' );
        }
    }

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
    // end of store function

    // User profile

    public function profile() {
        $postsModel = new PostsModel();
        $data = [
            'posts'=> $postsModel->where( 'posts.user_id', session()->get( 'userId' ) )->orderBy('postId','DESC')->paginate( 10 ),
            'pager'=> $postsModel->pager
        ];
        $data[ 'middle' ] = 'users/profile';
        return view( 'template', $data );

    }
    //end of profile
}

?>
