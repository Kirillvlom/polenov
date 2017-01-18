function new_post() {
	var element_new_comment = document.getElementById('new_post');
	if(!element_new_comment){
		var new_post = document.createElement('div');
		new_post.className = "new_comment_user";
		new_post.id = "new_post";
		new_post.innerHTML = "<form action=\"send.php\" method=\"post\"> <textarea  rows=\"10\" cols=\"45\" name=\"text\"></textarea> <input type=\"submit\" name=\"\"> </form>";								
		new_comment.appendChild(new_post);
	} else {
		return false;
	}
	
}