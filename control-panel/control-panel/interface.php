<?php include_once "blade.header.php" ?>
<?php include_once "blade.header.enlist.php"; ?>
<?php include_once "blade.navbar.php"; ?>

<?php

function get_page_map()
{
  return [
    "dashboard" => "pages/store.dashboard.page.php",
    "create-website" => "pages/cp.sites.create.page.php",
    "website-manager" => "pages/cp.sites.manager.page.php",
    "websites" => "pages/cp.sites.home.page.php",
    "login" => "pages/cp.security.signin.page.php",
      "faq" =>          "pages/cp.faq.page.php",
      "contact-form" => "pages/cp.contact-form.page.php",
      "category" =>     "pages/cp.category.page.php",
      '404' =>          "pages/cp.error.404.page.php",
      'media' =>        "pages/cp.media-library.page.php",
      'inventory' =>    "pages/cp.inventory.page.php",
      'settings' =>    "pages/cp.settings.page.php",
      'email-configuration' => "pages/cp.email-settings.page.php",
      
  ];
}

function get_internal_page()
{
  return map_page()[2];
}
#This is where the Interface Pages Come In 
$page_map = get_page_map();
$internal_page = get_internal_page() ?? $_POST['page_request'];
if (empty($internal_page)) {
  $internal_page = "dashboard";
}

if (empty(map_page()[1])) {
  $internal_page = "login";
}

$r_page = dirname(__FILE__) . DIRECTORY_SEPARATOR . $page_map[$internal_page] ?? dirname(__FILE__) . $page_map["404"];

if (file_exists($r_page)) {
  include_once $r_page;
} else {
  include_once dirname(__FILE__) . $page_map["404"];
}
?>

</div>

<?php @include_once "blade.footer.php"; ?>

<script>

  function validateSignInData(data) {
    const {
      username,
      password,
      email,
      ...others
    } = data;
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


  async function authenticate_website() {

    let edt_username = document.getElementById('edt_username').value;
    let edt_password = document.getElementById('edt_password').value;

    // Example usage
    const signInData = {
      username: edt_username,
      password: edt_password,
      email: 'levidoc@levidoc.com',
    };

    if (validateSignInData(signInData)) {
      operate_loader();
      const data = new URLSearchParams();
      data.append('mode', 'authenticate');
      data.append('authenticate_username', edt_username);
      data.append('authenticate_email', edt_email);
      data.append('authenticate_server', edt_server);
      data.append('authenticate_password', edt_password);
      data.append('authenticate_code', edt_server_code);
      let registration_confirmation = await sendAndReceiveData(data, server_endpoint);

      console.log(registration_confirmation);
      try {

      } catch (error) {
        console.error(error);
        error_feedback();
        operate_loader('stop');
      }
    };
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


  <?php #_script("implementation.js") 
  ?>
</script>

</body>

</html>