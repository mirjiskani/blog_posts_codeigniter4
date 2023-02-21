<?php
namespace App\Controllers;
use CodeIgniter\controller;
use App\Models\PostsModel;
use App\Models\CommentsModel;

class PostController extends controller {

    // listing of all posts

    public function index() {
        $postsModel = new PostsModel();
        $data = [
            'posts'=> $postsModel->orderBy( 'postId', 'DESC' )->paginate( 10 ),
            'pager'=> $postsModel->pager
        ];
        $data[ 'middle' ] = 'posts/listing';
        return view( 'template', $data );
    }
    // end of index function

    //Load post page

    public function create() {
        $data[ 'middle' ] = 'posts/create-post';
        return view( 'template', $data );
    }
    // save post

    public function store() {
        helper( [ 'form' ] );
        $rules = [
            'title'          => 'required|min_length[5]|max_length[255]',
            'description'     => 'required|min_length[5]',
        ];
        if ( $this->validate( $rules ) ) {
            $postsModel = new PostsModel();
            $data = [
                'post_title'     => $this->request->getVar( 'title' ),
                'postContent'     => $this->request->getVar( 'description' ),
                'user_id' => session()->get( 'userId' ),
                'status' => 1
            ];
            $postsModel->save( $data );
            $data[ 'success' ] = 'Post created succesfully';
            $data[ 'middle' ] = 'posts/create-post';
            return view( 'template', $data );

        } else {
            $data[ 'validation' ] = $this->validator;
            $data[ 'middle' ] = 'posts/create-post';
            return view( 'template', $data );
        }
    }

    public function postDetail( $postId ) {
        $postsModel = new PostsModel();
        $commentsModel = new CommentsModel();
        $data = [
            'post'=> $postsModel->where( 'postId', $postId )->first(),
            'comments'=> $commentsModel->where( 'post_id', $postId )->join( 'users', 'users.userId = comments.user_id' )->paginate( 10 ),
            'pager'=> $commentsModel->pager
        ];
        $data[ 'middle' ] = 'posts/PostDetail';
        return view( 'template', $data );
    }
    //end of postDetail
    //post a comment against post

    public function postComment() {
        $commentsModel = new CommentsModel();
        $data = [
            'post_id' => $this->request->getVar( 'postId' ),
            'user_id' => session()->get( 'userId' ),
            'comment' => $this->request->getVar( 'comment' ),
        ];
        if ( $commentsModel->save( $data ) ) {
            $responseData[ 'message' ] = 'Comment created Successfully';
            $responseData[ 'code' ] = 200;
            return json_encode( $responseData );
        } else {
            $responseData[ 'message' ] = 'Comment created failed';
            $responseData[ 'code' ] = 301;
            return json_encode( $responseData );
        }
    }
    //end of post comment
}