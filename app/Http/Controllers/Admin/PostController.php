<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\PostService;
use App\Models\Post;
use Auth;


class PostController extends Controller
{

	private $postservice;

	public function __construct(PostService $postservice)
	{
		$this->postservice = $postservice;
	}

	/**
	 * show
	 * 
	 */
    public function show()
    {
    	$listPost = $this->postservice->getAllPost();
    	return view('admin.post.list_post', compact('listPost'));
    }

    /**
     * add post
     */
    public function add()
    {
    	return view('admin.post.add_post');
    }

    /**
     * save post
     * @param  Request $request
     * @return 
     */
    public function save(Request $request)
    {
    	$data = $request->only('title', 'content', 'status');
    	$data['user_id'] =Auth::user()->id;
    	$listPost =$this->postservice->getSavePost($data);
    	return redirect()->route('show-post');
    }

    /**
     * edit post
     * @param  int $id
     * @return 
     */
    public function edit($id)
    {
    	$editPost = $this->postservice->getEditPost($id);
    	return view('admin.post.edit_post', compact('editPost'));
    }

    /**
     * update post
     * @param  Request $request
     * @param  int  $id
     * @return [type]
     */
    public function update(Request $request, $id )
    {
    	$data =$request->only('title', 'content', 'status');
    	if(empty($data['status'])){
    		$data['status'] =config('constant.inactive');
    	}
    	$data['user_id'] =Auth::user()->id;
    	$this->postservice->getUpdatePost($id, $data);
    	return redirect()->route('show-post');
    }

    /**
     * delete post
     * @param  int $id 
     * @return view
     */
    public function delete($id)
    {
    	$this->postservice->getDeletePost($id);
    	return redirect()->route('show-post');
    }

    /**
     * search post
     * @param  Request $request
     * @return array
     */
    public function search(Request $request)
    {
    	$keyword = $request->keyword;
    	$selectpost = $request->selectpost;
    	$this->postservice->getSearchPost($keyword, $selectpost);
    	return view('admin.post.list_post', compact('listPost', 'selectpost', 'keyword'));
    }
}
