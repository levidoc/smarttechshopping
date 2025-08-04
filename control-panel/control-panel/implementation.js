var page; 
const application_endpoint = <?php _e("'https://".$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME'])."/wiseman-serverside/application.php'"); ?> ;  
const server_endpoint = <?php _e("'https://".$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME'])."/wiseman-serverside/api.php'"); ?> ; 
const fingerprint_path = "http://localhost/SKYNET/wiseman-admin/fingerprint.pxy"; 
let session_fingerprint; 

function change_menu(potion){
    let menu_section = document.getElementById("main_menu_section_holder"); 
    let shop_section = document.getElementById("shop_menu_section_holder"); 

    if (potion == "home"){
        shop_section.style.display = "none"; 
        menu_section.style.display = "contents"; 
    }else if (potion == "shop"){
        shop_section.style.display = "contents"; 
        menu_section.style.display = "none"; 
    }
}

function update_url_param(param, value) {
    // Get the current URL
    const url = new URL(window.location.href);
    
    // Check if the parameter exists
    if (url.searchParams.has(param)) {
        // Update the parameter's value
        url.searchParams.set(param, value);
    } else {
        // Add the parameter with the new value
        url.searchParams.append(param, value);
    }
    
    // Update the browser's URL without reloading the page
    window.history.replaceState({}, '', url);
}

function read_current_page_url(guide="context"){
    const url = new URL(window.location.href); 
    if (url.searchParams.has(guide)){
        return url.searchParams.get(guide); 
        //return (guide); 
    }
    return null; 
};

function change_page(location){
    let current_page = read_current_page_url('page'); 
    if ((current_page !== location) || (current_page == "redirect") ){

        if (current_page == "redirect"){
            update_url_param("page","home"); 
            load_application_page()
        }else{
            update_url_param("page",location); 
            load_application_page()
        }
        return null; 
    }
}

async function load_application_page(){
    operate_loader();
    const data = new URLSearchParams();
    if ((read_current_page_url("token") == 'false')){
        data.append("page", "security");    
        update_url_param("page","redirect"); 
    }else{
        data.append("page", read_current_page_url("page"));
        data.append("navigator", create_navigation_code());
    }

    const receivedData = await sendAndReceiveData(data, application_endpoint);
    const application_canvas = document.getElementById('application_canvas'); 
    application_canvas.innerHTML = receivedData; 
    operate_loader('close');
    if (read_current_page_url('page') == "new-article"){
        application_canvas.style.padding = "3px"; 
    }else{
        application_canvas.style.padding = "0 30px 30px"; 
    }

    //security_pulse(); 
}

async function security_pulse(){
    let s = device_storage('account_code'); 
    const data = new URLSearchParams(); 
    data.append('mode','pulse');
    data.append('signature',s); 
    const server_feedback = await sendAndReceiveData(data, server_endpoint); 
    try {        
        const server_data = await JSON.parse(server_feedback); 
        if (server_data.hasOwnProperty('error')){
            const url = new URL(window.location.href); 
            error_feedback(server_data.error); 
            device_storage('account_code',false,'DELETE');
            update_url_param('auth',false);
            const params = new URLSearchParams(url); 
            params.delete('auth');
            if (read_current_page_url('page') !== "redirect"){
                
                window.history.replaceState({}, '', params);
                //Change the data that you have configured 
                change_page('home'); 

            } 
            return null; 
        }

        if (server_data.hasOwnProperty('response')){
            let response = server_data.response;
            return null; 
            //Dont Change The Data Intergrity of the things available 
        }
        
    } catch (error) {
        //console.log(error); 
        error_feedback(); 
    }
}

async function register_footprint(){
    operate_loader(); 
    let blog_registration = await read_register(); 
    if (blog_registration == ""){
        return null; 
    }
    const url = new URL(window.location.href);
    // Check if the parameter exists
    if (!url.searchParams.has('auth')) {
        // Update the parameter's value
        change_page('security'); 
    }

    if (url.searchParams.has('auth')){
        if (read_current_page_url('auth') == 'false'){
            change_page('security'); 
        }
    }
    operate_loader('close');
    return null; 

}

async function checkURL(url) { 
    try { 
      const response = await fetch(url);
        if (response.ok){
            return true; 
        }

       if (!response.ok) return false;   
    } catch (error) { 
        return null; 
      console.log(`Error checking URL: ${error}`); 
    } 

    return false; 
} 

async function read_register(){
    let domain_path = await checkURL(window.location.hostname+'/fingerprint.pxy')
    let file_path = await checkURL(window.location.pathname+'/fingerprint.pxy'); 

    if (file_path == true){
        session_fingerprint = await fetch(window.location.pathname+'/fingerprint.pxy');
        session_fingerprint = await session_fingerprint.text();  
        return session_fingerprint; 
    }else if (domain_path == true){
        session_fingerprint = await fetch(window.location.hostname+'/fingerprint.pxy');
        session_fingerprint = await session_fingerprint.text(); 
        return session_fingerprint; 
    }

    return ''; 
}

function validateSignInData(data) {
    const { username, password, email, ...others } = data;
    const errors = {};

    // Validate username
    const usernameRegex = /^[a-zA-Z0-9]{3,15}$/;
    if (!username || !usernameRegex.test(username)) {
        errors.username = 'Username must be 3-15 characters long and contain only letters and numbers.';
        error_feedback('Username must be 3-15 characters long and contain only letters and numbers.');

        return false; 
    }

    // Validate password
    const passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;
    if (!password || !passwordRegex.test(password)) {
        errors.password = 'Password must be at least 8 characters long and include at least one number and one special character.';
        error_feedback('Password must be at least 8 characters long and include at least one number and one special character.');

        return false; 
    }

    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email || !emailRegex.test(email)) {
        errors.email = 'Email must be a valid email address.';
        error_feedback('Email must be a valid email address.');

        return false; 
    }

    // Validate additional fields if necessary
    for (const key in others) {
        if (others.hasOwnProperty(key)) {
            if (!others[key]) {
                errors[key] = `${key} cannot be empty.`;
                return false; 
            }
        }
    }

    return true; 
    //return {
    //    isValid: Object.keys(errors).length === 0,
    //    errors
    //};
}

async function authenticate_website(){
   
    let edt_username = document.getElementById('edt_username').value;
    let edt_email = document.getElementById('edt_email').value;
    let edt_server = document.getElementById('edt_server').value;
    let edt_password = document.getElementById('edt_password').value;
    let edt_server_code = document.getElementById('edt_server_code').value;  

    // Example usage
    const signInData = {
        username: edt_username,
        password: edt_password,
        email: edt_email,
    };

    if (validateSignInData(signInData)){
        operate_loader(); 
        const data = new URLSearchParams(); 
        data.append('mode','authenticate');
        data.append('authenticate_username',edt_username);
        data.append('authenticate_email',edt_email);
        data.append('authenticate_server',edt_server);
        data.append('authenticate_password',edt_password);
        data.append('authenticate_code',edt_server_code); 
        let registration_confirmation = await sendAndReceiveData(data, server_endpoint); 

        console.log(registration_confirmation); 
        try {
            // Decode The Variable 
            const arr_output = await  JSON.parse(registration_confirmation); 
            if (arr_output.hasOwnProperty('error')){
                error_feedback(arr_output.error); 
                operate_loader('stop');
                return null; 
            }
            if (arr_output.hasOwnProperty('auth')){
                //Create The Automatic Download 
                let link = arr_output.auth; 
                showModal('Download Your Website Fingerprint',link); 
                operate_loader('stop');
                return null; 
            }

        } catch (error) {
            console.error(error); 
            error_feedback(); 
            operate_loader('stop');
        }
    }; 
}

async function set_profile(){
    operate_loader(); 

    let blog_username = document.getElementById('edt_blog_username').value; 
    let blog_image = document.getElementById('edt_blog_image').value; 


    const data = new URLSearchParams(); 
    data.append('mode','set-profile');
    data.append('image',blog_image);
    data.append('username',blog_username);
    data.append('signature',device_storage('account_code'));
    let registration_confirmation = await sendAndReceiveData(data, server_endpoint); 

    console.log(registration_confirmation);

    try {
        // Decode The Variable 
        const arr_output = await  JSON.parse(registration_confirmation); 
        if (arr_output.hasOwnProperty('error')){
            error_feedback(arr_output.error); 
            operate_loader('stop');
            return null; 
        }

        if (arr_output.hasOwnProperty('response')){
            operate_loader('stop'); 
            showModal('Profile Saved','Your Profile has been configured.');  
        }

    } catch (error) {
        console.error(error); 
        error_feedback(); 
        operate_loader('stop');
    }
    
}


async function get_profile() {
    let container = document.getElementById('profile_container'); 
    let navigation_code = await create_navigation_code(); 
    const data = new URLSearchParams();
    data.append('navigator',navigation_code);
    let registration_confirmation = await sendAndReceiveData(data, server_endpoint); 
    console.log(registration_confirmation);
    try {
        // Decode The Variable 
        const arr_output = await  JSON.parse(registration_confirmation); 
        if (arr_output.hasOwnProperty('error')){
            error_feedback(arr_output.error); 
            operate_loader('stop');
            return null; 
        }

        if (arr_output.hasOwnProperty('feedback')){
            operate_loader('stop');

            return null; 
        }
    } catch (error) {
        console.error(error); 
        error_feedback(); 
        operate_loader('stop');
    }
}   

async function create_navigation_code(){
    let s = `BEGIN_GUIDE
---------------------------
a2kzMWdIMHpER29lM052RWE5eXNoRXVNcGxSb2lpRVZTMzI3SDlVTWovL0ZCMmNI
MVJtVzg4ZEt0cGk4aHE4OFVaemt0UEZyVDMxM0I4WjkwUmt6b2JiTDA5WG5wU0p1
L2UyYXF6SkRBbys5ZzdBdHFrUS96a1EwRWFkOEFMTXpKRlRXekVoSW1YaTc0WGFV
bXhOV09RNzZYKy9mM2ozOTVwVUpzdWJRMlV1ZjBNM3hWVWVRYUJiQmZIYW5HaEt3
ci9PcmVMTE5yNm9KcWlTb1BBMlJtRkhQa09lam0vT0VQRTJrZG5sWTFRaG5VNjBa
WU4yQ0dQay9VQXhYb1I5bXNLcUM5MzZqK0FmMitNQ1lPck9Ub3MxTnkreDVvalp4
R1VQN3A1UGkrTENNdmF6ZnJab0YxcGtOY3NjWi9oT3J1dHZ6aUFuSGIwZmdUblhn
TE9xSEJLWmJhdmU3WW9VWUZaVUt1ZVNmYTI4Nzh1TUx2YWZDSVFzSERVSUt2cGtR
c0FNblovTXQ5YkIrMld5NmNjbXQ0UVBDK214Q3A5cVNKUXNDV2JYNFRYeGJJWnR6
MkZrWFdhTnZZV3pkVUcrc1h2Q3pZVzltM1NXWUlJRWJ5Q3Erd0c5aUR5MmRITTlo
ckpiWGJ1WCtDTkE9
=============================`; 
    return s; 
}

async function authenticate_admin(){
    let edt_username = document.getElementById('edt_username').value;
    let edt_password = document.getElementById('edt_password').value;
    // Example usage

    const signInData = {
        username: edt_username,
        password: edt_password,
    };

    // Validate username
    const usernameRegex = /^[a-zA-Z0-9]{3,15}$/;
    if (!edt_username || !usernameRegex.test(edt_username)) {
        error_feedback('Username must be 3-15 characters long and contain only letters and numbers.');
        return false; 
    }
    
    // Validate password
    const passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;
    if (!edt_password || !passwordRegex.test(edt_password)) {
        error_feedback('Password must be at least 8 characters long and include at least one number and one special character.');
        return false; 
    }

    var fingerprint = await session_fingerprint;  
    operate_loader(); 
    device_storage('account_code',false,'DELETE');

    const data = new URLSearchParams(); 
    data.append('mode','connect');
    data.append('authenticate_username',signInData.username);
    data.append('authenticate_password',signInData.password);
    data.append('authenticate_fingerprint',fingerprint);
    data.append('authenticate_domain',window.location.origin);

    let registration_confirmation = await sendAndReceiveData(data, server_endpoint); 

    console.log(registration_confirmation);

    try {
        // Decode The Variable 
        const arr_output = await JSON.parse(registration_confirmation); 
        if (arr_output.hasOwnProperty('error')){
            error_feedback(arr_output.error); 
            operate_loader('stop');
            return null; 
        }

        if (arr_output.hasOwnProperty('auth')){
            operate_loader('stop'); 
            showModal('Login Successful','You have successfully logged into your Wiseman.Blog account.'); 
            let code = arr_output.auth; 
            device_storage('account_code',code,'INSERT');
            update_url_param('auth','WSMAD'+(code)); 
            change_page('home'); 
            return null; 
        }

    } catch (error) {
        //console.error(error); 
        error_feedback(); 
        operate_loader('stop');
    }
    
}

async function select_theme(theme_id=false) {
    if (theme_id == false){
        return false
    }
    
    const data = new URLSearchParams(); 
    data.append('mode','set-theme');
    data.append('theme',theme_id);
    data.append('signature',device_storage('account_code'));
    let registration_confirmation = await sendAndReceiveData(data, server_endpoint); 

    console.log(registration_confirmation);

    try {
        // Decode The Variable 
        const arr_output = await  JSON.parse(registration_confirmation); 
        if (arr_output.hasOwnProperty('error')){
            error_feedback(arr_output.error); 
            operate_loader('stop');
            return null; 
        }

        if (arr_output.hasOwnProperty('response')){
            operate_loader('stop'); 
            showModal('Theme Saved','Your Website Theme has been changed.');  
        }

    } catch (error) {
        console.error(error); 
        error_feedback(); 
        operate_loader('stop');
    }
    

}



function device_storage(index,data=false,mode="READ"){
    if (mode == "READ"){
        return sessionStorage.getItem(index);
    }else if(mode == "INSERT"){
        if (sessionStorage.setItem(index,data)){
            return true; 
        }else{
            return false; 
        }
    }else if (mode == "DELETE"){
        if (sessionStorage.removeItem(index)){
            return true; 
        }else{
            return false; 
        }
    }
}

function open_project(){
    showModal('View Our Project','link to the Wiseman github repository : www.github.io/wiseman/ '); 
}

async function sendAndReceiveData(dataToSend, phpURL) {
    try {
      const response = await fetch(phpURL, {
        method: "POST", // Or 'GET'
        headers: {
          "Content-Type": "application/x-www-form-urlencoded", // Or 'application/json'
        },
        body: dataToSend,
      });

      if (!response.ok) {
        throw new Error(`HTTP error ${response.status}`);
      }
      // Example: Assuming JSON response

      try {
        return response.text(); 
      } catch (error) {
        return response.json();         
      }
      //const data = await response.json(); // Or response.text() for plain text
      //return data;
    } catch (error) {
        error_feedback('Failed To Commuincate With Service'); 
      console.error("Error:", error);
      // Handle the error (e.g., re-throw, return a default value, show an error message)
      throw error; // Re-throwing allows the calling function to handle the error as well.
    }
}

//Function for System Loader 
function operate_loader(state = "open") {
    let loader_container = document.getElementById('system_loader');

    if (state == "open") {
        loader_container.style.visibility = 'visible';
        loader_container.style.display = "block";
        //Show The Visibility Of The Modal 
    } else {
        loader_container.style.display = "none";
        loader_container.style.visibility = 'hidden';
        //Hide the Visibility of the modal 
    }
}

function error_feedback(contents = "Could Not Process Request") {
    const error_container = document.getElementById('error_container');
    const error__title = document.getElementById('error__title');

    error_container.style.display = "flex";
    error__title.innerText = contents;
}

function clear_error_dialog(){
    let k = document.getElementById('error_container'); 
    setTimeout(function(){
        k.style.display = "none"; 
    },500); 
}

function onwindowload(){
    let register = register_footprint(); 
    load_application_page(); 
}

function showModal(header,details) {
    document.getElementById('modalHeader').innerHTML = header; 
    document.getElementById('modalDetails').innerHTML = details;
    document.getElementById('myModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('myModal').style.display = 'none';
}

function create_menu(){

}

function open_create_menu_request(){
    let data_set = `

    <div class="video-view" style="padding: 10px 20px 0px; background-color:transparent">Menu Name</div>
    <div class="video-name" style="background-color:transparent">
        <div class="search-bar" style="max-width: 100%;">
            <input value="" type="text" placeholder="e.g (Primary Menu)" id="edt_blog_menu_name_create" style="background-image: none; max-width: 100%;">
        </div>
    </div>

    <div class="anim" style="--delay:.3s;display: block;margin: 20px auto 0px auto;width: fit-content;">
          <button onclick="create_menu()" class="like">
              <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M21.435 2.582a1.933 1.933 0 00-1.93-.503L3.408 6.759a1.92 1.92 0 00-1.384 1.522c-.142.75.355 1.704 1.003 2.102l5.033 3.094a1.304 1.304 0 001.61-.194l5.763-5.799a.734.734 0 011.06 0c.29.292.29.765 0 1.067l-5.773 5.8c-.428.43-.508 1.1-.193 1.62l3.075 5.083c.36.604.98.946 1.66.946.08 0 .17 0 .251-.01.78-.1 1.4-.634 1.63-1.39l4.773-16.075c.21-.685.02-1.43-.48-1.943z"></path>
              </svg>
              Create 
          </button>
    </div>
    `; 

    showModal('Create Menu',data_set); 
}

//onwindowload(); 