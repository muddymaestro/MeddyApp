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

            const statusForm = event.target.parentElement.parentElement;
            const postUrl = statusForm.getAttribute('action');
            const formData = new FormData(statusForm);

            post(postUrl, formData).then(() => {

                fetchPosts().then(response => {
                
                document.querySelector('.px-5').innerHTML = response.html;
                
                // const activityFeed = document.getElementById('widget');
                // const newFeed = document.createElement('LI');
                // const feedItem = `<div class="author-thumb">
                //                         <img src="{{asset('img/avatar52-sm.jpg')}}" alt="author">
                //                     </div>
                //                     <div class="notification-event">
                //                         <a href="#" class="h6 notification-friend">Mohamed Mdoe ${response.feeds[0].type} </a> posted a <a href="#" class="notification-link">status update</a>.
                //                         <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
                //                     </div>
                //                 `;
                // newFeed.innerHTML = feedItem;
                // activityFeed.insertBefore(newFeed, activityFeed.children[0]);
            });
            /* const parent = document.getElementById('newsfeed-items-grid');
            parent.insertAdjacentHTML('afterbegin', newElement); */
            });
            break;

        case 'commentPost':

            event.preventDefault();

            let commentHolder;
            let parentContent = event.target.parentElement.parentElement;

            if(parentContent.children[1].id == 'postImage') {

                commentHolder = parentContent.children[7];
            }
            else {
                commentHolder = parentContent.children[6];
            }

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
                                                    <img src="{{asset('img/author-page.jpg')}}" alt="author">
                                                
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
                        
                        const parent = event.target.parentElement.parentElement;
                        let likeClass;

                        if(parent.children[1].id == 'postImage') {

                            likeClass = parent.children[4].children[0].children[1];
                        }
                        else {
                            likeClass = parent.children[3].children[0].children[1];
                        }
                        
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

                        const parent = event.target.parentElement.parentElement;
                        let likeClass;

                        if(parent.children[1].id == 'postImage') {

                            likeClass = parent.children[4].children[0].children[1];
                        }
                        else {
                            likeClass = parent.children[3].children[0].children[1];
                        }
                        
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

            let parent = event.target.parentNode.parentNode;
            let form = null, comment = null;

            if(parent.children[1].id == 'postImage') {

                form = parent.children[5];
                comment = parent.children[7];
            }
            else {
                form = parent.children[4];
                comment = parent.children[6];
            }
            
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

        case 'thread':

            const thread_id = event.target.parentElement.children[0].getAttribute('value');
            console.log(thread_id);
            showThread(thread_id).then(response => {
                
                document.querySelector('.ui-block').innerHTML = response.html;    
            })

            break;

        case 'newMessage':

            event.preventDefault();
        
            const url = event.target.parentElement.getAttribute('action');
            const msgData = event.target.parentElement.elements.namedItem('message').value;

            newMessage(url, msgData).then((response) => {
                
                showThread(response.thread_id).then(response => {
                
                    document.querySelector('.ui-block').innerHTML = response.html;    
                })
            })

            break;
        
        default:
            break;
    }

});

// Posting post-data to the database using Ajax
async function post(url, formData) 
{
    try {
         const response = await fetch(url, {
                method: 'POST',
                body: formData
            }
        );

        if(response.ok) return true;
        
    } catch (error) {
        console.log(error);
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
        const response = await axios.get('http://localhost:8000/posts');
        return response.data;
    
    } catch(error) {
        console.log(error.response.data);
        console.log(error.response.status);
    } 
}

async function fetchComments()
{
    try {
        const response = await axios.get('http://localhost:8000/comments');
        return response.data;
    
    } catch(error) {
        console.log(error.response.data);
        console.log(error.response.status);
    } 
}

async function follow(user_id)
{
    try {
        const response = await axios.get(`http://localhost:8000/follow/${user_id}`);
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
        const response = await axios.get(`http://localhost:8000/unfollow/${user_id}`);
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
        const response = await axios.get(`http://localhost:8000/like_post/${post_id}`);
        return response.data;
    
    } catch(error) {
        console.log(error.response.data);
        console.log(error.response.status);
    } 
}

async function unlikePost(post_id)
{
    try {
        const response = await axios.get(`http://localhost:8000/unlike_post/${post_id}`);
        return response.data;
    
    } catch(error) {
        console.log(error.response.data);
        console.log(error.response.status);
    } 
}

async function getLikesCount(post_id)
{
    try {
        const response = await axios.get(`http://localhost:8000/post-likes-count/${post_id}`);
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
        const response = await axios.get('http://localhost:8000/markAsRead');
        response.data;
    }
    catch(error) {
        console.log(error.response.data);
    }
}

async function showThread(thread_id)
{
    try {
        const response = await axios.get(`http://localhost:8000/messages/inbox/${thread_id}`);
        return response.data;
    }
    catch(error) {
        console.log(error.response.data);
    }
}

// Posting post-data to the database using Ajax
async function newMessage(url, msgData) 
{
    try {
         const response = await axios.post(url, {
            data: {message: msgData}    
        });

        if(response.status === 200){
            return response.data;
        } 
        
    } catch (error) {
        console.log(error.response.data);
        console.log(error.response.status);
    }
}


function setReplyHolder(value) {
    replyHolder = value;
    return true;
}

function getReplyHolder() {
    return replyHolder;
}


