function feedback_report(state = 'warning', description = 'could not process request') {
    let feedback_container = document.getElementById('global_feedback_container');
    let feedback_error = document.getElementById('feedback_error');
    let feedback_error_text = document.getElementById('feedback_error_text');

    let feedback_success = document.getElementById('feedback_success');
    let feedback_successful_text = document.getElementById('feedback_successful_text');

    let feedback_warning = document.getElementById('feedback_warning');
    let feedback_warning_text = document.getElementById('feedback_warning_text');

    switch (state) {
        case 'error':
            feedback_container.classList.remove('none');

            feedback_error.classList.toggle('animate_in');
            feedback_error_text.innerHTML = ' ' + description;
            setTimeout(() => {
                feedback_error.classList.toggle('animate_out');
                if (feedback_error.classList.contains('animate_out') == true) {
                    setTimeout(() => {
                        feedback_container.classList.add('none');
                        feedback_error.classList.toggle('animate_in');
                        feedback_error.classList.toggle('animate_out');
                    }, 500)
                }
            }, 3000);

            break;
        case 'successful':
            feedback_container.classList.remove('none');

            feedback_success.classList.toggle('animate_in');
            feedback_successful_text.innerHTML = ' ' + description;
            setTimeout(() => {
                feedback_success.classList.toggle('animate_out');
                if (feedback_success.classList.contains('animate_out') == true) {
                    setTimeout(() => {
                        feedback_success.classList.toggle('animate_in');
                        feedback_success.classList.toggle('animate_out');
                        feedback_container.classList.add('none');
                    }, 500)
                }
            }, 1500);

            break;
        default:
            feedback_container.classList.remove('none');

            feedback_warning.classList.toggle('animate_in');
            feedback_warning_text.innerHTML = ' ' + description;
            setTimeout(() => {
                feedback_warning.classList.toggle('animate_out');
                if (feedback_warning.classList.contains('animate_out') == true) {
                    setTimeout(() => {
                        feedback_container.classList.add('none');
                        feedback_warning.classList.toggle('animate_out');
                        feedback_warning.classList.toggle('animate_in');
                    }, 500)
                }
            }, 2000);

            break;

    }

}

function toggle_account_navbar() {
    const container = document.getElementById('account_navbar_');

    if (container.style.display == "block") {
        container.style.display = "none";
    } else {
        container.style.display = "block";
    }
}

function retrieve_featured_products() {
    const container = document.getElementById('featured_products');
    file_path = "php/get_featured_products.php";
    const formData = new FormData();
    formData.append('index', 'featured');
    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            container.innerHTML = data;
        }
    };
    xhr.send(formData);

}

function record_contact_form() {
    const vendor_code = document.getElementById('vendor_contact_form_code').value; 
    const description = document.getElementById('vendor_contact_form_message').value; 

    file_path = "php/insert_contact_forms.php";
    const formData = new FormData();
    formData.append('message', description);
    formData.append('vendor', vendor_code);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            if (data.trim() == "PROCEED"){
                confirm_dialog('Contact Form Has Been Sent'); 
            }else{
                error_dialog(data); 
            }
        }
    };
    xhr.send(formData);
}

function retrieve_icon_count() {
    const container = document.getElementById('data_cart_icon');
    file_path = "php/get_cart_widget_data.php";
    const formData = new FormData();
    formData.append('section', 'count');
    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            container.innerHTML = data;
        }
    };
    xhr.send(formData);

}

function retrieve_icon_widget() {
    const container = document.getElementById('widget_cart_data');
    file_path = "php/get_cart_widget_data.php";
    const formData = new FormData();
    formData.append('section', 'widget');
    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            if (container.innerText == data){
                return false; 
            }
            
            if ( (container.innerHTML) !== data){
                container.innerHTML = data;
            }
        }
    };
    xhr.send(formData);

}

function cart_interval() {
    //retrieve_icon_count(); 
    retrieve_icon_widget();
}
function retrieve_shop_details() {
    const container = document.getElementById('store_static_suppliers');
    file_path = "php/get_store_stats.php";
    const formData = new FormData();
    formData.append('index', 'featured');
    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            container.innerHTML = data;
        }
    };
    xhr.send(formData);

}

function retrieve_shop_slide_show() {
    const container = document.getElementById('store_carosel_container');
    file_path = "php/get_store_carrosel.php";
    const formData = new FormData();
    formData.append('index', 'featured');
    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            if (data.trim() !== "FALSE") {
                container.innerHTML = data;
            }
        }
    };
    xhr.send(formData);

}

function add_to_wishlist(product_index) {
    const file_path = 'php/insert_product_wishlist.php';

    const formData = new FormData();
    formData.append('product', product_index);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            if (data.trim() == "PROCEED") {
                //confirm_dialog('Product Added To Wishlist');
            } else {
                error_dialog('Could Not Add Product To Wishlist');
            }
        }
    };
    xhr.send(formData);
}

function record_wishlist() {
    const file_path = 'php/insert_newsletter.php';
    let email = document.getElementById('newsletter_email').value;
    const formData = new FormData();
    formData.append('email', email);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            if (data.trim() == "PROCEED") {
                confirm_dialog('Subscribed To Newsletter');
            } else {
                error_dialog(data);
            }
        }
    };
    xhr.send(formData);
}


function read_url_parameter(section, link = false) {
    if (link == false) {
        link = window.location.href;
    }

    const urlObj = new URL(link);
    const params = new URLSearchParams(urlObj.search);
    const _data = params.get(section);
    return _data;
}

function retrieve_shop_data_all() {
    const container = document.getElementById('product_section');
    file_path = "php/get_shop_data.php";
    const formData = new FormData();
    formData.append('index', read_url_parameter('page'));
    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            container.innerHTML = data;
        }
    };
    xhr.send(formData);

}
//Include The Wishlist Function 


function retrieve_product_data() {
    const container = document.getElementById('product_container');
    file_path = "php/get_product_information.php";
    const formData = new FormData();
    formData.append('index', read_url_parameter('reference'));
    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            container.innerHTML = data;
        }
    };
    xhr.send(formData);
}

function add_to_cart(product_index, quantity) {
    const file_path = "php/insert_product_cart.php";
    const formData = new FormData();
    formData.append('index', product_index);
    formData.append('quantity', quantity);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            if (data.trim() == "PROCEED") {
                //confirm_dialog('Product Added To Cart');
            } else {
                error_dialog('Could Not Add Product To Cart');
            }
        }
    };
    xhr.send(formData);

}

//Include The Cart Functions 

//Include The Account Functions 


function confirm_dialog(message = false, state = "LEAVE") {
    feedback_report('successful', message);
}

function error_dialog(message = false) {
    feedback_report('error', message);
}


function share_on_whatsApp() {
    var url = encodeURIComponent(window.location.href);
    //var text = encodeURIComponent("Check out this webpage!");

    //var whatsappUrl = "https://api.whatsapp.com/send?text=" + text + "%20" + url;
    var whatsappUrl = "https://api.whatsapp.com/send?" + url;

    window.open(whatsappUrl);
}

function share_on_instagram() {
    var url = encodeURIComponent(window.location.href);

    var instagramUrl = "https://www.instagram.com/?url=" + url;

    window.open(instagramUrl);
}

function share_page() {
    if (navigator.share) {
        navigator.share({
            title: document.title,
            text: "Check out this webpage!",
            url: window.location.href
        })
            .then(() => console.log('Shared successfully'))
            .catch((error) => console.log('Error sharing:', error));
    }
}


function retrieve_shop_data() {
    const container = document.getElementById('store_container');
    file_path = "php/get_store_profile.php";
    const formData = new FormData();
    formData.append('index', read_url_parameter('reference'));
    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            container.innerHTML = data;
        }
    };
    xhr.send(formData);

}

function retrieve_wishlist_data() {
    const container = document.getElementById('wishlist_container');
    file_path = "php/get_wishlist_data.php";
    const formData = new FormData();
    formData.append('index', null);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            container.innerHTML = data;
        }
    };
    xhr.send(formData);

}

function remove_wishlist_item(product_id) {
    file_path = "php/delete_wishlist_item.php";
    const formData = new FormData();
    formData.append('product_index', product_id);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            if (data.trim() == "PROCEED") {
                confirm_dialog('Product Removed From Wishlist');
                retrieve_wishlist_data();
            } else {
                error_dialog('Could Not Remove Product From Wishlist');
            }
        }
    };
    xhr.send(formData);

}

function retrieve_cart_data() {
    const container = document.getElementById('cart_container');
    file_path = "php/get_cart_data.php";
    const formData = new FormData();
    formData.append('index', null);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            container.innerHTML = data;
        }
    };
    xhr.send(formData);

}

function remove_cart_item(product_id) {
    file_path = "php/delete_cart_item.php";
    const formData = new FormData();
    formData.append('product_index', product_id);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            console.log(data);
            if (data.trim() == "PROCEED") {
                confirm_dialog('Product Removed From Cart');
                retrieve_cart_data();
            } else {
                error_dialog('Could Not Process Request');
            }
        }
    };
    xhr.send(formData);

}

function activate_coupon() {
    const file_path = "php/activate_coupon.php";

    var coupon = document.getElementById('coupon_input').value;

    const formData = new FormData();
    formData.append('coupon', coupon);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', file_path, true);
    xhr.onload = function () {
        if (this.status === 200) {
            var data = this.responseText;
            console.log(data);
            if (data.trim() == "PROCEED") {
                confirm_dialog('Coupon Is Active');
                retrieve_cart_data();
            } else {
                error_dialog('Coupon Code Is Invalid');
            }
        }
    };
    xhr.send(formData);
}

function validatePassword(data_string) {
    var p = data_string,
        errors = [];
    if (p.length < 8) {
        return false;
        //errors.push("Your password must be at least 8 characters"); 
    }
    if (p.search(/[a-z]/i) < 0) {
        return false;
        //errors.push("Your password must contain at least one letter.");
    }
    if (p.search(/[0-9]/) < 0) {
        return false;
        //errors.push("Your password must contain at least one digit."); 
    }
    return true;
}

function sign_in_with_apple() {
    error_dialog('Apple Sign In Not Authenticated');
}

function sign_in_with_google() {
    error_dialog('Google Sign In Not Authenticated');
}

function validate_signin_input() {
    var username = document.getElementById('edtusername_connect').value;
    var password_string = document.getElementById('edtpassword_connect').value;

    const username_patterns = /^[a-zA-Z0-9_]{3,20}$/;
    const password_patterns = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
    var output = true;

    if (validatePassword(password_string) == false) {
        output = false;
        error_dialog('Invalid Password. Must be at least 8 characters with at least one digit, one lowercase and one uppercase letter.');
    }

    if (!username.match(username_patterns)) {
        output = false;
        error_dialog('Invalid Username. Must contain Numbers and Letters between 3-20 charachters');
    }

    return output;

}

function validate_signup_input() {
    var username = document.getElementById('edtusername_create').value;
    var email = document.getElementById('edtemail_create').value;
    var phone = document.getElementById('edtphone_create').value;
    var password_string = document.getElementById('edtpassword_create').value;

    const username_patterns = /^[a-zA-Z0-9_]{3,20}$/;
    const password_patterns = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
    const email_patterns = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phone_patterns = /^\d{10}$/;

    var output = true;

    if (validatePassword(password_string) == false) {
        output = false;
        error_dialog('Invalid Password. Must be at least 8 characters with at least one digit, one lowercase and one uppercase letter.');
    }


    if (!phone.match(phone_patterns)) {
        output = false;
        error_dialog('Invalid Phone Numbers. Must be a 10 digit number');
    }


    if (!email.match(email_patterns)) {
        output = false;
        error_dialog('Invalid Email Address');
    }


    if (!username.match(username_patterns)) {
        output = false;
        error_dialog('Invalid Username. Must contain Numbers and Letters between 3-20 charachters');
    }



    return output;
}

function redirect_page(url, duration = false) {
    if (duration == false) {
        window.location.href = url;
    } else {
        const seconds_int = duration * 1000;
        setTimeout(function () {
            window.location.href = url;
        }, seconds_int);
    }
}

function create_account() {
    const valid_signature = validate_signup_input();
    const file_path = "php/create_account.php";

    if (valid_signature == true) {

        var username = document.getElementById('edtusername_create').value;
        var email = document.getElementById('edtemail_create').value;
        var phone = document.getElementById('edtphone_create').value;
        var password_string = document.getElementById('edtpassword_create').value;

        const formData = new FormData();

        formData.append('email', email);
        formData.append('phone', phone);
        formData.append('username', username);
        formData.append('password', password_string);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', file_path, true);
        xhr.onload = function () {
            if (this.status === 200) {
                var data = this.responseText;
                if (data.trim() == "PROCEED") {
                    confirm_dialog('Account Created');
                    redirect_page('account.php?section=profile', 5);
                } else {
                    error_dialog('Account Credentials Already Exists');
                }
            }
        };
        xhr.send(formData);
    }
}

function connect_account() {
    const file_path = "php/connect_account.php";

    const valid_signature = validate_signin_input();
    if (valid_signature == true) {

        var username = document.getElementById('edtusername_connect').value;
        var password_string = document.getElementById('edtpassword_connect').value;

        const formData = new FormData();

        formData.append('username', username);
        formData.append('password', password_string);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', file_path, true);
        xhr.onload = function () {
            if (this.status === 200) {
                var data = this.responseText;
                if (data.trim() == "PROCEED") {
                    confirm_dialog('Successfully Logged In.');
                    redirect_page('account.php?section=profile', 5);
                } else {
                    error_dialog('Account Credentials Are Invalid');
                }
            }
        };
        xhr.send(formData);
    }
}

