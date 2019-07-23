//handling forms actions
document.addEventListener('click', event => {

    let target = event.target.id;
    var replyHolder;

    switch (target) {

        case 'follow':

            event.preventDefault();
            const follow_user_id = event.target.getAttribute('href');

            follow(follow_user_id).then(() => {
                event.target.id = 'unfollow';
                event.target.innerHTML = 'Unfollow';
            });

            break;

        case 'unfollow':

            event.preventDefault();
            const unfollow_user_id = event.target.getAttribute('href');

            unFollow(unfollow_user_id).then(() => {
                event.target.id = 'follow';
                event.target.innerHTML = 'Follow';
            });

            break;

        case 'status':

            event.preventDefault();
            
            const postUrl = document.getElementById('form').getAttribute('action');
            const postData = document.getElementById('form').elements.namedItem('post').value;

            post(postUrl, postData).then(() => {

                fetchPosts().then(response => {
                
                document.querySelector('.px-5').innerHTML = response.html;
            });
            /* const parent = document.getElementById('newsfeed-items-grid');
            parent.insertAdjacentHTML('afterbegin', newElement); */
            });
            break;

        case 'commentPost':

            event.preventDefault();

            const commentHolder = event.target.parentElement.parentElement.children[6];
            const commentData = event.target.parentElement.elements.namedItem('comment').value;
            const commentUrl = event.target.parentElement.getAttribute('action');
            
            commentPost(commentUrl, commentData).then(response => {
                
                const newList = document.createElement('LI');
                newList.className = 'comment-item';
                const commentItem =    `
                                            <div class="post__author author vcard inline-items">
                                                <img src="{{asset('public/img/author-page.jpg')}}" alt="author">
                                            
                                                <div class="author-date">
                                                <a class="h6 post__author-name fn" href="02-ProfilePage.html"> ${response.username} </a>
                                                    <div class="post__date">
                                                        <time class="published" datetime="2004-07-24T18:18">
                                                            38 mins ago
                                                        </time>
                                                    </div>
                                                </div>
                                    
                                                <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                                    
                                            </div>
                                    
                                            <p class="comment-body"> ${response.comment.body} </p>
                                    
                                            <a href="#" class="post-add-icon inline-items">
                                                <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                                <span>3</span>
                                            </a>
                                            <a href="#" data-target="#reply-to-a-comment" data-toggle="modal" class="reply">Reply</a>
                                    `;
                
                newList.innerHTML = commentItem;                    
                commentHolder.insertBefore(newList, commentHolder.children[0]);
            });

            break;

            // Reply button on the comment that sends the comment id to this part
            case 'reply':

                event.preventDefault();

                replyHolder = event.target.parentElement.parentElement.children[1].id;
                setReplyHolder(replyHolder);
                
                break;
            
            // Reply button on the reply form that posts the reply to the database
            case 'replyPost':

                event.preventDefault();
                
                const replyData = event.target.parentElement.elements.namedItem('reply').value;
                const replyUrl = event.target.parentElement.getAttribute('action');
                
                replyPost(replyUrl, replyData).then(response => {
                    
                    const newList = document.createElement('LI');
                    newList.className = 'reply-item';
                    const replyItem =    `
                                                <div class="post__author author vcard inline-items">
                                                    <img src="{{asset('public/img/author-page.jpg')}}" alt="author">
                                                
                                                    <div class="author-date">
                                                    <a class="h6 post__author-name fn" href="02-ProfilePage.html"> ${response.username} </a>
                                                        <div class="post__date">
                                                            <time class="published" datetime="2004-07-24T18:18">
                                                                38 mins ago
                                                            </time>
                                                        </div>
                                                    </div>
                                        
                                                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                                        
                                                </div>
                                        
                                                <p class="comment-body"> ${response.reply.body} </p>
                                        
                                                <a href="#" class="post-add-icon inline-items">
                                                    <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                                    <span>3</span>
                                                </a>
                                                <a href="#" data-target="#reply-to-a-comment" data-toggle="modal" class="reply">Reply</a>
                                        `;
                    
                    newList.innerHTML = replyItem;

                    const id = getReplyHolder();
                    replyHolder = document.getElementById(id);

                    replyHolder.insertBefore(newList, replyHolder.children[0]);
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

// Posting reply to the database using Ajax
async function replyPost(url, replyData) 
{
    try {
         const response = await axios.post(url, {
            data: {reply: replyData}    
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

async function follow(user_id)
{
    try {
        const response = await axios.get(`http://localhost/medyApp/follow/${user_id}`);
        if(response) {
            return true;
        }
    }
    catch(error) {
        console.log(error.response.data);
        console.log(error.response.data);
    }
}

async function unFollow(user_id)
{
    try {
        const response = await axios.get(`http://localhost/medyApp/unfollow/${user_id}`);
        if(response) {
            return true;
        }
    }
    catch(error) {
        console.log(error.response.data);
        console.log(error.response.data);
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

function setReplyHolder(value) {
    replyHolder = value;
    return true;
}

function getReplyHolder() {
    return replyHolder;
}

