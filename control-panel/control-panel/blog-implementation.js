//Creating The Simple Blog 
function on_window_load(){
    if (document.getElementById('wiseman-implemetation')){
        //Pass For Recognising The Element ID 
    }else{
        
    }
}



const dbName = "blogDatabase";
const storeName = "blogPosts";
let db;

const request = indexedDB.open(dbName, 1);

request.onerror = function(event) {
    console.error("IndexedDB error:", event.target.errorCode);
};

request.onupgradeneeded = function(event) {
    db = event.target.result;
    if (!db.objectStoreNames.contains(storeName)) {
        db.createObjectStore(storeName, { keyPath: 'id' });
    }
};

request.onsuccess = function(event) {
    db = event.target.result;

    // Check if data already exists in IndexedDB
    const transaction = db.transaction(storeName, 'readonly');
    const objectStore = transaction.objectStore(storeName);
    const getAllRequest = objectStore.getAll();

    getAllRequest.onsuccess = function(event) {
        const existingPosts = event.target.result;

        if (existingPosts && existingPosts.length > 0) {
            // Data already exists, display it
            displayPosts(existingPosts);
        } else {
            // Data doesn't exist, fetch from server and store
            fetchDataAndStore();
        }
    };
};


function fetchDataAndStore() {
    fetch('get_blog_posts.php') // Replace with your PHP endpoint
        .then(response => response.json())
        .then(data => {
            const transaction = db.transaction(storeName, 'readwrite');
            const objectStore = transaction.objectStore(storeName);

            data.forEach(post => {
                objectStore.add(post);
            });

            transaction.oncomplete = function() {
                // Data stored successfully, display it
                displayPosts(data);
            };

            transaction.onerror = function(event) {
                console.error("Transaction error:", event.target.error);
            };
        })
        .catch(error => {
            console.error("Fetch error:", error);
        });
}


function displayPosts(posts) {
    const blogPostsDiv = document.getElementById('blog-posts');
    posts.forEach(post => {
        const postDiv = document.createElement('div');
        postDiv.innerHTML = `<h2>${post.title}</h2><p>${post.content}</p>`;
        blogPostsDiv.appendChild(postDiv);
    });
}
