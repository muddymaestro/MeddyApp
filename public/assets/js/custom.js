//handling forms actions
document.addEventListener('click', event => {

    let target = event.target.id;

    switch (target) {

        case 'status':
            event.preventDefault();
            
            const postUrl = document.getElementById('form').getAttribute('action');
            const postData = document.getElementById('form').elements.namedItem('post').value;

            post(postUrl, postData).then(data => {

                fetchPosts().then(response => {
                
                document.querySelector('.px-5').innerHTML = response.html;
            });
            /* const parent = document.getElementById('newsfeed-items-grid');
            parent.insertAdjacentHTML('afterbegin', newElement); */
            });
            break;

        case 'commentPost':
            event.preventDefault();
        
            const commentUrl = document.getElementById('comment-form').getAttribute('action');
            const commentData = document.getElementById('comment-form').elements.namedItem('comment').value;

            commentPost(commentUrl, commentData).then(response => {
                console.log(response);
                document.querySelector('.comment').innerHTML = response.comment.body;
            });

            break;

        case 'like':
            event.preventDefault();
            let post_id = event.target.getAttribute('value');

            likePost(post_id).then(response => {

                if(response.post_like){
                    event.target.id = 'unlike';
                    event.target.innerHTML = 'Unlike';

                    getLikesCount(post_id).then(response => {
                        
                        let likeClass = event.target.parentElement.parentElement.children[3].children[0].children[1];
                        
                        if(response.likesCount > 1){
                            likeClass.innerHTML = `${response.likesCount} Likes`;
                        }
                        else if(response.likesCount <= 1){
                                likeClass.innerHTML = `${response.likesCount} Like`;
                        }
                    });
                }
            });
            break;

        case 'unlike':
            event.preventDefault();
            let post_ID = event.target.getAttribute('value');

            unlikePost(post_ID).then(response => {

                if(response.post_unlike){
                    event.target.id = 'like';
                    event.target.innerHTML = 'like';

                    getLikesCount(post_ID).then(response => {

                        let likeClass = event.target.parentElement.parentElement.children[3].children[0].children[1];
                        
                        if(response.likesCount > 1){
                            likeClass.innerHTML = `${response.likesCount} Likes`;
                        }
                        else if(response.likesCount <= 1){
                                likeClass.innerHTML = `${response.likesCount} Like`;
                        }
                    });
                }
            });
            break;

        case 'comment':
            event.preventDefault();
    
            const form = event.target.parentNode.parentNode.children[4];
            const comment = event.target.parentNode.parentNode.children[6];
            
            //showing and hiding comment form
            if (form.style.display === "none") {
                form.style.display = "block";
            }
                else {
                form.style.display = "none";
            }
    
            //showing and hiding comments list
            if (comment.style.display === "none") {
                comment.style.display = "block";
            }
                else {
                comment.style.display = "none";
            }

            break;

        case 'unread':
            event.preventDefault();
            markNotificationAsRead();
            break;
    
        default:
            break;
    }

});

// Posting post-data to the database using Ajax
async function post(url, postData) 
{
    try {
         const response = await axios.post(url, {
            data: {post: postData}    
        });

        if(response.status === 200){
            return true;
        } 
        
    } catch (error) {
        console.log(error.response.data);
        console.log(error.response.status);
    }
}

// Posting comment to the database using Ajax
async function commentPost(url, commentData) 
{
    try {
         const response = await axios.post(url, {
            data: {comment: commentData}    
        });
        return response.data;

    } catch (error) {
        console.log(error.response.data);
        console.log(error.response.status);
    }
}

async function fetchPosts()
{
    try {
        const response = await axios.get('http://localhost/medyApp/posts');
        return response.data;
    
    } catch(error) {
        console.log(error.response.data);
        console.log(error.response.status);
    } 
}

async function fetchComments()
{
    try {
        const response = await axios.get('http://localhost/medyApp/comments');
        return response.data;
    
    } catch(error) {
        console.log(error.response.data);
        console.log(error.response.status);
    } 
}

async function likePost(post_id)
{
    try {
        const response = await axios.get(`http://localhost/medyApp/like_post/${post_id}`);
        return response.data;
    
    } catch(error) {
        console.log(error.response.data);
        console.log(error.response.status);
    } 
}

async function unlikePost(post_id)
{
    try {
        const response = await axios.get(`http://localhost/medyApp/unlike_post/${post_id}`);
        return response.data;
    
    } catch(error) {
        console.log(error.response.data);
        console.log(error.response.status);
    } 
}

async function getLikesCount(post_id)
{
    try {
        const response = await axios.get(`http://localhost/medyApp/post-likes-count/${post_id}`);
        return response.data;
    }
    catch(error) {
        console.log(error.response.data);
        console.log(error.response.data);
    }
}

async function markNotificationAsRead()
{
    try {
        const response = await axios.get('http://localhost/medyApp/markAsRead');
        response.data;
    }
    catch(error) {
        console.log(error.response.data);
        console.log(error.response.data);
    }
}


