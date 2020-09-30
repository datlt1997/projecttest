<?php 

namespace App\Services\Admin;

use App\Models\Post;

class PostService {

	/**
	 * getAllPost
	 * @return srray
	 */
	public function getAllPost()
	{
		return Post::paginate(config('constant.paginate'));
	}

	/**
	 * getSavePost
	 * @param  array $data
	 * @return array
	 */
	public function getSavePost($data)
	{
		return Post::create($data);
	}

	/**
	 * get Edit post
	 * @param  int $id
	 * @return array
	 */
	public function getEditPost($id)
	{
		return Post::find($id);
	}

	/**
	 * getUpdatePost
	 * @param  string $data
	 * @return array
	 */
	public function getUpdatePost($id, $data)
	{
		return Post::find($id)->update($data);
	}
	/**
	 * get delete post
	 * @param  int $id
	 * @return array
	 */
	public function getDeletePost($id)
	{
		Post::destroy($id);
	}
	/**
	 * get search post
	 * @param  string $keyword
	 * @param  string $selectpost
	 * @return array
	 */
	public function getSearchPost($keyword, $selectpost)
	{
		$post = Post::keywordpost($keyword);
		if(!is_null($selectpost)) {
			$post = $post->selectpost($selectpost);
		} 
		$post = $post->paginate(config('constant.paginate'));
		return $post;
	}

	public function getChangeStatus($id)
	{
		if(Post::find($id)->status == config('constant.active')) {
			$data['status'] = config('constant.inactive');
		} else {
			$data['status'] = config('constant.active');
		}
		Post::find($id)->update($data);
	}

}
?>