<?php

class CommentController extends Controller {

	function browseComment() {
		$comment = new Comment();
		$data['comments'] = $comment->getComment();

		$this->view('browse-comment', $data);
	}
}