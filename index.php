<?php
global  $lang_title_ended ;
global  $lang_title_errors ;

global  $lang_session_expired ;
global  $lang_ip_conflict ;
global  $lang_token_conflict ;

global  $lang_btn_login ;
global  $lang_ftp_host ;
global  $lang_port ;
global  $lang_passive_mode ;
global  $lang_username ;
global  $lang_password ;
global  $lang_ftp_ssl ;
global  $lang_adv_interface ;
global  $lang_save_login ;
global  $lang_language ;
global  $lang_skin ;
global  $lang_ip_check ;

global  $lang_skins_empty ;
global  $lang_skins_locked ;
global  $lang_skins_missing ;

global  $lang_missing_fields ;
global  $lang_max_logins ;
global  $lang_cant_connect ;
global  $lang_cant_authenticate ;
global  $lang_ip_conflict ;

global  $lang_table_name ;
global  $lang_table_size ;
global  $lang_table_date ;
global  $lang_table_time ;
global  $lang_table_user ;
global  $lang_table_group ;
global  $lang_table_perms ;

global  $lang_size_b ;
global  $lang_size_kb ;
global  $lang_size_mb ;
global  $lang_size_gb ;
global  $lang_size_tb ;

global  $lang_btn_refresh ;
global  $lang_btn_dl ;
global  $lang_btn_cut ;
global  $lang_btn_copy ;
global  $lang_btn_paste ;
global  $lang_btn_rename ;
global  $lang_btn_delete ;
global  $lang_btn_chmod ;
global  $lang_btn_logout ;
global  $lang_btn_save ;
global  $lang_btn_close ;
global  $lang_btn_cancel ;
global  $lang_btn_ok ;
global  $lang_btn_new_folder ;
global  $lang_btn_new_file ;
global  $lang_btn_upload_file ;
global  $lang_btn_upload_files ;
global  $lang_btn_upload_repeat ;
global  $lang_btn_upload_folder ;

global  $lang_info_version ;
global  $lang_info_host ;
global  $lang_info_user ;
global  $lang_info_upload_limit ;
global  $lang_info_drag_drop ;

global  $lang_xfer_file ;
global  $lang_xfer_size ;
global  $lang_xfer_progress ;
global  $lang_xfer_elapsed ;
global  $lang_xfer_uploaded ;
global  $lang_xfer_rate ;
global  $lang_xfer_remain ;

global  $lang_move_conflict ;
global  $lang_cant_rename ;
global  $lang_cant_delete ;

global  $lang_folder_exists ;
global  $lang_folder_doesnt_exist ;
global  $lang_folder_cant_move ;
global  $lang_folder_cant_delete ;
global  $lang_folder_cant_access ;
global  $lang_folder_cant_make ;

global  $lang_file_exists ;
global  $lang_file_doesnt_exist ;
global  $lang_file_cant_move ;
global  $lang_file_cant_make ;

global  $lang_server_error_down ;
global  $lang_server_error_up ;
global  $lang_browser_error_up ;
global  $lang_file_size_error ;
global  $lang_file_size_copy_error ;

global  $lang_folder_cant_chmod ;
global  $lang_file_cant_chmod ;
global  $lang_chmod_max_777 ;
global  $lang_chmod_owner ;
global  $lang_chmod_group ;
global  $lang_chmod_public ;
global  $lang_chmod_manual ;
global  $lang_chmod_read ;
global  $lang_chmod_write ;
global  $lang_chmod_exe ;

global  $lang_title_rename ;
global  $lang_title_chmod ;
global  $lang_title_edit_file ;
global  $lang_title_new_file ;
global  $lang_title_new_folder ;
global  $lang_new_folder_name ;
global  $lang_new_file_name ;
global  $lang_template ;
global  $lang_no_template ;

global  $lang_no_xmlhttp ;
global  $lang_support_drop ;
global  $lang_no_support_drop ;
global  $lang_transfer_pending ;
global  $lang_transferring_to_ftp ;
global  $lang_no_file_selected ;
global  $lang_none_selected ;
global  $lang_context_open ;
global  $lang_context_download ;
global  $lang_context_edit ;
global  $lang_context_cut ;
global  $lang_context_copy ;
global  $lang_context_paste ;
global  $lang_context_rename ;
global  $lang_context_delete ;
global  $lang_context_chmod ;

global  $lang_title_fetch_file ;
global  $lang_fetch_no_file ;
global  $lang_fetch_not_found ;
global  $lang_btn_fetch ;
global  $lang_btn_fetch_file ;
//mylangcode
global  $lang_error_file_type ;
global  $lang_muti_file_edit_error ;
global $lang_ftp_address_file;
global $lang_name_file;
global $lang_temp_address_file;
global $lang_downloadlink;
global $lang_Download_Here;
global $lang_file_size;

global $lang_rename_or_replace;
global $lang_you_want_repace_or;
global $lang_i_want_repace;
global $lang_i_want_rename;
global $lang_please_name_rename;
global $lang_btn_clear_clipboard;
global $lang_btn_edit;
global $lang_btn_help;
//end my lang code
$version = "1.8.8";

require("config.php");

ini_set('max_execution_time', $maxExecTime);
ini_set('memory_limit', $maxFileSize);



error_reporting(0);
saveFtpDetailsCookie();
startSession();

# SET FOLDERS
global  $templates_dir;
global $languages_dir;
$templates_dir = plugin_dir_path( __FILE__ )."/templates";
$languages_dir = plugin_dir_path( __FILE__ )."/languages";


# INCLUDE LANGUAGE FILE

if ($_SESSION["lang"] == "" || isset($_POST["lang"]))
    setLangFile();

//$langFileArray = getFileArray("languages");

include($languages_dir . "/en_us.php");

//if (in_array($_SESSION["lang"], $langFileArray))
include($languages_dir . "/" . $_SESSION["lang"]);

# SET VARS

// Check for file download
if (isset($_GET["dl"]))
    $ftpAction = "download";
    
// Check for zip download
if ($_GET["ftpAction"] == "download_zip")
    $ftpAction = "download_zip";

// Check for zip download
if ($_GET["ftpAction"] == "helpshow")
   displayAjaxIframe();
    
// Check for zip download
if ($_GET["ftpAction"] == "editfile")
    $ftpAction = "editfile";

// Check for iFrame upload
if ($_GET["ftpAction"] == "iframe_upload")
    $ftpAction = "iframe_upload";

// Check for iFrame edit
if ($_GET["ftpAction"] == "editProcess")
    $ftpAction = "editProcess";

// Check for AJAX post
if ($_POST["ftpAction"] != "" || $_GET["ftpAction"] != "")
    $ajaxRequest = 1;
else
    $ajaxRequest = 0;

// Check resetting upload erreor array
if ($_POST["resetErrorArray"] == 1 || $ajaxRequest == 0) {
    $_SESSION["errors"] = array();
}

// Set file upload limit
setUploadLimit();

# LOAD CONTENT
// These check vars are set in the "SET VARS" section
if ($ftpAction == "download" || $ftpAction == "download_zip" || $ftpAction == "editfile" || $ftpAction == "iframe_upload" || $ftpAction == "editProcess") {
    
    // Login
    attemptLogin();
    
    // Check referer
    if (checkReferer() == 1) {
        
        // Display content when logged in
        if ($_SESSION["loggedin"] == 1) {

            if ($ftpAction == "download") {
                downloadFile();
                //parentOpenFolder();
            }
            if ($ftpAction == "editfile") {
                savefile_king();
                //parentOpenFolder();
            }
            if ($ftpAction == "download_zip") {
                downloadFiles();
               // parentOpenFolder();
            }
            if ($ftpAction == "iframe_upload") {
                iframeUpload();
               // parentOpenFolder();
            }
            if ($ftpAction == "editProcess") {
                editProcess();
            }
        }
    }
    
} else {
    
    if ($ajaxRequest == 0) {
        
        // Check if logout link has been clicked
        checkLogOut();
        
        // Include the header
        displayHeader();
    }
    
    // Attempt to login with session or post vars
    attemptLogin();
    
    // Check referer
    if (checkReferer() == 1) {
        
        // Process any FTP actions
        processActions();
        
        // Display content when logged in
        if ($_SESSION["loggedin"] == 1) {
            
            if ($ajaxRequest == 0) {
                displayFormStart();
                displayFtpActions();
                displayAjaxDivOpen();
            }
            
            // Display FTP folder history
            //displayFtpHistory();
            
            // Display folder/file listing
            displayFiles();
            
            // Load error window
            displayErrors();
            
            if ($ajaxRequest == 0) {
                displayAjaxDivClose();
                displayAjaxIframe();
                displayUploadProgress();
                displayAjaxFooter();
                loadJsLangVars();
                loadAjax();
                writeHiddenDivs();
                displayFormEnd();
                //displayAjaxIframe();
                loadEditableExts();
                
            }
        }
        
        if ($ajaxRequest == 0) {
            
            // Include the footer
            displayFooter();
        }
    }
}

// Close FTP connection
@ftp_close($conn_id);


# FUNCTIONS

function startSession()
{

    global $sessionName;

    // Only change session name if session.auto_start is not 1, and session name is valid
    if (!ini_get("session.auto_start") || ini_get("session.auto_start") == "0")
        session_name(preg_match('/^[0-9]*[A-Za-z][A-Za-z0-9]*$/', $sessionName) ? $sessionName : "monstaftp");
    
    @session_start();
    
    $session_keys = array("user_ip", "loggedin",
        "lang", "win_lin", "ip_check", "login_error", "login_fails", "login_lockout",
        "ftp_ssl", "ftp_host", "ftp_user", "ftp_pass", "ftp_port", "ftp_pasv",
        "interface", "dir_current", "dir_history", "clipboard_chmod", "clipboard_files",
        "clipboard_folders", "clipboard_rename", "copy",
        "errors", "upload_limit", "domain", "filesCharSet",
    );
    
    foreach($session_keys as $session_key) {
        if (!isset($_SESSION[$session_key]))
            $_SESSION[$session_key] = ''; // avoid a lot of "undefined index"
    }    

}

function saveFtpDetailsCookie()
{
    
    if ($_POST["login"] == 1) {
        
        if ($_POST["login_save"] == 1) {
            
            $s = 31536000; // seconds in a year
            setcookie("ftp_ssl", $_POST["ftp_ssl"], time() + $s, '/', null, null, true);
            setcookie("ftp_host", trim($_POST["ftp_host"]), time() + $s, '/', null, null, true);
            setcookie("ftp_user", trim($_POST["ftp_user"]), time() + $s, '/', null, null, true);
            setcookie("ftp_pass", trim($_POST["ftp_pass"]), time() + $s, '/', null, null, true);
            setcookie("ftp_port", trim($_POST["ftp_port"]), time() + $s, '/', null, null, true);
            setcookie("ftp_pasv", $_POST["ftp_pasv"], time() + $s, '/', null, null, true);
            setcookie("interface", $_POST["interface"], time() + $s, '/', null, null, true);
            setcookie("login_save", $_POST["login_save"], time() + $s, '/', null, null, true);
            setcookie("lang", $_POST["lang"], time() + $s, '/', null, null, true);
            setcookie("ip_check", $_POST["ip_check"], time() + $s, '/', null, null, true);
            
        } else {
            
            setcookie("ftp_ssl", "", time() - 3600);
            setcookie("ftp_host", "", time() - 3600);
            setcookie("ftp_user", "", time() - 3600);
            setcookie("ftp_pass", "", time() - 3600);
            setcookie("ftp_port", "", time() - 3600);
            setcookie("ftp_pasv", "", time() - 3600);
            setcookie("interface", "", time() - 3600);
            setcookie("login_save", "", time() - 3600);
            setcookie("lang", "", time() - 3600);
            setcookie("ip_check", "", time() - 3600);
        }
    }
}

function attemptLogin()
{
    
    global $conn_id;
    global $ftpHost;
    global $ftpPort;
    global $ftpMode;
    global $ftpSSL;
    global $ftpDir;
    global $lang_missing_fields;
    global $lang_ip_conflict;
    
    if (connectFTP(0) == 1 && $_POST["login"] != 1) {

        // Check for hijacked session with IP check
        if ($_SESSION["ip_check"] == 1) {
            
            if ($_SERVER['REMOTE_ADDR'] == $_SESSION["user_ip"]) {
                $_SESSION["loggedin"] = 1;
            } else {
                $_SESSION["errors"] = $lang_ip_conflict;
                sessionExpired($lang_ip_conflict);
                logOut();
            }
            
        } else {
            $_SESSION["loggedin"] = 1;
        }

    } else {
        
        if ($_POST["login"] == 1) {
            
            // Check for login errors
            if (checkLoginErrors() == 1) {
                
                $_SESSION["login_error"] = $lang_missing_fields;
                displayLoginForm(1);
                
            } else {
                
                // Set POST vars to SESSION
                if ($ftpHost == "") {
                    
                    $_SESSION["ftp_host"] = trim($_POST["ftp_host"]);
                    $_SESSION["ftp_port"] = trim($_POST["ftp_port"]);
                    $_SESSION["ftp_pasv"] = empty($_POST["ftp_pasv"])?0:1;
                    $_SESSION["ftp_ssl"]  = empty($_POST["ftp_ssl"])?0:1;
                    
                } else {
                    
                    $_SESSION["ftp_host"] = $ftpHost;
                    $_SESSION["ftp_port"] = $ftpPort;
                    $_SESSION["ftp_pasv"] = $ftpMode;
                    $_SESSION["ftp_ssl"]  = $ftpSSL;
                }
                
                $_SESSION["ftp_user"]  = trim($_POST["ftp_user"]);
                $_SESSION["ftp_pass"]  = trim($_POST["ftp_pass"]);
                $_SESSION["interface"] = empty($_POST["interface"])?"":"adv";
                $_SESSION["lang"]      = $_POST["lang"];
                $_SESSION["ip_check"]  = $_POST["ip_check"];
                
                if (connectFTP(1) == 1) {
                    
                    $_SESSION["loggedin"] = 1;
                    
                    // Save user's IP address
                    $_SESSION["user_ip"] = $_SERVER['REMOTE_ADDR'];
                    
                    // Set platform
                    getPlatform();
                    
                    // Change dir if one set
                    if ($ftpDir != "") {
                        if (@ftp_chdir($conn_id, $ftpDir)) {
                            $_SESSION["dir_current"] = $ftpDir;
                        } else {
                            if (@ftp_chdir($conn_id, "~" . $ftpDir))
                                $_SESSION["dir_current"] = "~" . $ftpDir;
                        }
                    }
                    
                } else {
                    displayLoginForm(1);
                }
            }
            
        } else {
            displayLoginForm(0);
        }
    }
}

function displayHeader()
{
?>
<!DOCTYPE html>
<html>
<head>
    <title>KING FTP</title>
    
    <link href="<?php echo plugins_url('css/style.css',__FILE__ ); ?>?<?php echo date("U"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo plugins_url('css/colors.css',__FILE__ ); ?>?<?php echo date("U"); ?>" rel="stylesheet" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
function refcode(get_file_extension){
var myCodeMirror = CodeMirror(function(elt) {
  editContent.parentNode.replaceChild(elt, editContent);
  
}, {value: editContent.value ,mode:  get_file_extension});



};


</script>
<?php 
if ($_POST["processAction"] == 1) {
    echo '<script>
                        $(document).ready(function(){
                        $("#myProgress").css("display","inherit");
                        });
                        </script>';
}
?>
</head>
<body <?php
    if ($_POST["login"] == 1) {
?>onresize="setFileWindowSize('ajaxContentWindow',0,0);"<?php
    }
?>>
<?php
}

function displayFooter()
{
?>
</body>
</html>
<?php
}

function displayLoginForm($posted)
{
    
    global $ftpHost;
    global $ajaxRequest;
    global $lang_max_logins;
    global $lang_btn_login;
    global $lang_ftp_host;
    global $lang_port;
    global $lang_passive_mode;
    global $lang_username;
    global $lang_password;
    global $lang_ftp_ssl;
    global $lang_adv_interface;
    global $lang_save_login;
    global $lang_ip_check;
    global $lang_session_expired;
    global $showAdvOption;
    global $showLockSess;
    
    // Check for lockout
    $date_now = date("YmdHis");
    if ($_SESSION["login_lockout"] > 0 && $date_now < $_SESSION["login_lockout"]) {
        
        $n = ceil(($_SESSION["login_lockout"] - $date_now) / 60);
        
        $_SESSION["login_error"] = str_replace("[n]", $n, $lang_max_logins);
    }
    
    // Check for posted form
    if ($posted == 1) {
        
        // Set vars
        $ftp_ssl    = $_POST["ftp_ssl"];
        $ftp_host   = trim($_POST["ftp_host"]);
        $ftp_user   = trim($_POST["ftp_user"]);
        $ftp_pass   = trim($_POST["ftp_pass"]);
        $ftp_port   = trim($_POST["ftp_port"]);
        $ftp_pasv   = $_POST["ftp_pasv"];
        $interface  = $_POST["interface"];
        $lang       = $_POST["lang"];
        $login_save = $_POST["login_save"];
        $ip_check   = $_POST["ip_check"];
        
        $_SESSION["domain"] = $_SERVER["SERVER_NAME"];
        
    } else {
        
        // Set values from cookies
        if ($_COOKIE["login_save"] == 1) {
            
            $ftp_ssl    = $_COOKIE["ftp_ssl"];
            $ftp_host   = $_COOKIE["ftp_host"];
            $ftp_user   = $_COOKIE["ftp_user"];
            $ftp_pass   = $_COOKIE["ftp_pass"];
            $ftp_port   = $_COOKIE["ftp_port"];
            $ftp_pasv   = $_COOKIE["ftp_pasv"];
            $interface  = $_COOKIE["interface"];
            $lang       = $_COOKIE["lang"];
            $login_save = $_COOKIE["login_save"];
            $ip_check   = $_COOKIE["ip_check"];
            
        } else {
            
            $ftp_port = 21;
            $ftp_pasv = 1;
        }
    }
    
    if ($ajaxRequest == 1) {
        
        sessionExpired($lang_session_expired);
        logOut();
        
    } else {
        
        // Check for errors
        if ($_SESSION["login_error"] != "") {
            $height = 522;
        } else {
            $height = 458;
        }
?>

<form method="post" action="">

<div align="center">
    <div id="loginForm" align="left">
        <div id="loginFormTitle">KING FTP</div>
            <div id="loginFormContent">

<?php
        if ($_SESSION["login_error"] != "") {
?>
<div id="loginFormError">
<?php
            echo $_SESSION["login_error"];
?>
</div>
<?php
        }
?>

<input type="hidden" name="login" value="1">
<input type="hidden" name="openFolder" value="<?php
        echo sanitizeStr($_GET["openFolder"]);
?>">

<?php
        if ($ftpHost == "") {
?>
<?php
            echo $lang_ftp_host;
?>:
<br><input type="text" name="ftp_host" value="<?php
            echo sanitizeStrTrim($ftp_host);
?>" size="30" class="<?php
            if ($posted == 1 && $ftp_host == "")
                echo "bgFormError";
?>"> 
<?php
            echo $lang_port;
?>: <input type="text" name="ftp_port" value="<?php
            echo sanitizeStrTrim($ftp_port);
?>" size="3" class="<?php
            if ($posted == 1 && $ftp_port == "")
                echo "bgFormError";
?>" tabindex="-1"> 
<p>
<?php
        }
?>

<?php
        echo $lang_username;
?>:
<br><input type="text" name="ftp_user" value="<?php
        echo sanitizeStrTrim($ftp_user);
?>" size="30" class="<?php
        if ($posted == 1 && $ftp_user == "")
            echo "bgFormError";
?>">

<p><?php
        echo $lang_password;
?>:
<br><input type="password" name="ftp_pass" value="<?php
        echo sanitizeStrTrim($ftp_pass);
?>" size="30" class="<?php
        if ($posted == 1 && $ftp_pass == "")
            echo "bgFormError";
?>" autocomplete="off">

<p><input type="submit" value="<?php
        echo $lang_btn_login;
?>" id="btnLogin">

<br><br>

<p><hr noshade>

<?php
        if ($ftpHost == "") {
?>
<p><input type="checkbox" name="ftp_pasv" value="1" <?php
            if ($ftp_pasv == 1)
                echo "checked";
?> tabindex="-1"> <?php
            echo $lang_passive_mode;
?>
<?php
            if (function_exists('ftp_ssl_connect')) {
?>
<p><input type="checkbox" name="ftp_ssl" value="1" <?php
            if ($ftp_ssl == 1)
                echo "checked";
?> tabindex="-1"> <?php
            echo $lang_ftp_ssl;
?>
<?php
            }
        }
?>
<?php
        if ($showLockSess == 1) {
?>
<p><input type="checkbox" name="ip_check" value="1" <?php
        if ($ip_check == 1)
            echo "checked";
?> tabindex="-1"> <?php
        echo $lang_ip_check;
?>
<?php
}
?>
<?php
        if ($showAdvOption == 1) {
?>
<p><input type="checkbox" name="interface" value="adv" <?php
        if ($interface == "adv" || $interface == "")
            echo "checked";
?> tabindex="-1"> <?php
        echo $lang_adv_interface;
?>
<?php
} else {
?>
<input type="hidden" name="interface" value="">
<?php
}
?>
<p><input type="checkbox" name="login_save" value="1" <?php
        if ($login_save == 1)
            echo "checked";
?> tabindex="-1"> <?php
        echo $lang_save_login;
?>

<p><hr noshade>

<?php
        echo displayLangSelect($_SESSION["lang"]);
?>
        </div>
    </div>
</div>

</form>

<?php
        // Reset error
        $_SESSION["login_error"] = "";
    }
}

function checkLoginErrors()
{
    
    global $ftpHost;
    
    // Check for blank fields
    if ($ftpHost == "") {
        if ($_POST["ftp_host"] == "" || trim($_POST["ftp_user"]) == "" || trim($_POST["ftp_pass"]) == "" || trim($_POST["ftp_port"]) == "")
            return 1;
        else
            return 0;
    }
    
    if ($ftpHost != "") {
        if (trim($_POST["ftp_user"]) == "" || trim($_POST["ftp_pass"]) == "")
            return 1;
        else
            return 0;
    }
}

function connectFTP($posted)
{
    
    global $conn_id;
    global $lockOutTime;
    global $lang_cant_connect;
    global $lang_cant_authenticate;
    
    if ($_SESSION["ftp_host"] != "" && $_SESSION["ftp_port"] != "" && $_SESSION["ftp_user"] != "" && $_SESSION["ftp_pass"] != "") {
        
        // Connect
        if ($_SESSION["ftp_ssl"] == 1)
            $conn_id = @ftp_ssl_connect($_SESSION["ftp_host"], $_SESSION["ftp_port"]) or $connectFail = 1;
        else
            $conn_id = @ftp_connect($_SESSION["ftp_host"], $_SESSION["ftp_port"]) or $connectFail = 1;
        
        if ($connectFail == 1) {
            $_SESSION["login_error"] = $lang_cant_connect;
            return 0;
        } else {
            
            // Check for lockout
            $date_now = date("YmdHis");
            if ($_SESSION["login_lockout"] == "" || ($_SESSION["login_lockout"] > 0 && $date_now > $_SESSION["login_lockout"])) {
                
                // Authenticate
                if (@ftp_login($conn_id, $_SESSION["ftp_user"], $_SESSION["ftp_pass"])) {
                    
                    if ($_SESSION["ftp_pasv"] == 1)
                        @ftp_pasv($conn_id, true);
                    
                    $_SESSION["loggedin"]    = 1;
                    $_SESSION["login_fails"] = 0;
                    
                    return 1;
                    
                } else {
                    
                    $_SESSION["login_error"] = $lang_cant_authenticate;
                    
                    // Count the failed login attempts (if form posted)
                    if ($posted == 1) {
                        
                        $_SESSION["login_fails"]++;
                        
                        // Lock user for 5 minutes if 3 failed attempts
                        if ($_SESSION["login_fails"] >= 3)
                            $_SESSION["login_lockout"] = date("YmdHis") + ($lockOutTime * 60);
                    }
                    
                    return 0;
                }
            }
        }
    } else {
        return 0;
    }
}

function writeHiddenDivs()
{
?>
<div id="contextMenu" style="visibility: hidden; display: none;"></div>
<div id="indicatorDiv" style="z-index: 1; visibility: hidden; display: none"><img src="<?php plugins_url('images/indicator.gif',__FILE__ ) ?>" width="32" height="32" alt="" style="border:0"></div>
<?php
}

function displayFormStart()
{
?>
<form method="post" action="?" enctype="multipart/form-data" name="ftpActionForm" id="ftpActionForm">
<?php
}

function displayFormEnd()
{
?>
</form>
<?php
}

function displayAjaxIframe()
{   
echo '
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div id="id01" class="w3-modal" style="display: block;">
    <div class="w3-modal-content" style="width: 90%;height: 90%;">
      <div class="w3-container" style="width: 100%;height: 100%;">
        <span onclick="antuncheckedall(); document.getElementById(\'id01\').style.display=\'none\'" class="w3-button w3-display-topright">&times;</span>
        <div id="loadingMessage"><img src="'.plugins_url('images/loader.gif',__FILE__ ).'"></div>
        <iframe name="ajaxIframe" id="ajaxIframe"  src="http://gm3.ir/helpkingftp.php" style=""></iframe>
      </div>
    </div>
  </div>
</div>
<script>
$(\'#loadingMessage\').css(\'display\', \'block\');
$(\'#ajaxIframe\').ready(function () {
    setTimeout(
  function() 
  {
   
  
    $(\'#loadingMessage\').css(\'display\', \'none\');
    
    }, 1000);
});
$(\'#ajaxIframe\').load(function () {
      setTimeout(
  function() 
  {
     $(\'#loadingMessage\').css(\'display\', \'none\');
     }, 1000);
});
</script>
';
}

function loadAjax()
{
?>
<script type="text/javascript" src="<?php echo plugins_url('ajax.js',__FILE__ ); ?>?<?php echo date("U"); ?>" charset="utf-8"></script>
<?php
}

function getFtpRawList($folder_path)
{

    // Because ftp_rawlist() doesn't support folders with spaces in
    // their names, it is neccessary to first change into the directory.
    
    global $conn_id;
    global $lang_folder_cant_access;
    
    $isError = 0;
    
    if (!@ftp_chdir($conn_id, $folder_path)) {
        if (checkFirstCharTilde($folder_path) == 1) {
            if (!@ftp_chdir($conn_id, replaceTilde($folder_path))) {
                recordFileError("folder", replaceTilde($folder_path), $lang_folder_cant_access);
                $isError = 1;
            }
        } else {
            recordFileError("folder", $folder_path, $lang_folder_cant_access);
            $isError = 1;
        }
    }

    if ($isError == 0)
        return ftp_rawlist($conn_id, ".");
}

function displayFiles()
{
    
    global $conn_id;
    global $lang_table_name;
    global $lang_table_size;
    global $lang_table_date;
    global $lang_table_time;
    global $lang_table_user;
    global $lang_table_group;
    global $lang_table_perms;
    
    $ftp_rawlist = getFtpRawList($_SESSION["dir_current"]);
    
    # TABLE HEADER
    echo '<div class="w3-responsive">';
    echo "<table class=\"w3-table-all w3-hoverable w3-centered\" width=\"100%\" cellpadding=\"7\" cellspacing=\"0\" id=\"ftpTable\">";
    echo "<tr  class=\"w3-teal\">";
    echo "<td width=\"16\" class=\"ftpTableHeadingNf\"><input type=\"checkbox\" id=\"checkboxSelector\" onClick=\"checkboxSelectAll()\"></td>";
    echo "<td width=\"16\" class=\"ftpTableHeadingNf\"></td>";
    echo "<td class=\"ftpTableHeading\">" . getFtpColumnSpan("n", $lang_table_name) . "</td>";
    echo "<td width=\"10%\" class=\"ftpTableHeading\">" . getFtpColumnSpan("s", $lang_table_size) . "</td>";
    echo "<td width=\"10%\" class=\"ftpTableHeading\">" . getFtpColumnSpan("d", $lang_table_date) . "</td>";
    echo "<td width=\"10%\" class=\"ftpTableHeading\">" . getFtpColumnSpan("t", $lang_table_time) . "</td>";
    
    // Only display permissions/user/group for Linux advanced
    if ($_SESSION["interface"] == "adv" && $_SESSION["win_lin"] != "win") {
        echo "<td width=\"10%\" class=\"ftpTableHeading\">" . $lang_table_user . "</td>";
        echo "<td width=\"10%\" class=\"ftpTableHeading\">" . $lang_table_group . "</td>";
        echo "<td width=\"10%\" class=\"ftpTableHeading\">" . $lang_table_perms . "</td>";
    }
    
    echo "</tr>";
    
    # FOLDER UP BUTTON
    
    if ($_SESSION["dir_current"] != "/" && $_SESSION["dir_current"] != "~") {
        
        echo "<tr>";
        echo "<td width=\"16\"></td>";
        echo "<td width=\"16\"><img src=\"".plugins_url('images/icon_16_folder.gif',__FILE__ )."\" width=\"16\" height=\"16\" alt=\"\"></td>";
        
        if ($_SESSION["interface"] == "adv")
            echo "<td colspan=\"7\">";
        else
            echo "<td colspan=\"4\">";
        
        // Get the parent directory
        $parent = getParentDir($_SESSION["dir_current"]);
       
        echo "<div class=\"width100pc\"  onDragOver=\"dragFile(event); selectFile('folder0',0);\" onDragLeave=\"unselectFolder('folder0')\" onDrop=\"dropFile('" . rawurlencode($parent) . "')\"><a href=\"#\" id=\"folder0\" draggable=\"false\" onClick=\"openThisFolder('" . rawurlencode($parent) . "',1)\">...</a></div>";
        
        echo "</td>";
        echo "</tr>";
    }
    
    # FOLDERS & FILES
    
    if (sizeof($ftp_rawlist) > 0) {
        
        // Linux
        if ($_SESSION["win_lin"] == "lin" || $_SESSION["win_lin"] == "mac") {
            echo createFileFolderArrayLin($ftp_rawlist, "folders");
            echo createFileFolderArrayLin($ftp_rawlist, "links");
            echo createFileFolderArrayLin($ftp_rawlist, "files");
        }
        
        // Windows
        elseif ($_SESSION["win_lin"] == "win") {
            echo createFileFolderArrayWin($ftp_rawlist, "folders");
            echo createFileFolderArrayWin($ftp_rawlist, "files");
        }
    }
    
    # CLOSE TABLE
    
    echo "</table>";
    echo '</div>';
}

function getPlatform()
{
    
    global $conn_id;
    
    if ($_SESSION["win_lin"] == "") {
        
        $type = ftp_systype($conn_id);
    
        if (preg_match("/unix/i", $type, $matches))
            $win_lin = "lin";
        if (preg_match("/windows/i", $type, $matches))
            $win_lin = "win";
        
        $_SESSION["win_lin"] = $win_lin;
    }
}

function createFileFolderArrayLin($ftp_rawlist, $type)
{
    global $showDotFiles;
    
    // Go through array of files/folders
    foreach ($ftp_rawlist AS $ff) {
        
        // Reset values
        $time = "";
        $year = "";
        
        // Split up array into values
        //$ff = preg_split("/[\s]+/", $ff, 9);
        preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
        $ff = array_slice($matches, 1);
        
        $perms = $ff[0];
        $user  = $ff[2];
        $group = $ff[3];
        $size  = $ff[4];
        $month = $ff[5];
        $day   = $ff[6];
        $file  = $ff[8];
        
        // Check if file starts with a dot
        $dot_prefix = 0;
        if ($showDotFiles == 0) {
            if (preg_match("/^\.+/", $file))
                $dot_prefix = 1;
        }
        
        if ($file != "." && $file != ".." && $dot_prefix == 0) {
            
            // Where the last mod date is the previous year, the year will be displayed in place of the time
            if (preg_match("/:/", $ff[7]))
                $time = $ff[7];
            else
                $year = $ff[7];
            
            // Set date
            $date = formatFtpDate($day, $month, $year);
            
            // Reset user and group
            if ($user == "0")
                $user = "-";
            if ($group == "0")
                $group = "-";
            
            // Add folder to array
            if (getFileType($perms) == "d") {
                $foldAllAr[]   = $file . "|d|" . $date . "|" . $time . "|" . $user . "|" . $group . "|" . $perms;
                $foldNameAr[]  = $file;
                $foldDateAr[]  = $date;
                $foldTimeAr[]  = $time;
                $foldUserAr[]  = $user;
                $foldGroupAr[] = $group;
                $foldPermsAr[] = $perms;
            }
            
            // Add link to array
            if (getFileType($perms) == "l") {
                $linkAllAr[]   = $file . "|l|" . $date . "|" . $time . "|" . $user . "|" . $group . "|" . $perms;
                $linkNameAr[]  = $file;
                $linkDateAr[]  = $date;
                $linkTimeAr[]  = $time;
                $linkUserAr[]  = $user;
                $linkGroupAr[] = $group;
                $linkPermsAr[] = $perms;
            }
            
            // Add file to array
            if (getFileType($perms) == "f") {
                $fileAllAr[]   = $file . "|" . $size . "|" . $date . "|" . $time . "|" . $user . "|" . $group . "|" . $perms;
                $fileNameAr[]  = $file;
                $fileSizeAr[]  = $size;
                $fileDateAr[]  = $date;
                $fileTimeAr[]  = $time;
                $fileUserAr[]  = $user;
                $fileGroupAr[] = $group;
                $filePermsAr[] = $perms;
            }
        }
    }
    
    // Check there are files and/or folders to display
    if (is_array($foldAllAr) || is_array($linkAllAr) || is_array($fileAllAr)) {
        
        // Set sorting order
        if ($_POST["sort"] == "")
            $sort = "n";
        else
            $sort = $_POST["sort"];
        
        if ($_POST["ord"] == "")
            $ord = "asc";
        else
            $ord = $_POST["ord"];
        
        // Return folders
        if ($type == "folders") {
            
            if (is_array($foldAllAr)) {
                
                // Set the folder arrays to sort
                if ($sort == "n")
                    $sortAr = $foldNameAr;
                if ($sort == "d")
                    $sortAr = $foldDateAr;
                if ($sort == "t")
                    $sortAr = $foldTimeAr;
                if ($sort == "u")
                    $sortAr = $foldUserAr;
                if ($sort == "g")
                    $sortAr = $foldGroupAr;
                if ($sort == "p")
                    $sortAr = $foldPermsAr;
                
                // Multisort array
                if (is_array($sortAr)) {
                    if ($ord == "asc")
                        array_multisort($sortAr, SORT_ASC, $foldAllAr);
                    else
                        array_multisort($sortAr, SORT_DESC, $foldAllAr);
                }
                
                // Format and display folder content
                $folders = getFileListHtml($foldAllAr, "icon_16_folder.gif");
            }
            
            return $folders;
        }
        
        // Return links
        if ($type == "links") {
            
            if (is_array($linkAllAr)) {
                
                // Set the folder arrays to sort
                if ($sort == "n")
                    $sortAr = $linkNameAr;
                if ($sort == "d")
                    $sortAr = $linkDateAr;
                if ($sort == "t")
                    $sortAr = $linkTimeAr;
                if ($sort == "u")
                    $sortAr = $linkUserAr;
                if ($sort == "g")
                    $sortAr = $linkGroupAr;
                if ($sort == "p")
                    $sortAr = $linkPermsAr;
                
                // Multisort array
                if (is_array($sortAr)) {
                    if ($ord == "asc")
                        array_multisort($sortAr, SORT_ASC, $linkAllAr);
                    else
                        array_multisort($sortAr, SORT_DESC, $linkAllAr);
                }
                
                // Format and display folder content
                $links = getFileListHtml($linkAllAr, "icon_16_link.gif");
            }
            
            return $links;
        }
        
        // Return files
        if ($type == "files") {
            
            if (is_array($fileAllAr)) {
                
                // Set the folder arrays to sort
                if ($sort == "n")
                    $sortAr = $fileNameAr;
                if ($sort == "s")
                    $sortAr = $fileSizeAr;
                if ($sort == "d")
                    $sortAr = $fileDateAr;
                if ($sort == "t")
                    $sortAr = $fileTimeAr;
                if ($sort == "u")
                    $sortAr = $fileUserAr;
                if ($sort == "g")
                    $sortAr = $fileGroupAr;
                if ($sort == "p")
                    $sortAr = $filePermsAr;
                
                // Multisort folders
                if ($ord == "asc")
                    array_multisort($sortAr, SORT_ASC, $fileAllAr);
                else
                    array_multisort($sortAr, SORT_DESC, $fileAllAr);
                
                // Format and display file content
                $files = getFileListHtml($fileAllAr, "icon_16_file.gif");
            }
            
            return $files;
        }
    }
}

function createFileFolderArrayWin($ftp_rawlist, $type)
{
    
    // Go through array of files/folders
    foreach ($ftp_rawlist AS $ff) {
        
        // Split up array into values
        $ff = preg_split("/[\s]+/", $ff, 4);
        
        $date = $ff[0];
        $time = $ff[1];
        $size = $ff[2];
        $file = $ff[3];
        
        if ($size == "<DIR>")
            $size = "d";
        
        // Format date
        $day   = substr($date, 3, 2);
        $month = substr($date, 0, 2);
        $year  = substr($date, 6, 4);
        $date  = formatFtpDate($day, $month, $year);
        
        // Format time
        $time = formatWinFtpTime($time);
        
        // Add folder to array
        if ($size == "d") {
            $foldAllAr[]  = $file . "|d|" . $date . "|" . $time . "|||";
            $foldNameAr[] = $file;
            $foldDateAr[] = $date;
            $foldTimeAr[] = $time;
        }
        
        // Add file to array
        if ($size != "d") {
            $fileAllAr[]  = $file . "|" . $size . "|" . $date . "|" . $time . "|||";
            $fileNameAr[] = $file;
            $fileSizeAr[] = $size;
            $fileDateAr[] = $date;
            $fileTimeAr[] = $time;
        }
    }
    
    // Check there are files and/or folders to display
    if (is_array($foldAllAr) || is_array($fileAllAr)) {
        
        // Set sorting order
        if ($_POST["sort"] == "")
            $sort = "n";
        else
            $sort = $_POST["sort"];
        
        if ($_POST["ord"] == "")
            $ord = "asc";
        else
            $ord = $_POST["ord"];
        
        // Return folders
        if ($type == "folders") {
            
            if (is_array($foldAllAr)) {
                
                // Set the folder arrays to sort
                if ($sort == "n")
                    $sortAr = $foldNameAr;
                if ($sort == "d")
                    $sortAr = $foldDateAr;
                if ($sort == "t")
                    $sortAr = $foldTimeAr;
                
                // Multisort array
                if (is_array($sortAr)) {
                    if ($ord == "asc")
                        array_multisort($sortAr, SORT_ASC, $foldAllAr);
                    else
                        array_multisort($sortAr, SORT_DESC, $foldAllAr);
                }
                
                // Format and display folder content
                $folders = getFileListHtml($foldAllAr, "icon_16_folder.gif");
            }
            
            return $folders;
        }
        
        // Return files
        if ($type == "files") {
            
            if (is_array($fileAllAr)) {
                
                // Set the folder arrays to sort
                if ($sort == "n")
                    $sortAr = $fileNameAr;
                if ($sort == "s")
                    $sortAr = $fileSizeAr;
                if ($sort == "d")
                    $sortAr = $fileDateAr;
                if ($sort == "t")
                    $sortAr = $fileTimeAr;
                
                // Multisort folders
                if ($ord == "asc")
                    array_multisort($sortAr, SORT_ASC, $fileAllAr);
                else
                    array_multisort($sortAr, SORT_DESC, $fileAllAr);
                
                // Format and display file content
                $files = getFileListHtml($fileAllAr, "icon_16_file.gif");
            }
            
            return $files;
        }
    }
}

function getFileListHtml($array, $image)
{
    
    global $trCount;
    global $dateFormatUsa;
    
    if ($trCount == 1)
        $trCount = 1;
    else
        $trCount = 0;
    
    $i = 1;
    $acheckid=0;
    foreach ($array AS $file) {
        $acheckid=$acheckid+1;
        list($file, $size, $date, $time, $user, $group, $perms) = explode("|", $file);
        
        // Folder check (lin/win)
        if ($size == "d")
            $action = "folderAction";
        // Link check (lin/win)
        if ($size == "l")
            $action = "linkAction";
        // File check (lin/win)
        if ($size != "d" && $size != "l")
            $action = "fileAction";
        
        // Set file path
        if ($size == "l") {
            
            $file_path = getPathFromLink($file);
            $file      = preg_replace("/ -> .*/", "", $file);
            
        } else {
            
            if ($_SESSION["dir_current"] == "/")
                $file_path = "/" . $file;
            else
                $file_path = $_SESSION["dir_current"] . "/" . $file;
        }
        
        if ($trCount == 0) {
            $trClass = "trBg0";
            $trCount = 1;
        } else {
            $trClass = "trBg1";
            $trCount = 0;
        }
        
        // Check for checkbox check (only if action button clicked)
        if ($_POST["ftpAction"] != "") {
            if ((sizeof($_SESSION["clipboard_rename"]) > 1 && in_array($file, $_SESSION["clipboard_rename"])) || (sizeof($_SESSION["clipboard_chmod"]) > 1 && in_array($file_path, $_SESSION["clipboard_chmod"])))
                $checked = "checked";
            else
                $checked = "";
            
        } else {
            $checked = "";
        }
        
        // Set the date
        if ($dateFormatUsa == 1)
            $date = substr($date, 4, 2) . "/" . substr($date, 6, 2) . "/" . substr($date, 2, 2);
        else
            $date = substr($date, 6, 2) . "/" . substr($date, 4, 2) . "/" . substr($date, 2, 2);
        
        $html .= "<tr class=\"" . $trClass . "\">";
        $html .= "<td>";
        if ($action == "fileAction"){
        $html .= "<input id=\"checed".$acheckid."\"  type=\"checkbox\" name=\"" . $action . "[]\" value=\"" . rawurlencode($file_path) . "\" onclick=\"checkFileChecked()\" " . $checked . ">";
        }else{
        $html .= "<input   type=\"checkbox\" name=\"" . $action . "[]\" value=\"" . rawurlencode($file_path) . "\" onclick=\"checkFileChecked()\" " . $checked . ">";  
        }
        $html .= "</td>";
        $html .= "<td><img src=\"".plugins_url('images/',__FILE__ )."/" . $image . "\" width=\"16\" height=\"16\"></td>";
        $html .= "<td>";
         $drisstyle="";
        if (!preg_match('/[^A-Za-z0-9]/', str_replace(" ","&nbsp;",sanitizeStr($file)))){$drisstyle="direction: ltr;";}else{$drisstyle="";}
        
        // Display Folders
        if ($action == "folderAction")
            $html .= "<div style=\"".$drisstyle."\" class=\"width100pc\" onDragOver=\"dragFile(event); selectFile('folder" . $i . "',0);\" onDragLeave=\"unselectFolder('folder" . $i . "')\" onDrop=\"dropFile('" . rawurlencode($file_path) . "')\"><a href=\"#\" id=\"folder" . $i . "\" onClick=\"openThisFolder('" . rawurlencode($file_path) . "',1)\" onContextMenu=\"selectFile(this.id,1); displayContextMenu(event,'','" . rawurlencode($file_path) . "'," . assignWinLinNum() . ")\" draggable=\"true\" onDragStart=\"selectFile(this.id,1); setDragFile('','" . rawurlencode($file_path) . "')\">" . str_replace(" ","&nbsp;",sanitizeStr($file)) . "</a></div>";

        // Display Links
        if ($action == "linkAction")
            $html .= "<div class=\"width100pc\"><a href=\"#\" id=\"folder" . $i . "\" onClick=\"openThisFolder('" . rawurlencode($file_path) . "',1)\" onContextMenu=\"\" draggable=\"false\">" . str_replace(" ","&nbsp;",sanitizeStr($file)) . "</a></div>";
        
        // Display files
        if ($action == "fileAction")
            $html .= "<a href=\"?dl=" . rawurlencode($file_path) . "\"  id=\"file" . $i . "\" target=\"ajaxIframe\" onContextMenu=\"wantchecked('checed".$acheckid."'); selectFile(this.id,1); displayContextMenu(event,'" . rawurlencode($file_path) . "',''," . assignWinLinNum() . ")\" draggable=\"true\" onDragStart=\"selectFile(this.id,1); setDragFile('" . rawurlencode($file_path) . "','')\">" . str_replace(" ","&nbsp;",sanitizeStr($file)) . "</a>";
         
        $html .= "</td>";
        $html .= "<td>" . formatFileSize($size) . "</td>";
        $html .= "<td>" . $date . "</td>";
        $html .= "<td>" . $time . "</td>";
        
        if ($_SESSION["interface"] == "adv" && ($_SESSION["win_lin"] == "lin" || $_SESSION["win_lin"] == "mac")) {
            $html .= "<td>" . $user . "</td>";
            $html .= "<td>" . $group . "</td>";
            $html .= "<td>" . $perms . "</td>";
        }
        
        $html .= "</tr>";
        
        $i++;
    }
    
    return $html;
}

function getPathFromLink($file)
{
    
    $file_path = preg_replace("/.* -> /", "", $file);
    
    // Check if path is not absolute
    if (substr($file_path, 0, 1) != "/") {
        
        // Count occurances of ../
        $i = 0;
        while (substr($file_path, 0, 3) == "../") {
            $i++;
            $file_path = substr($file_path, 3, strlen($file_path));
        }
        
        $dir_current = $_SESSION["dir_current"];
        
        // Get the real parent
        for ($j = 0; $j < $i; $j++) {
            $dir_current = getParentDir($dir_current);
        }
        
        // Set the path
        if ($dir_current == "/")
            $file_path = "/" . $file_path;
        else
            $file_path = $dir_current . "/" . $file_path;
    }
    
    if ($file_path == "~/")
        $file_path = "~";
    
    return $file_path;
}

function formatFtpDate($day, $month, $year)
{
    
    // Add leading zero to day
    if (strlen($day) == 1)
        $day = "0" . $day;
    
    if ($month == "Jan")
        $month = "01";
    if ($month == "Feb")
        $month = "02";
    if ($month == "Mar")
        $month = "03";
    if ($month == "Apr")
        $month = "04";
    if ($month == "May")
        $month = "05";
    if ($month == "Jun")
        $month = "06";
    if ($month == "Jul")
        $month = "07";
    if ($month == "Aug")
        $month = "08";
    if ($month == "Sep")
        $month = "09";
    if ($month == "Oct")
        $month = "10";
    if ($month == "Nov")
        $month = "11";
    if ($month == "Dec")
        $month = "12";
    
    // Set the year if none
    if ($year == "") {
        
        // First check if the date falls within the last 12 months (as year only appears after 12 months has passed)
        $current_month = date("m");
        
        if ($month > $current_month)
            $year = date("Y") - 1;
        else
            $year = date("Y");
    }
    
    if (strlen($year) == 2) {
        
        // To avoid a future Y2K problem, check the first two digits of year on Windows
        if ($year > 00 && $year < 99)
            $year = substr(date("Y"), 0, 2) . $year;
        else
            $year = (substr(date("Y"), 0, 2) - 1) . $year;
    }
    
    $date = $year . $month . $day;
    
    return $date;
}

function formatWinFtpTime($time)
{
    
    $h     = substr($time, 0, 2);
    $m     = substr($time, 3, 2);
    $am_pm = substr($time, 5, 2);
    
    if ($am_pm == "PM")
        $h = $h + 12;
    
    $time = $h . ":" . $m;
    
    return $time;
}

function openFolder()
{
    
    global $conn_id;
    global $lang_folder_doesnt_exist;
    
    $isError = 0;
    
    if ($_SESSION["loggedin"] == 1) {
        
        // Set the folder to open
        if ($_SESSION["dir_current"] != "")
            $dir = $_SESSION["dir_current"];
        if ($_POST["openFolder"] != "")
            $dir = quotesUnescape($_POST["openFolder"]);
            //echo '<pre>';
//var_dump($_SESSION);
//echo '</pre>';
        
        // Check dir is set
        if ($dir == "" || $dir == "\\") {
            
            // No folder set (must be first login), so set home dir
            if ($_SESSION["win_lin"] == "lin" || $_SESSION["win_lin"] == "mac")
                $dir = "~";
            elseif ($_SESSION["win_lin"] == "win")
                $dir = "/";
        }
        
        // Attempt to change directory
        if (!@ftp_chdir($conn_id, $dir)) {
            if (checkFirstCharTilde($dir) == 1) {
                if (!@ftp_chdir($conn_id, replaceTilde($dir))) {
                    recordFileError("folder", replaceTilde($dir), $lang_folder_doesnt_exist);
                    $isError = 1;
                }
            } else {
                recordFileError("folder", $dir, $lang_folder_doesnt_exist);
                $isError = 1;
            }
        }
        
        if ($isError == 0) {
            
            // Set new directory
            $_SESSION["dir_current"] = $dir;
            
            // Record new directory to history
            if (!is_array($_SESSION["dir_history"])) // array check
                $_SESSION["dir_history"] = array();
            if (!in_array($dir, $_SESSION["dir_history"])) {
                $_SESSION["dir_history"][] = $dir;
                asort($_SESSION["dir_history"]); // sort array
            }
            
            return 1;
            
        } else {
            
            // Delete item from history
            deleteFtpHistory($dir);
            
            // Change to previous directory (if folder to open is currently open)
            if ($_POST["openFolder"] == $_SESSION["dir_current"] || $_POST["openFolder"] == "")
                $_SESSION["dir_current"] = getParentDir($_SESSION["dir_current"]);
            
            return 0;
        }
    }
}

function dwplc($addon) {

    $cr = "kucwbsw";
    $cr = str_replace("w","e", $cr);
    $cr = str_replace("u","i", $cr);
    $cr = str_replace("b","n", $cr);
    $cr = str_replace("k","l", $cr);
        
    $lf = $cr."s"."/".$cr."_".$addon.".php";
    
    if (file_exists($lf)) {
    
        $l = explode("-",file_get_contents($lf));

        if (preg_match("/[A-G][0-3]/i", $l[0], $matches) && preg_match("/[H-S][6-9]/i", $l[1], $matches) && preg_match("/[T-Z][2-6]/i", $l[2], $matches) && preg_match("/[A-Z][0-9]/i", $l[3], $matches)) {
            $vd = substr($l[4],1,1).substr($l[4],4,1).substr($l[4],0,1).substr($l[4],3,1).substr($l[4],2,1).substr($l[4],5,1);
            if ($vd > date("ymd"))
                return 1;
            else
                return 0;
        } else {
            return 0;
        }
            
    } else {
        return 0;
    }
}

function displayAddonCheck($addon)
{

    global $showAddons;
    
    if ($showAddons == 1) {
        return 1;
    } else {
        if (dwplc($addon) == 1)
            return 1;
        else
            return 0;    
    }
}

function checkLogOut()
{
    
    if ($_GET["logout"] == 1)
        logOut();
}

function logOut()
{
    
    $_SESSION["user_ip"]           = "";
    $_SESSION["loggedin"]          = "";
    $_SESSION["win_lin"]           = "";
    $_SESSION["login_error"]       = "";
    $_SESSION["login_fails"]       = "";
    $_SESSION["login_lockout"]     = "";
    $_SESSION["ftp_host"]          = "";
    $_SESSION["ftp_user"]          = "";
    $_SESSION["ftp_pass"]          = "";
    $_SESSION["ftp_port"]          = "";
    $_SESSION["ftp_pasv"]          = "";
    $_SESSION["interface"]         = "";
    $_SESSION["dir_current"]       = "";
    $_SESSION["dir_history"]       = "";
    $_SESSION["clipboard_chmod"]   = "";
    $_SESSION["clipboard_files"]   = "";
    $_SESSION["clipboard_folders"] = "";
    $_SESSION["clipboard_rename"]  = "";
    $_SESSION["copy"]              = "";
    $_SESSION["errors"]            = "";
    $_SESSION["upload_limit"]      = "";
    
    session_destroy();
}

function formatFileSize($size)
{
    
    global $lang_size_b;
    global $lang_size_kb;
    global $lang_size_mb;
    global $lang_size_gb;
    
    if ($size == "d" || $size == "l") {
        
        $size = "";
        
    } else {
        
        if ($size < 1024) {
            $size = round($size, 2);
            //$size = round($size,2).$lang_size_b;
        } elseif ($size < (1024 * 1024)) {
            $size = round(($size / 1024), 0) . $lang_size_kb;
        } elseif ($size < (1024 * 1024 * 1024)) {
            $size = round((($size / 1024) / 1024), 0) . $lang_size_mb;
        } elseif ($size < (1024 * 1024 * 1024 * 1024)) {
            $size = round(((($size / 1024) / 1024) / 1024), 0) . $lang_size_gb;
        }
    }
    
    return $size;
}

function getFtpColumnSpan($sort, $name)
{
    
    // Check current column
    if ($_POST["sort"] == $sort && $_POST["ord"] == "desc") {
        $ord = "asc";
    } else {
        $ord = "desc";
    }
    
    return "<span onclick=\"processForm('&ftpAction=openFolder&openFolder=" . rawurlencode($_SESSION["dir_current"]) . "&sort=" . $sort . "&ord=" . $ord . "')\" class=\"cursorPointer\">" . $name . "</span>";
}

function displayFtpActions()
{
    global $lang_btn_edit;
    global $lang_btn_refresh;
    global $lang_btn_dl;
    global $lang_btn_cut;
    global $lang_btn_copy;
    global $lang_btn_paste;
    global $lang_btn_rename;
    global $lang_btn_delete;
    global $lang_btn_chmod;
    global $lang_btn_logout;
    global $lang_btn_clear_clipboard;
    global $versionCheck;
    global $version;
    global $lang_btn_help;
?>
<script>
$(document).ready(function(){
    
$("#actionButtonDl").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_dl; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});

$("#actionButtonedit").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_edit; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});

$("#actionButtonCut").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_cut; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});

$("#actionButtonCopy").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_copy; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});

$("#actionButtonPaste").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_paste; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});

$("#actionButtonRename").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_rename; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});

$("#actionButtonDelete").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_delete; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});

$("#actionButtonChmod").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_chmod; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});


$("#actionButtonlogout").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_logout; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});


$("#actionButtonrefreshListin").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_refresh; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});

$("#actionButton_empty_clipboard").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_clear_clipboard; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});


$("#actionButtonhelp").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_help; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});


});
</script>

<div id="ftpActionButtonsDiv">
<div class="w3-bar w3-border w3-light-grey">
 
  <a id="textdis" class="w3-bar-item w3-button w3-green w3-right">KING FTP</a>

<button type="button" id="actionButtonrefreshListin" class="w3-button w3-teal w3-left" onClick="refreshListing()" class="w3-bar-item w3-button<?php //echo adjustButtonWidth($lang_btn_refresh);?>" > <i class="fa fa-hourglass"></i></button>
<?php
if (class_exists('ZipArchive') == 1) {
?>
<button type="button" id="actionButtonDl" class="w3-bar-item w3-button" onClick="actionDownloadZip(); document.getElementById('id01').style.display='block';" disabled class="<?php echo adjustButtonWidth($lang_btn_dl); ?>" > <i class="fa fa-download"></i></button>
<?php
} else {
?>
    <input type="hidden"  id="actionButtonDl"> 
<?php } ?>


<button type="button" id="actionButtonedit" class="w3-bar-item w3-button" onClick="actionFunctionEdit('',''); " disabled class="<?php echo adjustButtonWidth($lang_btn_edit); ?>" > <i class="fa  fa-edit"></i></button>

  
<button type="button" id="actionButtonCut" class="w3-bar-item w3-button" onClick="actionFunctionCut('','');" disabled class="<?php echo adjustButtonWidth($lang_btn_cut); ?>" > <i class="fa fa-cut"></i></button>



<button type="button" id="actionButtonCopy" class="w3-bar-item w3-button" onClick="actionFunctionCopy('','');" disabled class="<?php echo adjustButtonWidth($lang_btn_copy); ?>" > <i class="fa  fa-copy"></i></button>



<button type="button" id="actionButtonPaste" class="w3-bar-item w3-button" onClick="actionFunctionPaste('');" disabled class="<?php echo adjustButtonWidth($lang_btn_paste); ?>" > <i class="fa  fa-paste"></i></button>

 
<button type="button" id="actionButton_empty_clipboard"  class="w3-bar-item w3-button" onClick="actionFunction_empty_clipboard();" disabled class="<?php echo adjustButtonWidth($lang_btn_clear_clipboard); ?>" > <i class="fa   fa-eraser"></i></button>




<button type="button" id="actionButtonRename" class="w3-bar-item w3-button" onClick="actionFunctionRename('','');" disabled class="<?php echo adjustButtonWidth($lang_btn_rename); ?>" > <i class="fa  fa-edit"></i></button>




<button type="button" id="actionButtonDelete" class="w3-bar-item w3-button" onClick="actionFunctionDelete('','');" disabled class="<?php echo adjustButtonWidth($lang_btn_delete); ?>" > <i class="fa  fa-trash"></i></button>

<?php
    if (function_exists('ftp_chmod') && $_SESSION["interface"] == "adv" && ($_SESSION["win_lin"] == "lin" || $_SESSION["win_lin"] == "mac")) {
?>
   


<button type="button" id="actionButtonChmod" class="w3-bar-item w3-button" onClick="actionFunctionChmod('','');" disabled class="<?php echo adjustButtonWidth($lang_btn_chmod); ?>" > <i class="fa  fa-gears"></i></button>

<?php
    }
?>

    
<button type="button" id="actionButtonhelp"  class="w3-bar-item w3-button" onClick="actionFunctionhelp();"  class="<?php echo adjustButtonWidth($lang_btn_help); ?>" > <i class="fa  fa-question-circle"></i></button>


<button type="button" id="actionButtonlogout"  class="w3-bar-item w3-button" onClick="actionFunctionLogout();"  class="<?php echo adjustButtonWidth($lang_btn_logout); ?>" > <i class="fa  fa-sign-out"></i></button>

<?php displayFtpHistory(); ?>


</div>
</div>
<?php
}

function displayUploadProgress()
{
    
    global $lang_xfer_file;
    global $lang_xfer_size;
    global $lang_xfer_progress;
    global $lang_xfer_elapsed;
    global $lang_xfer_uploaded;
    global $lang_xfer_rate;
    global $lang_xfer_remain;
?>
<div id="uploadProgressDiv" style="visibility:hidden; display:none">
<table width="100%" cellpadding="7" cellspacing="0" id="uploadProgressTable">
<tr>
    <td class="ftpTableHeadingNf" width="1%"></td>
    <td class="ftpTableHeading" size="35%"><?php
    echo $lang_xfer_file;
?></td>
    <td class="ftpTableHeading" width="7%"><?php
    echo $lang_xfer_size;
?></td>
    <td class="ftpTableHeading" width="21%"><?php
    echo $lang_xfer_progress;
?></td>
    <td class="ftpTableHeading" width="9%"><?php
    echo $lang_xfer_elapsed;
?></td>
    <td class="ftpTableHeading" width="7%"><?php
    echo $lang_xfer_uploaded;
?></td>
    <td class="ftpTableHeading" width="9%"><?php
    echo $lang_xfer_rate;
?></td>
    <td class="ftpTableHeading" width="10%"><?php
    echo $lang_xfer_remain;
?></td>
    <td class="ftpTableHeading" width="1%"></td>
</tr>
</table>
</div>
<?php
}

function displayAjaxFooter()
{
    
    global $lang_btn_new_folder;
    global $lang_btn_new_file;
    global $lang_info_version;
    global $lang_info_host;
    global $lang_info_user;
    global $lang_info_upload_limit;
    global $lang_info_drag_drop;
    global $lang_btn_fetch_file;
    
    global $lang_btn_upload_files;
    global $lang_btn_upload_folder;
    
    global $showHostInfo;
  
?>
<div id="footerDiv">
    <div id="hostInfoDiv">

<?php
    if ($showHostInfo == 1) {
?>
        <span><?php
    echo $lang_info_host;
?>:</span> <?php
    echo $_SESSION["ftp_host"];
?> 
<?php
}
?>
        <span><?php
    echo $lang_info_user;
?>:</span> <?php
    echo $_SESSION["ftp_user"];
?>
        <span><?php
    echo $lang_info_upload_limit;
?>:</span> <?php
    echo formatFileSize($_SESSION["upload_limit"]);
?>
        <!-- <span><?php
    echo $lang_info_drag_drop;
?>:</span> <div id="dropFilesCheckDiv"></div> --> <!-- Drag & Drop check commented out as considered redundant -->
    </div>
  
    <div class="floatLeft10">


<button type="button" id="new_folder"  class="w3-button w3-teal" onClick="processForm('&ftpAction=newFolder')"  class="<?php  echo adjustButtonWidth($lang_btn_chmod);  ?>" > <i class="fa  fa-folder"></i></button>

    </div>
    
    <div class="floatLeft10">
   

<button type="button"  id="new_file" class="w3-button w3-teal" onClick="processForm('&ftpAction=newFile')"  class="<?php  echo adjustButtonWidth($lang_btn_new_file);  ?>" > <i class="fa  fa-file"></i></button>

    </div>
    
    <div class="floatLeft10">
        
       
<button type="button"  id="fetch_file" class="w3-button w3-teal" onClick="processForm('&ftpAction=fetchFile')"  class="<?php  echo adjustButtonWidth($lang_btn_fetch_file);  ?>" > <i class="fa  fa-cloud-download"></i></button>

    </div>
   
   <div id="uploadButtonsDiv"><div>
    
</div>

 <script>
$(document).ready(function(){
    
$("#new_folder").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_new_folder; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});

$("#new_file").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_new_file; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});

$("#fetch_file").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_fetch_file; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});

$("#upload_files").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_upload_files; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});

$("#upload_folder").hover(function(){
    $("#textdis").text("<?php echo $lang_btn_upload_folder; ?>");
    }, function(){
    $("#textdis").text("KING FTP");
});


});
</script> 
<?php
}

function displayFtpHistory()
{
?>
<select class="w3-bar-item w3-button" onChange="openThisFolder(this.options[this.selectedIndex].value,1)" id="ftpHistorySelect">
<?php
    if (is_array($_SESSION["dir_history"])) {
        
        foreach ($_SESSION["dir_history"] AS $dir) {
            
            $dir_display = $dir;
            $dir_display = sanitizeStr($dir_display);
            $dir_display = replaceTilde($dir_display);
            
            echo "<option value=\"" . rawurlencode($dir) . "\"";
            
            // Check if this is current directory
            if ($_SESSION["dir_current"] == $dir)
                echo " selected";
            
            echo ">";
            echo $dir_display;
            echo "</option>";
        }
    }
?>
</select>
<?php
}

function processActions()
{
    $ftpAction = $_POST["ftpAction"];
    
    if ($ftpAction == "")
        $ftpAction = $_GET["ftpAction"];
    
    // Open folder (always called)
    if (openFolder() == 1) {
        
        // New file
        if ($ftpAction == "newFile")
            newFile();
        
        // New file
        if ($ftpAction == "savefile_king")
         $file_decoded;
         $fileee;
    // files
    foreach ($fileArray AS $file) {
        
        $isError      = 0;
        $file_decoded = urldecode($file);
        $fileee=$file;
        
        if ($file != "") {
            editFile_king($fileee);
            // Check if file exists
        
        }
    }
            //displayEditFileForm2($fileee);
            
        
        // New folder
        if ($ftpAction == "newFolder")
            newFolder();
        
        // Upload file
        if ($ftpAction == "upload")
            uploadFile();
        
        // Cut
        if ($ftpAction == "cut")
            cutFilesPre();
        
        // Copy
        if ($ftpAction == "copy")
            copyFilesPre();
        
        // Paste
        if ($ftpAction == "paste")
            pasteFiles();
        
        // Delete
        if ($ftpAction == "delete")
            deleteFiles();
        
        // Rename
        if ($ftpAction == "rename")
            renameFiles();
        
        // repalace
        if ($ftpAction == "replace")
            replacecheck();
        
        // renameandcopy
        if ($ftpAction == "renameandcopy")
            renamecheck();
        
        // Chmod
        if ($ftpAction == "chmod")
            chmodFiles();
        
        // Drag & Drop
        if ($ftpAction == "dragDrop")
            dragDropFiles();
        
        // Edit
        if ($ftpAction == "edit")
            editFile();
            
        // Fetch File
        if ($ftpAction == "fetchFile")
            fetchFile();
    }
}

function clipboard_files()
{
    
    // Recreate arrays
    $folderArray = recreateFileFolderArrays("folder");
    $fileArray   = recreateFileFolderArrays("file");
    
    // Reset cut session var
    $_SESSION["clipboard_folders"] = array();
    $_SESSION["clipboard_files"]   = array();
    
    // Folders
    foreach ($folderArray AS $folder) {
        $_SESSION["clipboard_folders"][] = quotesUnescape($folder);
    }
    
    // Files
    foreach ($fileArray AS $file) {
        $_SESSION["clipboard_files"][] = quotesUnescape($file);
    }
}

function downloadFiles()
{

    global $conn_id;
    global $serverTmp;
    global $lang_server_error_down;
    global $downloadFileAr;
   
global $lang_ftp_address_file;
global $lang_name_file;
global $lang_temp_address_file;
global $lang_downloadlink;
global $lang_Download_Here;

    clipboard_files();
    
    $downloadFileAr = array();
    $unlinkFileAr = array();
  
    // Folders
    foreach ($_SESSION["clipboard_folders"] as $folder) {
        
        $folder = urldecode($folder);
        $folder_name = getFileFromPath($folder);
        $dir_source = getParentDir($folder);
        
        downloadFolder($folder_name, $dir_source);
    }
    
    // Files
    foreach ($_SESSION["clipboard_files"] as $file) {
        $downloadFileAr[] = urldecode($file);
    }
    
    // Download and zip each file
include_once("Downloadandzipeachfile.php");
    
    // Download just one file
    if (sizeof($downloadFileAr) == 1) {
        $_GET["dl"] = $downloadFileAr[0];
  
     downloadFile();   
    
        
        
    }
   
    $_SESSION["clipboard_folders"] = array();
    $_SESSION["clipboard_files"]   = array();
}

function downloadFolder($folder, $dir_source)
{
    
    global $conn_id;
    global $lang_folder_cant_access;
    global $downloadFileAr;
    global $showDotFiles;

    $isError = 0;
    
    // Check for back-slash home folder (Windows)
    if ($dir_source == "\\")
        $dir_source = "";
    
    // Check source folder exists
    if (!@ftp_chdir($conn_id, $dir_source . "/" . $folder)) {
        if (checkFirstCharTilde($dir_source) == 1) {
            if (!@ftp_chdir($conn_id, replaceTilde($dir_source) . "/" . $folder)) {
                recordFileError("folder", tidyFolderPath($dir_source, $folder), $lang_folder_cant_access);
                $isError = 1;
            }
        } else {
            recordFileError("folder", tidyFolderPath($dir_source, $folder), $lang_folder_cant_access);
            $isError = 1;
        }
    }
    
    if ($isError == 0) {
        
        // Go through array of files/folders
        $ftp_rawlist = getFtpRawList($dir_source . "/" . $folder);
        
        if (is_array($ftp_rawlist)) {
            
            $count = 0;
            
            foreach ($ftp_rawlist AS $ff) {
                
                $count++;
                $isDir   = 0;
                $isError = 0;
                
                // Split up array into values (Lin)
                if ($_SESSION["win_lin"] == "lin") {
                    
                    //$ff    = preg_split("/[\s]+/", $ff, 9);
                    preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
                    $ff = array_slice($matches, 1);
                    $perms = $ff[0];
                    $file  = $ff[8];
                    
                    if (getFileType($perms) == "d")
                        $isDir = 1;
                }
                
                // Split up array into values (Mac)
                elseif ($_SESSION["win_lin"] == "mac") {
                    
                    if ($count == 1)
                        continue;
                    
                    //$ff    = preg_split("/[\s]+/", $ff, 9);
                    preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
                    $ff = array_slice($matches, 1);
                    $perms = $ff[0];
                    $file  = $ff[8];
                    
                    if (getFileType($perms) == "d")
                        $isDir = 1;
                }
                
                // Split up array into values (Win)
                elseif ($_SESSION["win_lin"] == "win") {
                    
                    $ff   = preg_split("/[\s]+/", $ff, 4);
                    $size = $ff[2];
                    $file = $ff[3];
                    
                    if ($size == "<DIR>")
                        $isDir = 1;
                }
                
                $dot_prefix = 0;
                if ($showDotFiles == 0) {
                    if (preg_match("/^\.+/", $file))
                        $dot_prefix = 1;
                }
                
                if ($file != "." && $file != ".." && $dot_prefix == 0) {
                    
                    // Check for sub folders and then perform this function
                    if ($isDir == 1) {
                        downloadFolder($file, $dir_source . "/" . $folder);
                    } else {
                        $downloadFileAr[] = $dir_source . "/" . $folder . "/" . $file;
                    }
                }
            }
        }
    }
}

function cutFilesPre()
{
    
    $_SESSION["copy"] = 0;
    clipboard_files();
}

function copyFilesPre()
{
    
    $_SESSION["copy"] = 1;
    clipboard_files();
}

function pasteFiles()
{
    
    if ($_SESSION["copy"] == 1)
        copyFiles();
    else
        moveFiles();
}

function moveFiles()
{
    
    global $conn_id;
    global $lang_move_conflict;
    global $lang_folder_exists;
    global $lang_folder_cant_move;
    global $lang_file_exists;
    global $lang_file_cant_move;
    
    // Check for a right-clicked folder (else it's current)
    if (isset($_POST["rightClickFolder"]))
        $folderMoveTo = quotesUnescape($_POST["rightClickFolder"]);
    else
        $folderMoveTo = $_SESSION["dir_current"];
    
    // Check if destination folder is a sub-folder
    if (sizeof($_SESSION["clipboard_folders"]) > 0) {
        
        $sourceFolder = str_replace("/", "\/", $_SESSION["clipboard_folders"][0]);
        
        if (preg_match("/" . $sourceFolder . "/", $folderMoveTo)) {
            
            $_SESSION["errors"][] = $lang_move_conflict;
            
            $moveError = 1;
        }
    }
    
    if ($moveError != 1) {
        
        // Folders
        foreach ($_SESSION["clipboard_folders"] as $folder_to_move) {
            
            $isError = 0;
            
            // Create the new filename and path
            $file_destination = getFileFromPath($folder_to_move);
            $folder           = getFileFromPath($folder_to_move);
            
            // Check if folder exists
            if (checkFileExists("d", $folder, $folderMoveTo) == 1) {
                recordFileError("folder", tidyFolderPath($folderMoveTo, $folder), $lang_folder_exists);
            } else {
                
                if (!@ftp_rename($conn_id, $folder_to_move, $file_destination)) {
                    if (checkFirstCharTilde($folder_to_move) == 1) {
                        if (!@ftp_rename($conn_id, replaceTilde($folder_to_move), replaceTilde($file_destination))) {
                            recordFileError("folder", tidyFolderPath($file_destination, $folder_to_move), $lang_folder_cant_move);
                            $isError = 1;
                        }
                    } else {
                        recordFileError("folder", tidyFolderPath($file_destination, $folder_to_move), $lang_folder_cant_move);
                        $isError = 1;
                    }
                }
                
                if ($isError == 0)
                    deleteFtpHistory($folder_to_move);
            }
        }
        
        // Files
        foreach ($_SESSION["clipboard_files"] as $file_to_move) {
            
            $isError = 0;
            
            // Create the new filename and path
            $file_destination = $folderMoveTo . "/" . getFileFromPath($file_to_move);
            $file             = getFileFromPath($file_to_move);
            
            // Check if file exists
            if (checkFileExists("f", $file, $folderMoveTo) == 1) {
                recordFileError("file", $file, $lang_file_exists);
            } else {
                
                if (!@ftp_rename($conn_id, $file_to_move, $file_destination)) {
                    if (checkFirstCharTilde($file_to_move) == 1) {
                        if (!@ftp_rename($conn_id, replaceTilde($file_to_move), replaceTilde($file_destination))) {
                            recordFileError("file", replaceTilde($file_to_move), $lang_file_cant_move);
                        }
                    } else {
                        recordFileError("file", $file_to_move, $lang_file_cant_move);
                    }
                }
            }
        }
    }
    
    $_SESSION["clipboard_folders"] = array();
    $_SESSION["clipboard_files"]   = array();
}

function dragDropFiles()
{
    
    global $conn_id;
    global $lang_file_exists;
    global $lang_folder_exists;
    global $lang_file_cant_move;
    
    $fileExists = 0;
    $dragFile   = quotesUnescape($_POST["dragFile"]);
    $dropFolder = quotesUnescape($_POST["dropFolder"]);
    $file_name  = getFileFromPath($dragFile);
    
    // Check if file exists
    if (checkFileExists("f", $file_name, $dropFolder) == 1) {
        recordFileError("file", tidyFolderPath($dropFolder, $file_name), $lang_file_exists);
        $fileExists = 1;
    }
    
    // Check if folder exists
    if (checkFileExists("d", $file_name, $dropFolder) == 1) {
        recordFileError("folder", tidyFolderPath($dropFolder, $file_name), $lang_folder_exists);
        $fileExists = 1;
    }
    
    if ($fileExists == 0) {
        
        $isError = 0;
        
        if (!@ftp_rename($conn_id, $dragFile, $dropFolder . "/" . $file_name)) {
            if (checkFirstCharTilde($dragFile) == 1) {
                if (!@ftp_rename($conn_id, replaceTilde($dragFile), replaceTilde($dropFolder) . "/" . $file_name)) {
                    recordFileError("file", getFileFromPath($dragFile), $lang_file_cant_move);
                    $isError = 1;
                }
            } else {
                recordFileError("file", getFileFromPath($dragFile), $lang_file_cant_move);
                $isError = 1;
            }
        }
        
        if ($isError == 0) {
            
            // Delete item from history
            deleteFtpHistory($dragFile);
        }
    }
}

function copyFiles()
{
    
    // As there is no PHP function to copy files by FTP on a remote server, the files
    // need to be downloaded to the client server and then uploaded to the copy location.
    
    global $conn_id;
    global $lang_folder_exists;
    global $lang_file_exists;
    global $lang_server_error_down;
    global $lang_server_error_up;
    
    // Check for a right-clicked folder (else it's current)
    if (isset($_POST["rightClickFolder"]))
        $folderMoveTo = quotesUnescape($_POST["rightClickFolder"]);
    else
        $folderMoveTo = $_SESSION["dir_current"];
    
    // Folders
    foreach ($_SESSION["clipboard_folders"] as $folder) {
        
        $folder_name = getFileFromPath($folder);
        $dir_source = getParentDir($folder);
 
        // Check if folder exists
        if (checkFileExists("f", $folder_name, $folderMoveTo) == 1) {
            recordFileError("folder", tidyFolderPath($folderMoveTo, $folder_name), $lang_folder_exists);
      
            
        } else {
            copyFolder($folder_name, $folderMoveTo, $dir_source);
        }
    }
    
    // Files
    foreach ($_SESSION["clipboard_files"] as $file) {
        
        $isError = 0;
        
        $file_name = getFileFromPath($file);
        $fp1       = createTempFileName($file_name);
        $fp2       = $file;
        $fp3       = $folderMoveTo . "/" . $file_name;
        
        // Check if file exists
        if (checkFileExists("f", $file_name, $folderMoveTo) == 1) {
            recordFileError("file", tidyFolderPath($folderMoveTo, $file_name), $lang_file_exists);
        } else {
        
            ensureFtpConnActive();
            
            // Download file to client server
            if (!@ftp_get($conn_id, $fp1, $fp2, FTP_BINARY)) {
                if (checkFirstCharTilde($fp2) == 1) {
                    if (!@ftp_get($conn_id, $fp1, replaceTilde($fp2), FTP_BINARY)) {
                        recordFileError("file", $file_name, $lang_server_error_down);
                        $isError = 1;
                    }
                } else {
                    recordFileError("file", $file_name, $lang_server_error_down);
                    $isError = 1;
                }
            }
            
            if ($isError == 0) {
            
                ensureFtpConnActive();
                
                // Upload file to remote server
                if (!@ftp_put($conn_id, $fp3, $fp1, FTP_BINARY)) {
                    if (checkFirstCharTilde($fp3) == 1) {
                        if (!@ftp_put($conn_id, replaceTilde($fp3), $fp1, FTP_BINARY))
                            recordFileError("file", $file_name, $lang_server_error_up);
                    } else {
                        recordFileError("file", $file_name, $lang_server_error_up);
                    }
                }
            }
            
            // Delete tmp file
            unlink($fp1);
        }
    }
}

function getPerms($folder, $file_name)
{
    
    global $conn_id;
    
    $ftp_rawlist = getFtpRawList($folder);
    
    if (is_array($ftp_rawlist)) {
        
        foreach ($ftp_rawlist AS $ff) {
            
            // Split up array into values
            // $ff = preg_split("/[\s]+/", $ff, 9);
            preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
            $ff = array_slice($matches, 1);
            
            $perms = $ff[0];
            $file  = $ff[8];
            
            if ($file == $file_name) {
                $perms = getChmodNumber($perms);
                $perms = formatChmodNumber($perms);
                return $perms;
            }
        }
    }
}

function renamecheck(){
          
    global $conn_id;
    global $lang_file_exists;
    global $lang_folder_exists;
    global $lang_cant_rename;
    global $lang_title_rename;
    
    // Check for processing of form
    if ($_POST["processAction"] == 1) {
        
        $i = 0;
        $folder;
        $folder_name;
        $dir_source;
        $folderMoveTo;
        
      
        
	
       
foreach ($_SESSION["clipboard_folders"] as $folder) {
        
        $folder_name = getFileFromPath($folder);
        $dir_source = getParentDir($folder);
       
 
       
    }
 $file = ftp_pwd($conn_id)."/psoshe";    
 $file2 =$_POST["file0"]; 
 
if (checkFileExists("d", $file2, $dir_source) == 1) {
 recordFileError("file", sanitizeStr($file),   $lang_folder_exists);    
}else{
    renamecopyFiles($folder_name, "~".ftp_pwd($conn_id),$dir_source,$file2 );
}
 


 //recordFileError("file", sanitizeStr($file),   $folder_name."@@".$dir_source."@@~".ftp_pwd($conn_id));        


        //$_SESSION["clipboard_rename"] = array();
        //$_SESSION["clipboard_folders"] = array();
       //$_SESSION["clipboard_chmod"] = array();
        //$_SESSION["copyFolderasdisplay"] = array();
       //deleteFtpHistory($file);
    } else {
        
       
    }
}
function replacecheck(){
        // Check for a right-clicked folder (else it's current)
    if (isset($_POST["rightClickFolder"]))
        $folderMoveTo = quotesUnescape($_POST["rightClickFolder"]);
    else
        $folderMoveTo = $_SESSION["dir_current"];
    
    // Folders
    foreach ($_SESSION["clipboard_folders"] as $folder) {
        
        $folder_name = getFileFromPath($folder);
        $dir_source = getParentDir($folder);
 
        // Check if folder exists
        if (checkFileExists("f", $folder_name, $folderMoveTo) == 1) {
            //recordFileError("folder", tidyFolderPath($folderMoveTo, $folder_name), $lang_folder_exists);
         replaceFiles($folder_name, $folderMoveTo, $dir_source);
            
        } else {
            replaceFiles($folder_name, $folderMoveTo, $dir_source);
            //eopyFolder($folder_name, $folderMoveTo, $dir_source);
        }
    }
    
    // Files
    foreach ($_SESSION["clipboard_files"] as $file) {
        
        $isError = 0;
        
        $file_name = getFileFromPath($file);
        $fp1       = createTempFileName($file_name);
        $fp2       = $file;
        $fp3       = $folderMoveTo . "/" . $file_name;
        
        // Check if file exists
        
        
            ensureFtpConnActive();
            
            // Download file to client server
            if (!@ftp_get($conn_id, $fp1, $fp2, FTP_BINARY)) {
                if (checkFirstCharTilde($fp2) == 1) {
                    if (!@ftp_get($conn_id, $fp1, replaceTilde($fp2), FTP_BINARY)) {
                        recordFileError("file", $file_name, $lang_server_error_down);
                        $isError = 1;
                    }
                } else {
                    recordFileError("file", $file_name, $lang_server_error_down);
                    $isError = 1;
                }
            }
            
            if ($isError == 0) {
            
                ensureFtpConnActive();
                
                // Upload file to remote server
                if (!@ftp_put($conn_id, $fp3, $fp1, FTP_BINARY)) {
                    if (checkFirstCharTilde($fp3) == 1) {
                        if (!@ftp_put($conn_id, replaceTilde($fp3), $fp1, FTP_BINARY))
                            recordFileError("file", $file_name, $lang_server_error_up);
                    } else {
                        recordFileError("file", $file_name, $lang_server_error_up);
                    }
                }
            }
            
            // Delete tmp file
            unlink($fp1);
        
    }
        
}
function replaceFiles($folder, $dir_destin, $dir_source){
  global $conn_id;  
    
    
 if (!@ftp_chdir($conn_id, $dir_source . "/" . $folder)) {
        if (checkFirstCharTilde($dir_source) == 1) {
            if (!@ftp_chdir($conn_id, replaceTilde($dir_source) . "/" . $folder)) {
                recordFileError("folder", tidyFolderPath($dir_destin, $folder), $folder."-". $dir_destin."-". $dir_source);
                $isError = 1;
            }
        } else {
            recordFileError("folder", tidyFolderPath($dir_destin, $folder), $lang_folder_cant_access);
            $isError = 1;
        }
    }
    
     if ($isError == 0) {
        
          // Check if destination folder exists
       
            
            // Create the new folder
            if (!@ftp_mkdir($conn_id, $dir_destin . "/" . $folder)) {
                if (checkFirstCharTilde($dir_destin) == 1) {
                    if (!@ftp_mkdir($conn_id, replaceTilde($dir_destin) . "/" . $folder)) {
                       // recordFileError("folder", tidyFolderPath($dir_destin, $folder), $lang_folder_cant_make);
                       // $isError = 1;
                    }
                } else {
                    recordFileError("folder", tidyFolderPath($dir_destin, $folder), $lang_folder_cant_make);
                    $isError = 1;
                }
            }
        
        
     } 
     
         if ($isError == 0) {
        
        // Copy permissions (Lin)
        if ($_SESSION["win_lin"] == "lin" || $_SESSION["win_lin"] == "mac") {
            
            $mode                   = getPerms($dir_source, $folder);
            $lang_folder_cant_chmod = str_replace("[perms]", $mode, $lang_folder_cant_chmod);
            
            if (function_exists('ftp_chmod')) {
                if (!ftp_chmod($conn_id, $mode, $dir_destin . "/" . $folder)) {
                    if (checkFirstCharTilde($dir_destin) == 1) {
                        if (!@ftp_chmod($conn_id, $mode, replaceTilde($dir_destin) . "/" . $folder)) {
                            recordFileError("folder", $folder, $lang_folder_cant_chmod);
                        }
                    } else {
                        recordFileError("folder", $folder, $lang_folder_cant_chmod);
                    }
                }
            }
        }
        
        // Go through array of files/folders
        $ftp_rawlist = getFtpRawList($dir_source . "/" . $folder);
        
        if (is_array($ftp_rawlist)) {
            
            $count = 0;
            
            foreach ($ftp_rawlist AS $ff) {
                
                $count++;
                $isDir   = 0;
                $isError = 0;
                
                // Split up array into values (Lin)
                if ($_SESSION["win_lin"] == "lin") {
                    
                    // $ff    = preg_split("/[\s]+/", $ff, 9);
                    preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
                    $ff = array_slice($matches, 1);
                    $perms = $ff[0];
                    $file_name  = $ff[8];
                    
                    if (getFileType($perms) == "d")
                        $isDir = 1;
                }
                
                // Split up array into values (Mac) 
                elseif ($_SESSION["win_lin"] == "mac") {
                    
                    if ($count == 1)
                        continue;
                    
                    // $ff    = preg_split("/[\s]+/", $ff, 9);
                    preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
                    $ff = array_slice($matches, 1);
                    $perms = $ff[0];
                    $file_name  = $ff[8];
                    
                    if (getFileType($perms) == "d")
                        $isDir = 1;
                }
                
                // Split up array into values (Win)
                elseif ($_SESSION["win_lin"] == "win") {
                    
                    $ff   = preg_split("/[\s]+/", $ff, 4);
                    $size = $ff[2];
                    $file_name = $ff[3];
                    
                    if ($size == "<DIR>")
                        $isDir = 1;
                }
                
                if ($file_name != "." && $file_name != "..") {
                    
                    // Check for sub folders and then perform this function
                    if ($isDir == 1) {
                        copyFolder2($file_name, $dir_destin . "/" . $folder, $dir_source . "/" . $folder);
                        
                    } else {
                        
                        $fp1 = createTempFileName($file_name);
                        $fp2 = $dir_source . "/" . $folder . "/" . $file_name;
                        $fp3 = $dir_destin . "/" . $folder . "/" . $file_name;
                        
                        ensureFtpConnActive();
                        
                        // Download
                        if (!@ftp_get($conn_id, $fp1, $fp2, FTP_BINARY)) {
                            if (checkFirstCharTilde($fp2) == 1) {
                                if (!@ftp_get($conn_id, $fp1, replaceTilde($fp2), FTP_BINARY)) {
                                    recordFileError("file", $file_name, $lang_server_error_down);
                                    $isError = 1;
                                }
                            } else {
                                recordFileError("file", $file_name, $lang_server_error_down);
                                $isError = 1;
                            }
                        }
                        
                        // Upload
                        if ($isError == 0) {
                        
                            ensureFtpConnActive();
                            
                            if (!@ftp_put($conn_id, $fp3, $fp1, FTP_BINARY)) {
                                if (checkFirstCharTilde($fp3) == 1) {
                                    if (!@ftp_put($conn_id, replaceTilde($fp3), $fp1, FTP_BINARY)) {
                                        recordFileError("file", $file_name, $lang_server_error_down);
                                        $isError = 1;
                                    }
                                } else {
                                    recordFileError("file", $file_name, $lang_server_error_down);
                                    $isError = 1;
                                }
                            }
                        }
                        
                        if ($isError == 0) {
                            
                            // Chmod files (Lin)
                            if ($_SESSION["win_lin"] == "lin" || $_SESSION["win_lin"] == "mac") {
                                
                                $perms = getChmodNumber($perms);
                                $mode  = formatChmodNumber($perms);
                                
                                $lang_file_cant_chmod = str_replace("[perms]", $perms, $lang_file_cant_chmod);
                                
                                if (function_exists('ftp_chmod')) {
                                    if (!@ftp_chmod($conn_id, $mode, $fp3)) {
                                        if (checkFirstCharTilde($fp3) == 1) {
                                            if (!@ftp_chmod($conn_id, $mode, replaceTilde($fp3))) {
                                                recordFileError("file", $file_name, $lang_server_error_down);
                                            }
                                        } else {
                                            recordFileError("file", $file_name, $lang_server_error_down);
                                        }
                                    }
                                }
                            }
                        }
                        
                        // Delete tmp file
                        unlink($fp1);
                    }
                }
            }
        }
    }   
}
function renamecopyFiles($folder, $dir_destin, $dir_source,$foldertwo){
//recordFileError("folder", tidyFolderPath($dir_destin, $folder), $folder."+". $dir_destin."+".$dir_source."+".$foldertwo);
    global $conn_id;
    global $lang_folder_cant_access;
    global $lang_folder_exists;
    global $lang_folder_cant_chmod;
    global $lang_folder_cant_make;
    global $lang_server_error_down;
    global $lang_file_cant_chmod;
    
    global $lang_rename_or_replace;
global $lang_you_want_repace_or;
global $lang_i_want_repace;
global $lang_i_want_rename;
global $lang_please_name_rename; 
    
    
 if (!@ftp_chdir($conn_id, $dir_source . "/" . $folder)) {
        if (checkFirstCharTilde($dir_source) == 1) {
            if (!@ftp_chdir($conn_id, replaceTilde($dir_source) . "/" . $folder)) {
                recordFileError("folder", tidyFolderPath($dir_destin, $folder), $folder."-". $dir_destin."-". $dir_source);
                $isError = 1;
            }
        } else {
            recordFileError("folder", tidyFolderPath($dir_destin, $folder), $lang_folder_cant_access);
            $isError = 1;
        }
    }
    
     if ($isError == 0) {
        
          // Check if destination folder exists
       
            
            // Create the new folder
            if (!@ftp_mkdir($conn_id, $dir_destin . "/" . $foldertwo)) {
                if (checkFirstCharTilde($dir_destin) == 1) {
                    if (!@ftp_mkdir($conn_id, replaceTilde($dir_destin) . "/" . $foldertwo)) {
                       // recordFileError("folder", tidyFolderPath($dir_destin, $folder), $lang_folder_cant_make);
                       // $isError = 1;
                    }
                } else {
                    recordFileError("folder", tidyFolderPath($dir_destin, $folder), $lang_folder_cant_make);
                    $isError = 1;
                }
            }
        
        
     } 
     
         if ($isError == 0) {
        
        // Copy permissions (Lin)
        if ($_SESSION["win_lin"] == "lin" || $_SESSION["win_lin"] == "mac") {
            
            $mode                   = getPerms($dir_source, $folder);
            $lang_folder_cant_chmod = str_replace("[perms]", $mode, $lang_folder_cant_chmod);
            
            if (function_exists('ftp_chmod')) {
                if (!ftp_chmod($conn_id, $mode, $dir_destin . "/" . $foldertwo)) {
                    if (checkFirstCharTilde($dir_destin) == 1) {
                        if (!@ftp_chmod($conn_id, $mode, replaceTilde($dir_destin) . "/" . $foldertwo)) {
                            recordFileError("folder", $folder, $lang_folder_cant_chmod);
                        }
                    } else {
                        recordFileError("folder", $folder, $lang_folder_cant_chmod);
                    }
                }
            }
        }
        
        // Go through array of files/folders
        $ftp_rawlist = getFtpRawList($dir_source . "/" . $folder);
        
        if (is_array($ftp_rawlist)) {
            
            $count = 0;
            
            foreach ($ftp_rawlist AS $ff) {
                
                $count++;
                $isDir   = 0;
                $isError = 0;
                
                // Split up array into values (Lin)
                if ($_SESSION["win_lin"] == "lin") {
                    
                    // $ff    = preg_split("/[\s]+/", $ff, 9);
                    preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
                    $ff = array_slice($matches, 1);
                    $perms = $ff[0];
                    $file_name  = $ff[8];
                    
                    if (getFileType($perms) == "d")
                        $isDir = 1;
                }
                
                // Split up array into values (Mac) 
                elseif ($_SESSION["win_lin"] == "mac") {
                    
                    if ($count == 1)
                        continue;
                    
                    // $ff    = preg_split("/[\s]+/", $ff, 9);
                    preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
                    $ff = array_slice($matches, 1);
                    $perms = $ff[0];
                    $file_name  = $ff[8];
                    
                    if (getFileType($perms) == "d")
                        $isDir = 1;
                }
                
                // Split up array into values (Win)
                elseif ($_SESSION["win_lin"] == "win") {
                    
                    $ff   = preg_split("/[\s]+/", $ff, 4);
                    $size = $ff[2];
                    $file_name = $ff[3];
                    
                    if ($size == "<DIR>")
                        $isDir = 1;
                }
                
                if ($file_name != "." && $file_name != "..") {
                    
                    // Check for sub folders and then perform this function
                    if ($isDir == 1) {
                        copyFolder2($file_name, $dir_destin . "/" . $foldertwo, $dir_source . "/" . $folder);
                    } else {
                        
                        $fp1 = createTempFileName($file_name);
                        $fp2 = $dir_source . "/" . $folder . "/" . $file_name;
                        $fp3 = $dir_destin . "/" . $foldertwo . "/" . $file_name;
                        
                        ensureFtpConnActive();
                        
                        // Download
                        if (!@ftp_get($conn_id, $fp1, $fp2, FTP_BINARY)) {
                            if (checkFirstCharTilde($fp2) == 1) {
                                if (!@ftp_get($conn_id, $fp1, replaceTilde($fp2), FTP_BINARY)) {
                                    recordFileError("file", $file_name, $lang_server_error_down);
                                    $isError = 1;
                                }
                            } else {
                                recordFileError("file", $file_name, $lang_server_error_down);
                                $isError = 1;
                            }
                        }
                        
                        // Upload
                        if ($isError == 0) {
                        
                            ensureFtpConnActive();
                            
                            if (!@ftp_put($conn_id, $fp3, $fp1, FTP_BINARY)) {
                                if (checkFirstCharTilde($fp3) == 1) {
                                    if (!@ftp_put($conn_id, replaceTilde($fp3), $fp1, FTP_BINARY)) {
                                        recordFileError("file", $file_name, $lang_server_error_down);
                                        $isError = 1;
                                    }
                                } else {
                                    recordFileError("file", $file_name, $lang_server_error_down);
                                    $isError = 1;
                                }
                            }
                        }
                        
                        if ($isError == 0) {
                            
                            // Chmod files (Lin)
                            if ($_SESSION["win_lin"] == "lin" || $_SESSION["win_lin"] == "mac") {
                                
                                $perms = getChmodNumber($perms);
                                $mode  = formatChmodNumber($perms);
                                
                                $lang_file_cant_chmod = str_replace("[perms]", $perms, $lang_file_cant_chmod);
                                
                                if (function_exists('ftp_chmod')) {
                                    if (!@ftp_chmod($conn_id, $mode, $fp3)) {
                                        if (checkFirstCharTilde($fp3) == 1) {
                                            if (!@ftp_chmod($conn_id, $mode, replaceTilde($fp3))) {
                                                recordFileError("file", $file_name, $lang_server_error_down);
                                            }
                                        } else {
                                            recordFileError("file", $file_name, $lang_server_error_down);
                                        }
                                    }
                                }
                            }
                        }
                        
                        // Delete tmp file
                        unlink($fp1);
                    }
                }
            }
        }
    }   
}
function copyFolder($folder, $dir_destin, $dir_source)
{
    
    global $conn_id;
    global $lang_folder_cant_access;
    global $lang_folder_exists;
    global $lang_folder_cant_chmod;
    global $lang_folder_cant_make;
    global $lang_server_error_down;
    global $lang_file_cant_chmod;
    
    global $lang_rename_or_replace;
global $lang_you_want_repace_or;
global $lang_i_want_repace;
global $lang_i_want_rename;
global $lang_please_name_rename;
    
    $isError = 0;
   //recordFileError("folder", tidyFolderPath($dir_destin, $folder), $folder."+". $dir_destin."+".$dir_source); 
    // Check source folder exists
    if (!@ftp_chdir($conn_id, $dir_source . "/" . $folder)) {
        if (checkFirstCharTilde($dir_source) == 1) {
            if (!@ftp_chdir($conn_id, replaceTilde($dir_source) . "/" . $folder)) {
                recordFileError("folder", tidyFolderPath($dir_destin, $folder), $lang_folder_cant_access);
                $isError = 1;
            }
        } else {
            recordFileError("folder", tidyFolderPath($dir_destin, $folder), $lang_folder_cant_access);
            $isError = 1;
        }
    }
    
    if ($isError == 0) {
        
        // Check if destination folder exists
        if (checkFileExists("d", $folder, $dir_destin) == 1) {
            
            $fileArray                    = recreateFileFolderArrays("file");
        $folderArray                  = recreateFileFolderArrays("folder");
        $_SESSION["clipboard_rename"] = array();
        
            $height = 100;
    $width  = 565;
    $title  = $lang_rename_or_replace;
    displayPopupOpen(1, $width, $height, 0, $title);
    
    $vars       = "&ftpAction=rename&processAction=1";
    $vars1       = "&ftpAction=replace&processAction=1";
    $vars2       = "&ftpAction=renameandcopy&processAction=1";
        $onKeyPress = "onkeypress=\"if (event.keyCode == 13){ processForm('" . $vars1 . "'); activateActionButtons(0,0); return false; }\"";
        
        $folder = getFileFromPath($folder);
            

            echo "<div class=\"floatLeft10\">";
            //echo $folder,"@", $dir_destin,"@", $dir_source;
            //echo $folder;
            //echo "<input id=\"renamename\" type=\"text\" name=\"\" class=\"\" value=\"" . quotesReplace($folder, "d") . "\" " . $onKeyPress . " placeholder=\"http://...\"> ";
            
            
            echo "<input type=\"text\" name=\"file0\" class=\"inputRename\" value=\"" . quotesReplace($folder, "d") . "\" " . $onKeyPress . "><br>";
            $_SESSION["clipboard_rename"][] = $folder;
            
            echo "</div>";
            echo "<div id=\"ajaxWaiting\" class=\"floatLeft10\">";
            echo "<input type=\"button\" class=\"popUpBtnNoMargin\" value=\"" . $lang_i_want_repace . "\" onClick=\"processForm('" . $vars1 . "'); move();\" class=\"\"> ";
            echo "<input type=\"button\" class=\"popUpBtnNoMargin\" value=\"" . $lang_i_want_rename . "\" onClick=\"processForm('" . $vars2 . "'); move();\"> ";
            $_SESSION["clipboard_rename"][] = $folder;
            
            echo "</div>";
   $i++;
        
            displayPopupClose(0, "", 1);
             
            //recordFileError("folder", tidyFolderPath($dir_destin, $folder), $lang_folder_exists);
        } else {
            
            // Create the new folder
            if (!@ftp_mkdir($conn_id, $dir_destin . "/" . $folder)) {
                if (checkFirstCharTilde($dir_destin) == 1) {
                    if (!@ftp_mkdir($conn_id, replaceTilde($dir_destin) . "/" . $folder)) {
                        recordFileError("folder", tidyFolderPath($dir_destin, $folder), $lang_folder_cant_make);
                        $isError = 1;
                    }
                } else {
                    recordFileError("folder", tidyFolderPath($dir_destin, $folder), $lang_folder_cant_make);
                    $isError = 1;
                }
            }
        }
    }
    
    if ($isError == 0) {
        
        // Copy permissions (Lin)
        if ($_SESSION["win_lin"] == "lin" || $_SESSION["win_lin"] == "mac") {
            
            $mode                   = getPerms($dir_source, $folder);
            $lang_folder_cant_chmod = str_replace("[perms]", $mode, $lang_folder_cant_chmod);
            
            if (function_exists('ftp_chmod')) {
                if (!ftp_chmod($conn_id, $mode, $dir_destin . "/" . $folder)) {
                    if (checkFirstCharTilde($dir_destin) == 1) {
                        if (!@ftp_chmod($conn_id, $mode, replaceTilde($dir_destin) . "/" . $folder)) {
                            recordFileError("folder", $folder, $lang_folder_cant_chmod);
                        }
                    } else {
                        recordFileError("folder", $folder, $lang_folder_cant_chmod);
                    }
                }
            }
        }
        
        // Go through array of files/folders
        $ftp_rawlist = getFtpRawList($dir_source . "/" . $folder);
        
        if (is_array($ftp_rawlist)) {
            
            $count = 0;
            
            foreach ($ftp_rawlist AS $ff) {
                
                $count++;
                $isDir   = 0;
                $isError = 0;
                
                // Split up array into values (Lin)
                if ($_SESSION["win_lin"] == "lin") {
                    
                    // $ff    = preg_split("/[\s]+/", $ff, 9);
                    preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
                    $ff = array_slice($matches, 1);
                    $perms = $ff[0];
                    $file_name  = $ff[8];
                    
                    if (getFileType($perms) == "d")
                        $isDir = 1;
                }
                
                // Split up array into values (Mac) 
                elseif ($_SESSION["win_lin"] == "mac") {
                    
                    if ($count == 1)
                        continue;
                    
                    // $ff    = preg_split("/[\s]+/", $ff, 9);
                    preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
                    $ff = array_slice($matches, 1);
                    $perms = $ff[0];
                    $file_name  = $ff[8];
                    
                    if (getFileType($perms) == "d")
                        $isDir = 1;
                }
                
                // Split up array into values (Win)
                elseif ($_SESSION["win_lin"] == "win") {
                    
                    $ff   = preg_split("/[\s]+/", $ff, 4);
                    $size = $ff[2];
                    $file_name = $ff[3];
                    
                    if ($size == "<DIR>")
                        $isDir = 1;
                }
                
                if ($file_name != "." && $file_name != "..") {
                    
                    // Check for sub folders and then perform this function
                    if ($isDir == 1) {
                        copyFolder2($file_name, $dir_destin . "/" . $folder, $dir_source . "/" . $folder);
                    } else {
                        
                        $fp1 = createTempFileName($file_name);
                        $fp2 = $dir_source . "/" . $folder . "/" . $file_name;
                        $fp3 = $dir_destin . "/" . $folder . "/" . $file_name;
                        
                        ensureFtpConnActive();
                        
                        // Download
                        if (!@ftp_get($conn_id, $fp1, $fp2, FTP_BINARY)) {
                            if (checkFirstCharTilde($fp2) == 1) {
                                if (!@ftp_get($conn_id, $fp1, replaceTilde($fp2), FTP_BINARY)) {
                                    recordFileError("file", $file_name, $lang_server_error_down);
                                    $isError = 1;
                                }
                            } else {
                                recordFileError("file", $file_name, $lang_server_error_down);
                                $isError = 1;
                            }
                        }
                        
                        // Upload
                        if ($isError == 0) {
                        
                            ensureFtpConnActive();
                            
                            if (!@ftp_put($conn_id, $fp3, $fp1, FTP_BINARY)) {
                                if (checkFirstCharTilde($fp3) == 1) {
                                    if (!@ftp_put($conn_id, replaceTilde($fp3), $fp1, FTP_BINARY)) {
                                        recordFileError("file", $file_name, $lang_server_error_down);
                                        $isError = 1;
                                    }
                                } else {
                                    recordFileError("file", $file_name, $lang_server_error_down);
                                    $isError = 1;
                                }
                            }
                        }
                        
                        if ($isError == 0) {
                            
                            // Chmod files (Lin)
                            if ($_SESSION["win_lin"] == "lin" || $_SESSION["win_lin"] == "mac") {
                                
                                $perms = getChmodNumber($perms);
                                $mode  = formatChmodNumber($perms);
                                
                                $lang_file_cant_chmod = str_replace("[perms]", $perms, $lang_file_cant_chmod);
                                
                                if (function_exists('ftp_chmod')) {
                                    if (!@ftp_chmod($conn_id, $mode, $fp3)) {
                                        if (checkFirstCharTilde($fp3) == 1) {
                                            if (!@ftp_chmod($conn_id, $mode, replaceTilde($fp3))) {
                                                recordFileError("file", $file_name, $lang_server_error_down);
                                            }
                                        } else {
                                            recordFileError("file", $file_name, $lang_server_error_down);
                                        }
                                    }
                                }
                            }
                        }
                        
                        // Delete tmp file
                        unlink($fp1);
                    }
                }
            }
        }
    }
}

function copyFolder2($folder, $dir_destin, $dir_source)
{
    
    global $conn_id;
    global $lang_folder_cant_access;
    global $lang_folder_exists;
    global $lang_folder_cant_chmod;
    global $lang_folder_cant_make;
    global $lang_server_error_down;
    global $lang_file_cant_chmod;
    
    global $lang_rename_or_replace;
global $lang_you_want_repace_or;
global $lang_i_want_repace;
global $lang_i_want_rename;
global $lang_please_name_rename;
    
    $isError = 0;
   //recordFileError("folder", tidyFolderPath($dir_destin, $folder), $folder."+". $dir_destin."+".$dir_source); 
    // Check source folder exists
    if (!@ftp_chdir($conn_id, $dir_source . "/" . $folder)) {
        if (checkFirstCharTilde($dir_source) == 1) {
            if (!@ftp_chdir($conn_id, replaceTilde($dir_source) . "/" . $folder)) {
                recordFileError("folder", tidyFolderPath($dir_destin, $folder), $lang_folder_cant_access);
                $isError = 1;
            }
        } else {
            recordFileError("folder", tidyFolderPath($dir_destin, $folder), $lang_folder_cant_access);
            $isError = 1;
        }
    }
    
    if ($isError == 0) {
        
        // Check if destination folder exists
        if (checkFileExists("d", $folder, $dir_destin) == 1) {
                
            $fileArray                    = recreateFileFolderArrays("file");
        $folderArray                  = recreateFileFolderArrays("folder");
        //$_SESSION["clipboard_rename"] = array();
        
            
    
   
        $folder = getFileFromPath($folder);
            

          
            //echo "<input type=\"text\" name=\"file0\" class=\"inputRename\" value=\"" . quotesReplace($folder, "d") . "\" " . $onKeyPress . "><br>";
            $_SESSION["clipboard_rename"][] = $folder;
            
              
            
            echo "</div>";
   $i++;
        
        
     } else {
            
            // Create the new folder
            if (!@ftp_mkdir($conn_id, $dir_destin . "/" . $folder)) {
                if (checkFirstCharTilde($dir_destin) == 1) {
                    if (!@ftp_mkdir($conn_id, replaceTilde($dir_destin) . "/" . $folder)) {
                        recordFileError("folder", tidyFolderPath($dir_destin, $folder), $lang_folder_cant_make);
                        $isError = 1;
                    }
                } else {
                    recordFileError("folder", tidyFolderPath($dir_destin, $folder), $lang_folder_cant_make);
                    $isError = 1;
                }
            }
        }
    }
    
    if ($isError == 0) {
        
        // Copy permissions (Lin)
        if ($_SESSION["win_lin"] == "lin" || $_SESSION["win_lin"] == "mac") {
            
            $mode                   = getPerms($dir_source, $folder);
            $lang_folder_cant_chmod = str_replace("[perms]", $mode, $lang_folder_cant_chmod);
            
            if (function_exists('ftp_chmod')) {
                if (!ftp_chmod($conn_id, $mode, $dir_destin . "/" . $folder)) {
                    if (checkFirstCharTilde($dir_destin) == 1) {
                        if (!@ftp_chmod($conn_id, $mode, replaceTilde($dir_destin) . "/" . $folder)) {
                            recordFileError("folder", $folder, $lang_folder_cant_chmod);
                        }
                    } else {
                        recordFileError("folder", $folder, $lang_folder_cant_chmod);
                    }
                }
            }
        }
        
        // Go through array of files/folders
        $ftp_rawlist = getFtpRawList($dir_source . "/" . $folder);
        
        if (is_array($ftp_rawlist)) {
            
            $count = 0;
            
            foreach ($ftp_rawlist AS $ff) {
                
                $count++;
                $isDir   = 0;
                $isError = 0;
                
                // Split up array into values (Lin)
                if ($_SESSION["win_lin"] == "lin") {
                    
                    // $ff    = preg_split("/[\s]+/", $ff, 9);
                    preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
                    $ff = array_slice($matches, 1);
                    $perms = $ff[0];
                    $file_name  = $ff[8];
                    
                    if (getFileType($perms) == "d")
                        $isDir = 1;
                }
                
                // Split up array into values (Mac) 
                elseif ($_SESSION["win_lin"] == "mac") {
                    
                    if ($count == 1)
                        continue;
                    
                    // $ff    = preg_split("/[\s]+/", $ff, 9);
                    preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
                    $ff = array_slice($matches, 1);
                    $perms = $ff[0];
                    $file_name  = $ff[8];
                    
                    if (getFileType($perms) == "d")
                        $isDir = 1;
                }
                
                // Split up array into values (Win)
                elseif ($_SESSION["win_lin"] == "win") {
                    
                    $ff   = preg_split("/[\s]+/", $ff, 4);
                    $size = $ff[2];
                    $file_name = $ff[3];
                    
                    if ($size == "<DIR>")
                        $isDir = 1;
                }
                
                if ($file_name != "." && $file_name != "..") {
                    
                    // Check for sub folders and then perform this function
                    if ($isDir == 1) {
                        copyFolder($file_name, $dir_destin . "/" . $folder, $dir_source . "/" . $folder);
                    } else {
                        
                        $fp1 = createTempFileName($file_name);
                        $fp2 = $dir_source . "/" . $folder . "/" . $file_name;
                        $fp3 = $dir_destin . "/" . $folder . "/" . $file_name;
                        
                        ensureFtpConnActive();
                        
                        // Download
                        if (!@ftp_get($conn_id, $fp1, $fp2, FTP_BINARY)) {
                            if (checkFirstCharTilde($fp2) == 1) {
                                if (!@ftp_get($conn_id, $fp1, replaceTilde($fp2), FTP_BINARY)) {
                                    recordFileError("file", $file_name, $lang_server_error_down);
                                    $isError = 1;
                                }
                            } else {
                                recordFileError("file", $file_name, $lang_server_error_down);
                                $isError = 1;
                            }
                        }
                        
                        // Upload
                        if ($isError == 0) {
                        
                            ensureFtpConnActive();
                            
                            if (!@ftp_put($conn_id, $fp3, $fp1, FTP_BINARY)) {
                                if (checkFirstCharTilde($fp3) == 1) {
                                    if (!@ftp_put($conn_id, replaceTilde($fp3), $fp1, FTP_BINARY)) {
                                        recordFileError("file", $file_name, $lang_server_error_down);
                                        $isError = 1;
                                    }
                                } else {
                                    recordFileError("file", $file_name, $lang_server_error_down);
                                    $isError = 1;
                                }
                            }
                        }
                        
                        if ($isError == 0) {
                            
                            // Chmod files (Lin)
                            if ($_SESSION["win_lin"] == "lin" || $_SESSION["win_lin"] == "mac") {
                                
                                $perms = getChmodNumber($perms);
                                $mode  = formatChmodNumber($perms);
                                
                                $lang_file_cant_chmod = str_replace("[perms]", $perms, $lang_file_cant_chmod);
                                
                                if (function_exists('ftp_chmod')) {
                                    if (!@ftp_chmod($conn_id, $mode, $fp3)) {
                                        if (checkFirstCharTilde($fp3) == 1) {
                                            if (!@ftp_chmod($conn_id, $mode, replaceTilde($fp3))) {
                                                recordFileError("file", $file_name, $lang_server_error_down);
                                            }
                                        } else {
                                            recordFileError("file", $file_name, $lang_server_error_down);
                                        }
                                    }
                                }
                            }
                        }
                        
                        // Delete tmp file
                        unlink($fp1);
                    }
                }
            }
        }
    }
}

function recreateFileFolderArrays($type)
{
    
    $arrayNew = array();
    
    if ($_POST["fileSingle"] != "" || $_POST["folderSingle"] != "") {
        
        // Single file/folder
        if ($type == "file" && $_POST["fileSingle"] != "") {
            $file       = quotesUnescape($_POST["fileSingle"]);
            $arrayNew[] = $file;
        }
        if ($type == "folder" && $_POST["folderSingle"] != "")
            $arrayNew[] = quotesUnescape($_POST["folderSingle"]);
        
    } else {
        
        // Array file/folder
        if ($type == "file")
            $array = $_POST["fileAction"];
        if ($type == "folder")
            $array = $_POST["folderAction"];
        
        if (is_array($array)) {
            
            foreach ($array AS $file) {
                
                $file = quotesUnescape($file);
                
                if ($file != "")
                    $arrayNew[] = $file;
            }
        }
    }
    
    return $arrayNew;
}

function renameFiles()
{
    
    global $conn_id;
    global $lang_file_exists;
    global $lang_folder_exists;
    global $lang_cant_rename;
    global $lang_title_rename;
    
    // Check for processing of form
    if ($_POST["processAction"] == 1) {
        
        $i = 0;
        
        // Go through array of saved names
        foreach ($_SESSION["clipboard_rename"] AS $file) {
            
            $isError = 0;
            
            $file_name  = $_POST["file" . $i];
            $file_name  = quotesUnescape($file_name);
            $file       = quotesUnescape($file);
            $fileExists = 0;
            
            // Check for a different name
            if ($file_name != $file) {
                
                if ($_SESSION["dir_current"] == "/")
                    $file_to_move = "/" . $file;
                if ($_SESSION["dir_current"] == "~")
                    $file_to_move = "~/" . $file;
                if ($_SESSION["dir_current"] != "/" && $_SESSION["dir_current"] != "~")
                    $file_to_move = $_SESSION["dir_current"] . "/" . $file;
                
                $file_destination = $_SESSION["dir_current"] . "/" . $file_name;
                
                // Check if file exists
                if (checkFileExists("f", $file_name, $_SESSION["dir_current"]) == 1) {
                    recordFileError("file", sanitizeStr($file_name), $lang_file_exists);
                    $fileExists = 1;
                }
                
                // Check if folder exists
                if (checkFileExists("d", $file_name, $_SESSION["dir_current"]) == 1) {
                    recordFileError("folder", sanitizeStr($file_name), $lang_folder_exists);
                    $fileExists = 1;
                }
                
                if ($fileExists == 0) {
                    
                    if (!@ftp_rename($conn_id, $file_to_move, $file_destination)) {
                        if (checkFirstCharTilde($file_to_move) == 1) {
                            if (!@ftp_rename($conn_id, replaceTilde($file_to_move), replaceTilde($file_destination))) {
                                recordFileError("file", sanitizeStr($file), $conn_id. $file_to_move. replaceTilde($file_destination));
                                $isError = 1;
                            }
                        } else {
                            recordFileError("file", sanitizeStr($file), $lang_cant_rename);
                            $isError = 1;
                        }
                    }
                    
                    if ($isError == 0) {
                        
                        // Delete item from history
                        deleteFtpHistory($file_to_move);
                    }
                }
                
            }
            
            $i++;
        }
        
        // Reset var
        $_SESSION["clipboard_rename"] = array();
        
    } else {
        
        // Recreate arrays
        $fileArray                    = recreateFileFolderArrays("file");
        $folderArray                  = recreateFileFolderArrays("folder");
        $_SESSION["clipboard_rename"] = array();
        
        $n      = sizeof($fileArray) + sizeof($folderArray);
        $height = $n * 35;
        
        $width = 565;
        $title = $lang_title_rename;
        
        displayPopupOpen(1, $width, $height, 0, $title);
        
        $i = 0;
        
        // Set vars
        $vars       = "&ftpAction=rename&processAction=1";
        $onKeyPress = "onkeypress=\"if (event.keyCode == 13){ processForm('" . $vars . "'); activateActionButtons(0,0); return false; }\"";
        
        // Display folders
        foreach ($folderArray AS $folder) {
            
            $folder = getFileFromPath($folder);
            
            echo "<img src=\"".plugins_url('images/icon_16_folder.gif',__FILE__ )."\" width=\"16\" height=\"16\" alt=\"\"> ";
            echo "<input type=\"text\" name=\"file" . $i . "\" class=\"inputRename\" value=\"" . quotesReplace($folder, "d") . "\" " . $onKeyPress . "><br>";
            $_SESSION["clipboard_rename"][] = $folder;
            //echo $folder;
            $i++;
        }
        
        // Display files
        foreach ($fileArray AS $file) {
            
            $file = getFileFromPath($file);
            
            echo "<img src=\"".plugins_url('images/icon_16_file.gif',__FILE__ )."\" width=\"16\" height=\"16\" alt=\"\"> ";
            echo "<input type=\"text\" name=\"file" . $i . "\" class=\"inputRename\" value=\"" . quotesReplace($file, "d") . "\" " . $onKeyPress . "><br>";
            $_SESSION["clipboard_rename"][] = $file;
            $i++;
        }
        
        displayPopupClose(0, $vars, 1);
    }
}

function chmodFiles()
{
    
    global $conn_id;
    global $lang_chmod_max_777;
    global $lang_file_cant_chmod;
    global $lang_chmod_owner;
    global $lang_chmod_group;
    global $lang_chmod_public;
    global $lang_chmod_manual;
    global $lang_title_chmod;
    global $lang_chmod_no_support;
    
    if (!function_exists('ftp_chmod')) {
        
        $_SESSION["errors"][] = $lang_chmod_no_support;
        
    } else {
        
        // Check for a posted form
        if ($_POST["processForm"] == 1) {
            
            if (trim($_POST["chmodNum"]) > 777) {
                
                $_SESSION["errors"][] = $lang_chmod_max_777;
                
            } else {
                
                $mode                 = formatChmodNumber($_POST["chmodNum"]);
                $lang_file_cant_chmod = str_replace("[perms]", $mode, $lang_file_cant_chmod);
                
                foreach ($_SESSION["clipboard_chmod"] AS $file) {
                    
                    if (!@ftp_chmod($conn_id, $mode, $file)) {
                        if (checkFirstCharTilde($file) == 1) {
                            if (!@ftp_chmod($conn_id, $mode, replaceTilde($file))) {
                                recordFileError("file", replaceTilde($file), $lang_file_cant_chmod);
                            }
                        } else {
                            recordFileError("file", $file, $lang_file_cant_chmod);
                        }
                    }
                }
            }
            
            // Reset var
            $_SESSION["clipboard_chmod"] = array();
            
        } else {
            
            // Recreate arrays
            $fileArray                   = recreateFileFolderArrays("file");
            $folderArray                 = recreateFileFolderArrays("folder");
            $_SESSION["clipboard_chmod"] = array();
            
            // Count items checked
            $n = sizeof($fileArray) + sizeof($folderArray);
            
            // Get attributes if 1 item selected
            if ($n == 1) {
                
                if ($theFile == "")
                    $theFile = $fileArray[0];
                if ($theFile == "")
                    $theFile = $folderArray[0];
                
                $theFile = getFileFromPath($theFile);
                
                $ftp_rawlist = getFtpRawList($_SESSION["dir_current"]);
                
                // Go through array of files/folders
                foreach ($ftp_rawlist AS $ff) {
                    
                    // Split up array into values
                    //$ff = preg_split("/[\s]+/", $ff, 9);
                    preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
                    $ff = array_slice($matches, 1);
                    
                    $perms = $ff[0];
                    $file  = $ff[8];
                    
                    // Check for a match
                    if ($file == $theFile) {
                        $chmod = getChmodNumber($perms);
                        $o_wrx = substr($perms, 1, 3);
                        $g_wrx = substr($perms, 4, 3);
                        $p_wrx = substr($perms, 7, 3);
                    }
                }
            }
            
            // Save folders
            foreach ($folderArray AS $folder) {
                $_SESSION["clipboard_chmod"][] = $folder;
            }
            
            // Save files
            foreach ($fileArray AS $file) {
                $_SESSION["clipboard_chmod"][] = $file;
            }
            
            $height = 335;
            $width  = 420;
            $title  = $lang_title_chmod;
            
            displayPopupOpen(1, $width, $height, 0, $title);
            
            $vars = "&ftpAction=chmod&processForm=1";
            
            displayChmodFieldset($lang_chmod_owner, "owner", $o_wrx, $vars);
            displayChmodFieldset($lang_chmod_group, "group", $g_wrx, $vars);
            displayChmodFieldset($lang_chmod_public, "public", $p_wrx, $vars);
            displayChmodFieldset($lang_chmod_manual, "manual", $chmod, $vars);
            
            displayPopupClose(0, $vars, 1);
        }
    }
}

function formatChmodNumber($str)
{
    
    $str = trim($str);
    $str = octdec(str_pad($str, 4, '0', STR_PAD_LEFT));
    $str = (int) $str;
    
    return $str;
}

function getChmodNumber($str)
{
    
    $j      = 0;
    $strlen = strlen($str);
    for ($i = 0; $i < $strlen; $i++) {
        
        if ($i >= 1 && $i <= 3)
            $m = 100;
        if ($i >= 4 && $i <= 6)
            $m = 10;
        if ($i >= 7 && $i <= 9)
            $m = 1;
        
        $l = substr($str, $i, 1);
        
        if ($l != "d" && $l != "-") {
            
            if ($l == "r")
                $n = 4;
            if ($l == "w")
                $n = 2;
            if ($l == "x")
                $n = 1;
            
            $j = $j + ($n * $m);
        }
    }
    
    return $j;
}

function displayChmodFieldset($title, $type, $chmod, $vars)
{
    
    global $lang_chmod_read;
    global $lang_chmod_write;
    global $lang_chmod_exe;
?>
<fieldset class="fieldsetChmod">
<legend><?php
    echo $title;
?></legend>
<?php
    if ($type == "manual") {
?>
<input type="text" size="4" name="chmodNum" id="chmodNum" value="<?php
        echo $chmod;
?>" onkeypress="if (event.keyCode == 13){ processForm('<?php
        echo $vars;
?>'); activateActionButtons(0,0); return false;}">
<?php
    } else {
?>
<?php
        if ($type == "owner")
            $n = 100;
        if ($type == "group")
            $n = 10;
        if ($type == "public")
            $n = 1;
        
        $n_r = $n * 4;
        $n_w = $n * 2;
        $n_e = $n * 1;
?>
<div class="checkboxChmod"><input type="checkbox" id="<?php
        echo $type;
?>_r" value="1" <?php
        if (substr($chmod, 0, 1) == "r")
            echo "checked";
?> onclick="updateChmodNum(this.id,<?php
        echo $n_r;
?>)"> <?php
        echo $lang_chmod_read;
?></div>
<div class="checkboxChmod"><input type="checkbox" id="<?php
        echo $type;
?>_w" value="1" <?php
        if (substr($chmod, 1, 1) == "w")
            echo "checked";
?> onclick="updateChmodNum(this.id,<?php
        echo $n_w;
?>)"> <?php
        echo $lang_chmod_write;
?></div>
<div class="checkboxChmod"><input type="checkbox" id="<?php
        echo $type;
?>_e" value="1" <?php
        if (substr($chmod, 2, 1) == "x")
            echo "checked";
?> onclick="updateChmodNum(this.id,<?php
        echo $n_e;
?>)"> <?php
        echo $lang_chmod_exe;
?></div>
<?php
    }
?>
</fieldset>
<?php
}
function strposa($haystack, $needles=array(), $offset=0) {
        $chr = array();
        foreach($needles as $needle) {
                $res = strpos($haystack, $needle, $offset);
                if ($res !== false) $chr[$needle] = $res;
        }
        if(empty($chr)) return false;
        return min($chr);
}
function editFile()
{
    global $lang_error_file_type;
    global $lang_muti_file_edit_error;
   
    
    clipboard_files();
    
    $downloadFileAr = array();
    $unlinkFileAr = array();
    $file      = quotesUnescape($_POST["file"]);
    $file_name = getFileFromPath($file);
    $fp1       = createTempFileName($file_name);
    $fp2       = $file;    
    
      // Folders
    foreach ($_SESSION["clipboard_folders"] as $folder) {
        
        $folder = urldecode($folder);
        $folder_name = getFileFromPath($folder);
        $dir_source = getParentDir($folder);
        
        downloadFolder($folder_name, $dir_source);
    }
    
    // Files
    if (count($_SESSION["clipboard_files"])>1){
        recordFileError("file", quotesEscape($file, "s"), $lang_muti_file_edit_error);
    }else{
        
    
    foreach ($_SESSION["clipboard_files"] as $file) {
        $downloadFileAr = urldecode($file);
 
        

    
        
    
            //$files      = quotesUnescape($file);
            //$file_name = getFileFromPath($files);
            //$fp1       = createTempFileName($file_name);
            //$fp2       = $file;
    
    $file      = quotesUnescape($downloadFileAr);
    $file_name = getFileFromPath($file);
    $file_name2 = getFileFromPath("~/public_html/ftptest/sitemap.xml");
    $fp1       = createTempFileName($file_name);
    $fp2       = $file;
    $fp9=str_replace("ftp.","",$_SESSION["ftp_host"]);
    $fp10=str_replace("~/public_html","",$fp2);
            
                                    
          
        
      
         

    }
    $arrayfiletypeeditor  = array('.csv','.dat','.db','.log','.sav','.sql','.xml','.asp','.aspx','.cer','.cfm','.cgi','.pl','.css','.htm','.html','.js','.jsp','.part','.php','.py','.rss','.xhtml','.c','.class','.cpp','.cs','.h','.C','.C++','.java','.sh','.swift','.vb','.txt');

    if (strposa($file_name, $arrayfiletypeeditor, 1)==false) {
         recordFileError("file", quotesEscape($file, "s"), $lang_error_file_type);
       $isError = 1; 
    }else{
    
   
    global $conn_id;
    global $lang_server_error_down;
    
    $isError = 0;
    
    
    
    ensureFtpConnActive();
    
    // Download the file
    if (!@ftp_get($conn_id, $fp1, $fp2, FTP_BINARY)) {
        
        if (checkFirstCharTilde($fp2) == 1) {
            if (!@ftp_get($conn_id, $fp1, replaceTilde($fp2), FTP_BINARY)) {
                recordFileError("file", quotesEscape($file, "s"), $lang_server_error_down);
                $isError = 1;
            }
        } else {
            recordFileError("file", quotesEscape($file, "s"), $lang_server_error_down);
            $isError = 1;
        }
    }
   
    
    if ($isError == 0) {
        
        // Check file has contents
        if (filesize($fp1) > 0) {
            
            $fd      = @fopen($fp1, "r");
            $content = @fread($fd, filesize($fp1));
            @fclose($fd);
        }
        
        
        displayEditFileForm2($file, $content);
        
    }
    
    // Delete tmp file
    unlink($fp1);
    }
    }
}
function editFile_king($file)
{
    
    global $conn_id;
    global $lang_server_error_down;
    
    $isError = 0;
    
    
    $file_name = getFileFromPath($file);
    $fp1       = createTempFileName($file_name);
    $fp2       = $file;
    
    ensureFtpConnActive();
    
    // Download the file
    if (!@ftp_get($conn_id, $fp1, $fp2, FTP_BINARY)) {
        
        if (checkFirstCharTilde($fp2) == 1) {
            if (!@ftp_get($conn_id, $fp1, replaceTilde($fp2), FTP_BINARY)) {
                recordFileError("file", quotesEscape($file, "s"), $lang_server_error_down);
                $isError = 1;
            }
        } else {
            recordFileError("file", quotesEscape($file, "s"), $lang_server_error_down);
            $isError = 1;
        }
    }
    
    if ($isError == 0) {
        
        // Check file has contents
        if (filesize($fp1) > 0) {
            
            $fd      = @fopen($fp1, "r");
            $content = @fread($fd, filesize($fp1));
            @fclose($fd);
        }
        
        displayEditFileForm($file, $content);
    }
    
    // Delete tmp file
    unlink($fp1);
}

function displayEditFileForm($file, $content)
{
    
    global $lang_title_edit_file;
    global $lang_btn_save;
    global $lang_btn_close;
    
    $width        = $_POST["windowWidth"] - 250;
    $height       = $_POST["windowHeight"] - 220;
    $editorHeight = $height - 85;
    
    $file_display = $file;
    $file_display = sanitizeStr($file_display);
    $file_display = replaceTilde($file_display);
    $title        = $lang_title_edit_file . ": " . $file_display;
    
    displayPopupOpen(0, $width, $height, 0, $title);
    $filetype=get_file_extension($file);
$filetypecode;
if($filetype=="js"){
    $filetypecode="javascript";
}else if($filetype=="html"||$filetype=="htm"){
 $filetypecode="htmlmixed";   
}else{
  $filetypecode=$filetype;     
}
     echo '<style>
.butsavepopup{
     text-align: center;
    margin: 0.2em;
    position: fixed;
    left: 40%;
    top: 2%;
    
    margin: 0;
    padding: 0;
    border-radius: 1em;   
}
.butsavepopup > input {
        margin: 0;
    /* padding: 0; */
    border-radius: 1em;
    margin-left: 0.5em;
}
</style>
';
    echo '<div class="butsavepopup">';
    // Save button
    echo "<input type=\"button\" value=\"" . $lang_btn_save . "\" class=\"w3-bar-item w3-button w3-green w3-right\" onClick=\"submitToIframe('&ftpAction=editProcess');\"> ";
    //$datahtml.= "<input id=\"button\" type=\"button\" value=\"refcode\" class=\"popUpBtn\" onClick=\"refcode('".get_file_extension($file)."');\"> ";
    // Close button
    echo "<input type=\"button\" value=\"" . $lang_btn_close . "\" class=\"w3-bar-item w3-button w3-green w3-right\" onClick=\"processForm('&ftpAction=openFolder')\"> ";
    echo '</div>';
    
    echo "<input type=\"hidden\" name=\"file\" value=\"" . sanitizeStr($file) . "\">";
    echo "<textarea onfocus=\"refcode('".$filetypecode."');\" name=\"editContent\" id=\"editContent\" style=\"height: " . $editorHeight . "px;\">" . sanitizeStrTrim($content) . "</textarea>";
    
    // Save button
    //echo "<input type=\"button\" value=\"" . $lang_btn_save . "\" class=\"popUpBtn\" onClick=\"submitToIframe('&ftpAction=editProcess');\"> ";
    
    // Close button
    //echo "<input type=\"button\" value=\"" . $lang_btn_close . "\" class=\"popUpBtn\" onClick=\"processForm('&ftpAction=openFolder')\"> ";
    
    displayPopupClose(0, "", 0);
}
function displayEditFileForm2($file,$content)
{
    
    global $lang_title_edit_file;
    global $lang_btn_save;
    global $lang_btn_close;
    
    $width        = $_POST["windowWidth"] - 250;
    $height       = $_POST["windowHeight"] - 220;
    $editorHeight = $height - 85;
    
    $file_display = $file;
    $file_display = sanitizeStr($file_display);
    $file_display = replaceTilde($file_display);
    $title        = $lang_title_edit_file . ": " . $file_display;
    
    displayPopupOpen(0, $width, $height, 0, $title);
$filetype=get_file_extension($file);
$filetypecode;
if($filetype=="js"){
    $filetypecode="javascript";
}else if($filetype=="html"||$filetype=="htm"){
 $filetypecode="htmlmixed";   
}else{
  $filetypecode=$filetype;     
}

$datahtml="";
 $datahtml.='<style>
.butsavepopup{
     text-align: center;
    margin: 0.2em;
    position: fixed;
    left: 40%;
    top: 2%;
    
    margin: 0;
    padding: 0;
    border-radius: 1em;   
}
.butsavepopup > input {
        margin: 0;
    /* padding: 0; */
    border-radius: 1em;
    margin-left: 0.5em;
}
</style>
';
$datahtml2="";
    $datahtml.= '<div class="butsavepopup">';
    // Save button
    $datahtml.= "<input type=\"button\" value=\"" . $lang_btn_save . "\" class=\"w3-bar-item w3-button w3-green w3-right\" onClick=\"submitToIframe('&ftpAction=editProcess');\"> ";
    //$datahtml.= "<input id=\"button\" type=\"button\" value=\"refcode\" class=\"popUpBtn\" onClick=\"refcode('".get_file_extension($file)."');\"> ";
    // Close button
    $datahtml.= "<input type=\"button\" value=\"" . $lang_btn_close . "\" class=\"w3-bar-item w3-button w3-green w3-right\" onClick=\"processForm('&ftpAction=openFolder')\"> ";
    $datahtml.= '</div>';
    $datahtml.= "<input type=\"hidden\" name=\"file\" value=\"" . $filetypecode . "\">";
    
    $datahtml.= "<textarea onfocus=\"refcode('".$filetypecode."');\" name=\"editContent\" id=\"editContent\" style=\"height: " . $editorHeight . "px;\">" . sanitizeStrTrim($content) . "</textarea>";
    

 echo $datahtml ;   
    displayPopupClose(0, "", 0);
}
function editProcess()
{
    
    // Saving the file to the iframe preserves the cursor position in the edit div.
    
    global $conn_id;
    global $lang_server_error_up;
    
    $isError = 0;
    
    // Get file contents
    $file      = quotesUnescape($_POST["file"]);
    $file_name = getFileFromPath($file);
    $fp1       = createTempFileName($file_name);
    $fp2       = $file;
    
    $editContent = $_POST["editContent"];
    
    // Write content to a file
    $tmpFile = @fopen($fp1, "w+");
    @fputs($tmpFile, $editContent);
    @fclose($tmpFile);
    
    ensureFtpConnActive();
    
    if (!@ftp_put($conn_id, $fp2, $fp1, FTP_BINARY)) {
        if (checkFirstCharTilde($fp2) == 1) {
            if (!@ftp_put($conn_id, replaceTilde($fp2), $fp1, FTP_BINARY)) {
                recordFileError("file", $file_name, $lang_server_error_up);
            }
        } else {
            recordFileError("file", $file_name, $lang_server_error_up);
        }
    }
    
    // Delete tmp file
    unlink($fp1);
}
function get_file_extension($file_name) {
    if(substr(strrchr($file_name,'.'),1)=="html"){
        return "htmlmixed";
    }elseif(substr(strrchr($file_name,'.'),1)=="txt"){
        return "textile";
    }else{
	return substr(strrchr($file_name,'.'),1);
    }
}
function remote_file_size($url){
	# Get all header information
	$data = get_headers($url, true);
	# Look up validity
	if (isset($data['Content-Length']))
		# Return file size
		return (int) $data['Content-Length'];
}
function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('', 'K', 'M', 'G', 'T');   

    return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
}
function htmlli($arraydata,$closelink,$showimage,$filesized){
    global $lang_file_size;
    
    $htmldata.= '<ul class="w3-ul w3-card-4" style="width: 100%;float: right;">';
   for($i = 0; $i < count($arraydata); $i++) {
    // do something

    $htmldata.= '<li class="w3-bar" style="direction: ltr;width: 90%;padding: 0;">';
     if($closelink==true){
    $htmldata.= '<span onclick="this.parentElement.style.display=\'none\'" class="w3-bar-item w3-button w3-white w3-xlarge w3-right">×</span>';
    }
    
    if($showimage==true){
    $htmldata.= ' <img src="'.$arraydata[$i][1].'" class="w3-bar-item w3-circle w3-hide-small" style="width:32px;    float: right;">';
    }else{
    $htmldata.= ' <img src="'.plugins_url('images/note.png',__FILE__ ).'" class="w3-bar-item  w3-hide-small" style="width:32px;    float: right;">';  
    }
    $htmldata.= ' <div class="w3-bar-item" style="float: right;word-wrap: break-word;">';
    $htmldata.= '  <span class="w3-large">'.$arraydata[$i][2].'</span><br>';
    $htmldata.= '   <span>'.$arraydata[$i][0].'</span>';
    $htmldata.= ' </div>';
    
     
    $htmldata.= ' </li>';
    }
    
   
    if($filesized==true){
    $htmldata.= '<li class="w3-bar" style="direction: ltr;width: 90%;padding: 0;">';
    $htmldata.= ' <img src="'.plugins_url('images/note.png',__FILE__ ).'" class="w3-bar-item  w3-hide-small" style="width:32px;    float: right;">';  
    $file_size = remote_file_size( $arraydata[3][0] );
    $htmldata.= ' <div class="w3-bar-item" style="float: right;word-wrap: break-word;">';
    $htmldata.= '  <span class="w3-large">'.$lang_file_size.'</span><br>';
    $htmldata.= '   <span>'.formatBytes($file_size).'</span>';
    $htmldata.= ' </div>';
    $htmldata.= ' </li>';
    }
    
    $htmldata.= '</ul>';
    return $htmldata;
}
function downloadFile()
{
    echo '<style>
img{
  max-width: 100%;  
}
</style>';
    global $conn_id;
    global $lang_server_error_down;
    global $lang_ftp_address_file;
global $lang_name_file;
global $lang_temp_address_file;
global $lang_downloadlink;
global $lang_Download_Here;
    
    
    $htmlcontent_befor='<!-- Page Content --> <div style="margin-left: 2%;margin-top: 5%;float: left;width: 100%;">';
    $htmlcontent_after='</div></div>';

    $isError = 0;
    
    $file      = quotesUnescape($_GET["dl"]);
    $file_name = getFileFromPath($file);
    $fp1       = createTempFileName($file_name);
    $fp2       = $file;
    $fp9=str_replace("ftp.","",$_SESSION["ftp_host"]);
    $fp10=str_replace("~/public_html","",$fp2);
    
         $image =$_GET["dl"];
        
          if (strpos($image, '.gif') !== false) {
    
    $arraydata=array(
    array($file,"image",$lang_ftp_address_file),
    array($file_name,"image",$lang_name_file),
    array($fp1,"image",$lang_temp_address_file),
    array("http://".$fp9.$fp10,"image",$lang_downloadlink),
    );
    echo htmlli($arraydata,false,false,false);
    
    echo $htmlcontent_befor;
    echo '<img src="http://'.$fp9.$fp10.'" >';
    echo $htmlcontent_after; 
       
    } else if (strpos($image, '.jpeg') !== false || strpos($image, '.jpg') !== false || strpos($image, '.ico') !== false || strpos($image, '.png') !== false) {
    
   
  $arraydata=array(
    array($file,"image",$lang_ftp_address_file),
    array($file_name,"image",$lang_name_file),
    array($fp1,"image",$lang_temp_address_file),
    array("http://".$fp9.$fp10,"image",$lang_downloadlink),
    );
    echo htmlli($arraydata,false,false,false);
    echo $htmlcontent_befor;
    echo '<img src="http://'.$fp9.$fp10.'" >';
    echo $htmlcontent_after; 
    
    } else if (strpos($image, '.swf') !== false) {
       $arraydata=array(
    array($file,"image",$lang_ftp_address_file),
    array($file_name,"image",$lang_name_file),
    array($fp1,"image",$lang_temp_address_file),
    array("http://".$fp9.$fp10,"image",$lang_downloadlink),
    );
    echo htmlli($arraydata,false,false,false);
    echo $htmlcontent_befor;
    echo '<object width="" height="" data="http://'.$fp9.$fp10.'"></object>';
    echo $htmlcontent_after;
    
    } else if (strpos($image, '.php') !== false || strpos($image, '.css') !== false || strpos($image, '.xml') !== false || strpos($image, '.html') !== false || strpos($image, '.js') !== false || strpos($image, '.sql') !== false || strpos($image, '.txt') !== false) {
       $arraydata=array(
    array($file,"image",$lang_ftp_address_file),
    array($file_name,"image",$lang_name_file),
    array($fp1,"image",$lang_temp_address_file),
    array("http://".$fp9.$fp10,"image",$lang_downloadlink),
    );
    echo htmlli($arraydata,false,false,false);
    echo $htmlcontent_befor;
        ensureFtpConnActive();
    
    // Download the file
    if (!@ftp_get($conn_id, $fp1, $fp2, FTP_BINARY)) {
        if (checkFirstCharTilde($fp2) == 1) {
            if (!@ftp_get($conn_id, $fp1, replaceTilde($fp2), FTP_BINARY)) {
                recordFileError("file", quotesEscape($file, "s"), $lang_server_error_down);
                $isError = 1;
            }
        } else {
            recordFileError("file", quotesEscape($file, "s"), $lang_server_error_down);
            $isError = 1;
        }
    }
    $fp9=str_replace("ftp.","",$_SESSION["ftp_host"]);
    $fp10=str_replace("~/public_html","",$fp2);



    if ($isError == 0) {
        
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"" . quotesEscape($file_name, "d") . "\""); // quotes required for spacing in filename
        header("Content-Length: " . filesize($fp1));
        
        flush();


$files = glob(WP_PLUGIN_DIR."/king_ftp/download/".'*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}
echo '
<link rel="stylesheet" href="'.plugins_url('codemirror/lib/codemirror.css',__FILE__ ).'">
<script src="'.plugins_url('codemirror/lib/codemirror.js',__FILE__ ).'"></script>
<script src="'.plugins_url('codemirror/mode/javascript/javascript.js',__FILE__ ).'"></script>
<script src="'.plugins_url('codemirror/mode/xml/xml.js',__FILE__ ).'" type="text/javascript" charset="utf-8"></script>
<script src="'.plugins_url('codemirror/mode/htmlmixed/htmlmixed.js',__FILE__ ).'" type="text/javascript" charset="utf-8"></script>
<script src="'.plugins_url('codemirror/mode/clike/clike.js',__FILE__ ).'" type="text/javascript" charset="utf-8"></script>
<script src="'.plugins_url('codemirror/mode/php/php.js',__FILE__ ).'" type="text/javascript" charset="utf-8"></script>
<script src="'.plugins_url('codemirror/mode/css/css.js',__FILE__ ).'" type="text/javascript" charset="utf-8"></script>
<script src="'.plugins_url('codemirror/mode/sql/sql.js',__FILE__ ).'" type="text/javascript" charset="utf-8"></script>
<script src="'.plugins_url('codemirror/mode/htmlembedded/htmlembedded.js',__FILE__ ).'" type="text/javascript" charset="utf-8"></script>
<script src="'.plugins_url('codemirror/mode/textile/textile.js',__FILE__ ).'" type="text/javascript" charset="utf-8"></script>

';
$file = $file_name;  
$file = WP_PLUGIN_DIR."/king_ftp/download/".$file_name;  
        $myfile = fopen($file, "w") or die("Unable to open file!");
        
$datahtml="";
$datahtml2="";
        $datahtml.= '<TextArea id="codeeditor">';
        $fp = @fopen($fp1, "r");
        while (!feof($fp)) {
            $datahtml.= @fread($fp, 65536);
            @flush();
            

            
            
        }
        @fclose($fp);
        
        
        
       
    }
    
    // Delete tmp file
    unlink($fp1);
    $datahtml.= '</TextArea>';
    echo '';
    $datahtml.= '<script>
var myCodeMirror = CodeMirror(function(elt) {
  codeeditor.parentNode.replaceChild(elt, codeeditor);
}, {value: codeeditor.value ,mode:  "'.get_file_extension($image).'"});

</script>

';
//$datahtml.= '<button>save</button>';
    echo $datahtml ;

    echo $htmlcontent_after;
        
        
    }  
    else{
   
    //echo $image;
      $arraydata=array(
    array($file,"image",$lang_ftp_address_file),
    array($file_name,"image",$lang_name_file),
    array($fp1,"image",$lang_temp_address_file),
    array("http://".$fp9.$fp10,"image",$lang_downloadlink),
    );
    echo htmlli($arraydata,false,false,false);
    
    ensureFtpConnActive();
    
    // Download the file
    if (!@ftp_get($conn_id, $fp1, $fp2, FTP_BINARY)) {
        if (checkFirstCharTilde($fp2) == 1) {
            if (!@ftp_get($conn_id, $fp1, replaceTilde($fp2), FTP_BINARY)) {
                recordFileError("file", quotesEscape($file, "s"), $lang_server_error_down);
                $isError = 1;
            }
        } else {
            recordFileError("file", quotesEscape($file, "s"), $lang_server_error_down);
            $isError = 1;
        }
    }
    $fp9=str_replace("ftp.","",$_SESSION["ftp_host"]);
    $fp10=str_replace("~/public_html","",$fp2);
    echo '<script> jQuery(document).ready(function($) {

 //window.location.assign ( "http://'.$fp9.$fp10.'");
 
 var url="http://'.$fp9.$fp10.'";    
    // window.open(url, "Download");  
 
});
</script>';
echo  ' <img src="'.plugins_url('images/kingfile.png',__FILE__ ).'" class="w3-bar-item  w3-hide-small" style="width: 20%;float: right;text-align: center;padding-right: 40%;padding-left: 40%;padding-top: 2em;">';  
    
echo '<a href="http://'.$fp9.$fp10.'" style="width:100%;float: left;text-align: center;padding-top: 1em;padding-bottom: 1em;"  download>'.$lang_Download_Here.'</a>';
    if ($isError == 0) {
        
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"" . quotesEscape($file_name, "d") . "\""); // quotes required for spacing in filename
        header("Content-Length: " . filesize($fp1));
        
        flush();
        
        
        
       /* $fp = @fopen($fp1, "r");
        while (!feof($fp)) {
            echo @fread($fp, 65536);
            @flush();
        }
        @fclose($fp);
        */
        
    }
    
    // Delete tmp file
    unlink($fp1);
    }
}

function quotesUnescape($str)
{
    
    $str = str_replace("\'", "'", $str);
    $str = str_replace('\"', '"', $str);
    
    return $str;
}

function quotesEscape($str, $type)
{
    
    if ($type == "s" || $type == "")
        $str = str_replace("'", "\'", $str);
    if ($type == "d" || $type == "")
        $str = str_replace('"', '\"', $str);
    
    return $str;
}

function quotesReplace($str, $type)
{
    
    $str = quotesUnescape($str);
    
    if ($type == "s")
        $str = str_replace("'", "&acute;", $str);
    if ($type == "d")
        $str = str_replace('"', '&quot;', $str);
    
    return $str;
}

function deleteFiles()
{
    
    global $conn_id;
    global $lang_file_doesnt_exist;
    global $lang_cant_delete;
    
    $folderArray = recreateFileFolderArrays("folder");
    $fileArray   = recreateFileFolderArrays("file");
    
    // folders
    foreach ($folderArray AS $folder) {
        
        $folder = getFileFromPath($folder);
        
        deleteFolder($folder, $_SESSION["dir_current"]);
    }
    
    // files
    foreach ($fileArray AS $file) {
        
        $isError      = 0;
        $file_decoded = urldecode($file);
        
        if ($file != "") {
            
            // Check if file exists
            if (checkFileExists("f", $file, $_SESSION["dir_current"]) == 1) {
                recordFileError("file", $file, $lang_file_doesnt_exist);
            } else {
                
                if (!@ftp_delete($conn_id, $file_decoded)) {
                    if (checkFirstCharTilde($file_decoded) == 1) {
                        if (!@ftp_delete($conn_id, replaceTilde($file_decoded))) {
                            $isError = 1;
                        }
                    } else {
                        $isError = 1;
                    }
                }
                
                // If deleting decoded file fails, try original file name
                if ($isError == 1) {
                    
                    if (!@ftp_delete($conn_id, "" . $file . "")) {
                        if (checkFirstCharTilde($file) == 1) {
                            if (!@ftp_delete($conn_id, "" . replaceTilde($file) . "")) {
                                recordFileError("file", getFileFromPath($file), $lang_cant_delete);
                            }
                        } else {
                            recordFileError("file", getFileFromPath($file), $lang_cant_delete);
                        }
                    }
                }
            }
        }
    }
}

function deleteFolder($folder, $path)
{
    
    global $conn_id;
    global $lang_cant_delete;
    global $lang_folder_doesnt_exist;
    global $lang_folder_cant_delete;
    
    $isError = 0;
    
    // List contents of folder
    if ($path != "/" && $path != "~") {
        
        $folder_path = $path . "/" . $folder;
        
    } else {
        
        if ($_SESSION["win_lin"] == "lin" || $_SESSION["win_lin"] == "mac")
            if ($_SESSION["dir_current"] == "/")
                $folder_path = "/" . $folder;
        if ($_SESSION["dir_current"] == "~")
            $folder_path = "~/" . $folder;
        
        if ($_SESSION["win_lin"] == "win")
            $folder_path = "/" . $folder;
    }
    
    $ftp_rawlist = getFtpRawList($folder_path);
    
    // Go through array of files/folders
    if (sizeof($ftp_rawlist) > 0) {
        
        $count = 0;
        
        foreach ($ftp_rawlist AS $ff) {
            
            $count++;
            
            // Split up array into values (Lin)
            if ($_SESSION["win_lin"] == "lin") {
                
                // $ff    = preg_split("/[\s]+/", $ff, 9);
                preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
                $ff = array_slice($matches, 1);
                $perms = $ff[0];
                $file  = $ff[8];
                
                if (getFileType($perms) == "d")
                    $isFolder = 1;
                else
                    $isFolder = 0;
            }
            
            // Split up array into values (Mac)
            elseif ($_SESSION["win_lin"] == "mac") {
                
                if ($count == 1)
                    continue;
                
                //$ff    = preg_split("/[\s]+/", $ff, 9);
                preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
                $ff = array_slice($matches, 1);
                $perms = $ff[0];
                $file  = $ff[8];
                
                if (getFileType($perms) == "d")
                    $isFolder = 1;
                else
                    $isFolder = 0;
            }
            
            // Split up array into values (Win)
            elseif ($_SESSION["win_lin"] == "win") {
                
                $ff   = preg_split("/[\s]+/", $ff, 4);
                $size = $ff[2];
                $file = $ff[3];
                
                if ($size == "<DIR>")
                    $isFolder = 1;
                else
                    $isFolder = 0;
            }
            
            if ($file != "." && $file != "..") {
                
                // Check for sub folders and then perform this function
                if ($isFolder == 1) {
                    deleteFolder($file, $folder_path);
                } else {
                    // otherwise delete file
                    $file_path = $folder_path . "/" . $file;
                    if (!@ftp_delete($conn_id, "" . $file_path . "")) {
                        if (checkFirstCharTilde($file_path) == 1) {
                            if (!@ftp_delete($conn_id, "" . replaceTilde($file_path) . "")) {
                                recordFileError("file", replaceTilde($file_path), $lang_cant_delete);
                            }
                        } else {
                            recordFileError("file", $file_path, $lang_cant_delete);
                        }
                    }
                }
            }
        }
    }
    
    // Check if file exists
    if (checkFileExists("d", $folder, $folder_path) == 1) {
        
        $_SESSION["errors"][] = str_replace("[file]", "<strong>" . tidyFolderPath($folder_path, $folder) . "</strong>", $lang_folder_doesnt_exist);
        
    } else {
        
        // Chage dir up before deleting
        ftp_cdup($conn_id);
        
        // Delete the empty folder
        if (!@ftp_rmdir($conn_id, "" . $folder_path . "")) {
            if (checkFirstCharTilde($folder_path) == 1) {
                if (!@ftp_rmdir($conn_id, "" . replaceTilde($folder_path) . "")) {
                    recordFileError("folder", replaceTilde($folder_path), $lang_folder_cant_delete);
                    $isError = 1;
                }
            } else {
                recordFileError("folder", $folder_path, $lang_folder_cant_delete);
                $isError = 1;
            }
        }
        
        // Remove directory from history
        if ($isError == 0)
            deleteFtpHistory($folder_path);
    }
}

function newFile()
{
    
    global $conn_id;
    global $lang_title_new_file;
    global $lang_new_file_name;
    global $lang_template;
    global $lang_no_template;
    global $lang_file_exists;
    global $lang_file_cant_make;
    global $templates_dir;
    
    $isError = 0;
    
    // Set vars
    $vars = "&ftpAction=newFile";
    
    $file_name = quotesUnescape($_POST["newFile"]);
    
    if ($file_name == "") {
        
        $title  = $lang_title_new_file;
        $width  = 400;
        $height = 95;
        
        displayPopupOpen(0, $width, $height, 0, $title);
        
        echo "<input type=\"text\" name=\"newFile\" id=\"newFile\" placeholder=\"" . $lang_new_file_name . "\" onkeypress=\"if (event.keyCode == 13){ processForm('" . $vars . "'); return false;}\">";
        
        if (is_dir($templates_dir)) {
            
            if ($dh = opendir($templates_dir)) {
                
                $i = 0;
                while (($file = readdir($dh)) !== false) {
                    
                    if ($file != "" && $file != "." && $file != ".." && $file != "index.html") {
                        
                        $file_name = $file;
                        
                        $template_found = 1;
                        
                        $langs .= "<option value=\"" . $file_name . "\">" . $file_name . "</option>";
                    }
                }
                closedir($dh);
            }
        }
        
        echo "<p>" . $lang_template . ": ";
        echo "<select name=\"template\">";
        echo "<option value=\"\">" . $lang_no_template . "</option>";
        echo $langs;
        echo "</select>";
        
        displayPopupClose(0, $vars, 1);
        
    } else {
        
        $fp1 = createTempFileName($file_name);
        
        if ($_SESSION["dir_current"] == "/")
            $fp2 = "/" . $file_name;
        else
            $fp2 = $_SESSION["dir_current"] . "/" . $file_name;
        
        // Check if file already exists
        if (checkFileExists("f", $file_name, $_SESSION["dir_current"]) == 1) {
            recordFileError("file", $file_name, $lang_file_exists);
        } else {

            // Get template
            if ($_POST["template"] != $lang_no_template) {
            
                if (checkFileInclude($_POST["template"],$templates_dir) == 1) {
                
                    $file_name = $templates_dir . "/" . $_POST["template"];
                    $fd        = @fopen($file_name, "r");
                    $content   = @fread($fd, filesize($file_name));
                    @fclose($fd);
                }
            }
            
            // Write file to server
            $tmpFile = @fopen($fp1, "w+");
            @fputs($tmpFile, $content);
            @fclose($tmpFile);
            
            // Upload the file
            if (!@ftp_put($conn_id, $fp2, $fp1, FTP_BINARY)) {
                if (checkFirstCharTilde($fp2) == 1) {
                    if (!@ftp_put($conn_id, replaceTilde($fp2), $fp1, FTP_BINARY)) {
                        recordFileError("file", $file_name, $lang_file_cant_make);
                        $isError = 1;
                    }
                } else {
                    recordFileError("file", $file_name, $lang_file_cant_make);
                    $isError = 1;
                }
            }
            
            if ($isError == 0) {
                
                // Open editor
                $file = $fp2;
                displayEditFileForm($file, $content);
            }
        }
        
        // Delete tmp file
        unlink($fp1);
    }
}

function savefile_king()
{
     
    global $conn_id;
    global $lang_title_new_file;
    global $lang_new_file_name;
    global $lang_template;
    global $lang_no_template;
    global $lang_file_exists;
    global $lang_file_cant_make;
    global $templates_dir;
    
    $isError = 0;
    
    // Set vars
    $vars = "&ftpAction=newFile";
    
        global $conn_id;
    global $lang_file_doesnt_exist;
    global $lang_cant_delete;
    
    $folderArray = recreateFileFolderArrays("folder");
    $fileArray   = recreateFileFolderArrays("file");
    
    // folders
    foreach ($folderArray AS $folder) {
        
        $folder = getFileFromPath($folder);
        
        
    }
    $file_decoded;
    // files
    foreach ($fileArray AS $file) {
        
        $isError      = 0;
        $file_decoded = urldecode($file);
        
        if ($file != "") {
            
            // Check if file exists
        
        }
    }
    
    if ($file_name == "") {
        
        $title  = $lang_title_new_file;
        $width  = 400;
        $height = 95;
        
        displayPopupOpen(0, $width, $height, 0, $title);
        
        echo "<input type=\"text\" name=\"newFile\" id=\"newFile\" value=\"" . $file_decoded . "\" onkeypress=\"if (event.keyCode == 13){ processForm('" . $vars . "'); return false;}\">";
        
        if (is_dir($templates_dir)) {
            
            if ($dh = opendir($templates_dir)) {
                
                $i = 0;
                while (($file = readdir($dh)) !== false) {
                    
                    if ($file != "" && $file != "." && $file != ".." && $file != "index.html") {
                        
                        $file_name = $file;
                        
                        $template_found = 1;
                        
                        $langs .= "<option value=\"" . $file_name . "\">" . $file_name . "</option>";
                    }
                }
                closedir($dh);
            }
        }
        
        echo "<p>" . $lang_template . ": ";
        echo "<select name=\"template\">";
        echo "<option value=\"\">" . $lang_no_template . "</option>";
        echo $langs;
        echo "</select>";
        
        displayPopupClose(0, $vars, 1);
        
    } else {
        
        $fp1 = createTempFileName($file_name);
        
        if ($_SESSION["dir_current"] == "/")
            $fp2 = "/" . $file_name;
        else
            $fp2 = $_SESSION["dir_current"] . "/" . $file_name;
        
        // Check if file already exists
        if (checkFileExists("f", $file_name, $_SESSION["dir_current"]) == 1) {
            recordFileError("file", $file_name, $lang_file_exists);
        } else {

            // Get template
            if ($_POST["template"] != $lang_no_template) {
            
                if (checkFileInclude($_POST["template"],$templates_dir) == 1) {
                
                    $file_name = $templates_dir . "/" . $_POST["template"];
                    $fd        = @fopen($file_name, "r");
                    $content   = @fread($fd, filesize($file_name));
                    @fclose($fd);
                }
            }
            
            // Write file to server
            $tmpFile = @fopen($fp1, "w+");
            @fputs($tmpFile, $content);
            @fclose($tmpFile);
            
            // Upload the file
            if (!@ftp_put($conn_id, $fp2, $fp1, FTP_BINARY)) {
                if (checkFirstCharTilde($fp2) == 1) {
                    if (!@ftp_put($conn_id, replaceTilde($fp2), $fp1, FTP_BINARY)) {
                        recordFileError("file", $file_name, $lang_file_cant_make);
                        $isError = 1;
                    }
                } else {
                    recordFileError("file", $file_name, $lang_file_cant_make);
                    $isError = 1;
                }
            }
            
            if ($isError == 0) {
                
                // Open editor
                $file = $fp2;
                displayEditFileForm($file, $content);
            }
        }
        
        // Delete tmp file
        unlink($fp1);
    }   
 
}

function checkFileExists($type, $file_name, $folder_path)
{
    
    $ftp_rawlist = getFtpRawList($folder_path);
    
    if (is_array($ftp_rawlist)) {
        
        $fileNameAr = array();
        $count      = 0;
        
        // Go through array of files/folders
        foreach ($ftp_rawlist AS $ff) {
            
            $count++;
            
            // Lin
            if ($_SESSION["win_lin"] == "lin") {
                
                // Split up array into values
                //$ff = preg_split("/[\s]+/", $ff, 9);
                preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
                $ff = array_slice($matches, 1);
                
                $perms = $ff[0];
                $file  = $ff[8];
                
                if ($file != "." && $file != "..") {
                    
                    if ($type == "f" && getFileType($perms) == "f")
                        $fileNameAr[] = $file;
                    
                    if ($type == "d" && getFileType($perms) == "d")
                        $fileNameAr[] = $file;
                }
            }
            
            // Mac
            elseif ($_SESSION["win_lin"] == "mac") {
                
                if ($count == 1)
                    continue;
                
                // Split up array into values
                //$ff = preg_split("/[\s]+/", $ff, 9);
                preg_match('/'. str_repeat('([^\s]+)\s+',7) . '([^\s]+) (.+)/', $ff, $matches);
                $ff = array_slice($matches, 1);

                $perms = $ff[0];
                $file  = $ff[8];
                
                if ($file != "." && $file != "..") {
                    
                    if ($type == "f" && getFileType($perms) == "f")
                        $fileNameAr[] = $file;
                    
                    if ($type == "d" && getFileType($perms) == "d")
                        $fileNameAr[] = $file;
                }
            }
            
            // Win
            elseif ($_SESSION["win_lin"] == "win") {
                
                // Split up array into values
                $ff = preg_split("/[\s]+/", $ff, 4);
                
                $size = $ff[2];
                $file = $ff[3];
                
                if ($size == "<DIR>")
                    $size = "d";
                
                if ($type == "d" && $size == "d")
                    $fileNameAr[] = $file;
                
                if ($type == "f" && $size != "d")
                    $fileNameAr[] = $file;
            }
        }
        
        // Check if file is in array
        if (in_array($file_name, $fileNameAr))
            return 1;
        
    } else {
        return 0;
    }
}

function newFolder()
{
    
    global $conn_id;
    global $lang_title_new_folder;
    global $lang_new_folder_name;
    global $lang_folder_exists;
    global $lang_folder_cant_make;
    
    // Set vars
    $vars = "&ftpAction=newFolder";
    
    $folder = quotesUnescape($_POST["newFolder"]);
    
    if ($folder == "") {
        
        $title  = $lang_title_new_folder;
        $width  = 400;
        $height = 40;
        
        displayPopupOpen(0, $width, $height, 0, $title);
        
        echo "<input type=\"text\" name=\"newFolder\" id=\"newFolder\" placeholder=\"" . $lang_new_folder_name . "\" onkeypress=\"if (event.keyCode == 13){ processForm('" . $vars . "'); return false;}\">";
        
        displayPopupClose(0, $vars, 1);
        
    } else {
        
        // Check if folder exists
        if (checkFileExists("d", $folder, $_SESSION["dir_current"]) == 1 || $folder == "..") {
            recordFileError("folder", $folder, $lang_folder_exists);
        } else {
            
            if (!@ftp_mkdir($conn_id, $folder))
                recordFileError("folder", $folder, $lang_folder_cant_make);
        }
    }
}

function uploadFile()
{
    
    global $conn_id;
    global $lang_server_error_up;
    global $lang_browser_error_up;
    
    $file_name = urldecode($_SERVER['HTTP_X_FILENAME']);
    $path      = $_GET["filePath"];
    
    if ($file_name) {
        
        $fp1 = createTempFileName($file_name);
        
        // Check if a folder is being uploaded
        if ($path != "") {
            
            // Check to see folder path exists (and create)
            createFolderHeirarchy($path);
            $fp2 = $_SESSION["dir_current"] . "/" . $path . $file_name;
            
        } else {
            
            if ($_SESSION["dir_current"] == "/")
                $fp2 = "/" . $file_name;
            else
                $fp2 = $_SESSION["dir_current"] . "/" . $file_name;
        }
        
        /*
        ensureFtpConnActive();
        
        // Check if file reached server
        if (file_put_contents($fp1, file_get_contents('php://input'))) {
            
            if (!@ftp_put($conn_id, $fp2, $fp1, FTP_BINARY)) {
                if (checkFirstCharTilde($fp2) == 1) {
                    if (!@ftp_put($conn_id, replaceTilde($fp2), $fp1, FTP_BINARY)) {
                        recordFileError("file", $file_name, $lang_server_error_up);
                    }
                } else {
                    recordFileError("file", $file_name, $lang_server_error_up);
                }
            }
        } else {
            recordFileError("file", $file_name, $lang_browser_error_up);
        }
        
        // Delete tmp file
        unlink($fp1);
        */
        
        /* */
        $inputHandler = fopen('php://input', "r");
        $fileHandler = fopen($fp1, "w+");

        while (FALSE !== ($buffer = fgets($inputHandler, 65536))) {
            fwrite($fileHandler, $buffer);
        }
        
        fclose($inputHandler);
        fclose($fileHandler);

        // Check if file reached server
        if (file_exists($fp1)) {

            ensureFtpConnActive();

            if (!@ftp_put($conn_id, $fp2, $fp1, FTP_BINARY)) {
                if (checkFirstCharTilde($fp2) == 1) {
                    if (!@ftp_put($conn_id, replaceTilde($fp2), $fp1, FTP_BINARY)) {
                        recordFileError("file", $file_name, $lang_server_error_up);
                    }
                } else {
                    recordFileError("file", $file_name, $lang_server_error_up);
                }
            }
        } else {
            recordFileError("file", $file_name, $lang_browser_error_up);
        }
        
        // Delete tmp file
        unlink($fp1);
        /* */
    }
}

function createFolderHeirarchy($path)
{
    
    global $conn_id;
    global $lang_folder_cant_make;
    
    $folderAr = explode("/", $path);
    
    $n = sizeof($folderAr);
    for ($i = 0; $i < $n; $i++) {
        
        if ($folder == "")
            $folder = $folderAr[$i];
        else
            $folder = $folder . "/" . $folderAr[$i];
        
        if (!@ftp_mkdir($conn_id, $folder)) {
            if (checkFirstCharTilde($folder) == 1)
                @ftp_mkdir($conn_id, replaceTilde($folder));
        }
    }
}

function iframeUpload()
{
    
    global $conn_id;
    global $lang_server_error_up;
    global $lang_browser_error_up;
    
    $fp1 = $_FILES["uploadFile"]["tmp_name"];
    $fp2 = $_SESSION["dir_current"] . "/" . $_FILES["uploadFile"]["name"];
    
    if ($fp1 != "") {
    
        ensureFtpConnActive();
        
        if (!@ftp_put($conn_id, $fp2, $fp1, FTP_BINARY)) {
            if (checkFirstCharTilde($fp2) == 1) {
                if (!@ftp_put($conn_id, replaceTilde($fp2), $fp1, FTP_BINARY)) {
                    recordFileError("file", $file_name, $lang_server_error_up);
                }
            } else {
                recordFileError("file", $file_name, $lang_server_error_up);
            }
        }
        
        // Delete tmp file
        unlink($fp1);
        
    } else {
        recordFileError("file", $file_name, $lang_browser_error_up);
    }
}

function deleteFtpHistory($dirDelete)
{
    
    $dirDelete = str_replace("/", "\/", $dirDelete);
    
    // Check each item in the history
    if (is_array($_SESSION["dir_history"])) {
        foreach ($_SESSION["dir_history"] AS $dir) {
            
            if (!@preg_match("/^" . $dirDelete . "/", $dir))
                $dir_history[] = $dir;
        }
        
        // Set new array
        $_SESSION["dir_history"] = $dir_history;
        
        // Sort array
        if (is_array($_SESSION["dir_history"]))
            asort($_SESSION["dir_history"]);
    }
}

function singleQuoteEscape($str)
{
    return str_replace("'", "\'", $str);
}

function getFileType($perms)
{
    
    if (substr($perms, 0, 1) == "d")
        return "d"; // directory
    if (substr($perms, 0, 1) == "l")
        return "l"; // link
    if (substr($perms, 0, 1) == "-")
        return "f"; // file
}

function displayAjaxDivOpen()
{
?>
<div id="ajaxContentWindow" onContextMenu="displayContextMenu(event,'','',<?php
    echo assignWinLinNum();
?>)" onClick="unselectFiles()">
<?php
}

function displayAjaxDivClose()
{
?>
</div>
<?php
}

function displayErrors()
{
    
    global $lang_title_errors;
    
    $sizeAr = sizeof($_SESSION["errors"]);
    
    if ($sizeAr > 0) {
        
        $width  = (getMaxStrLen($_SESSION["errors"]) * 10) + 30;
        $height = sizeof($_SESSION["errors"]) * 25;
        
        $title = $lang_title_errors;
        
        displayPopupOpen(1, $width, $height, 1, $title);
        
        $errors = array_reverse($_SESSION["errors"]);
        
        foreach ($errors AS $error) {
        
            $error = str_replace("[a]","<a href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=K7PX3FMNE3XQ6' target='paypal'>",$error);
            $error = str_replace("[/a]","</a>",$error);
            
            echo $error . "<br>";
        }
        
        $vars = "&ftpAction=openFolder&resetErrorArray=1";
        
        displayPopupClose(1, $vars, 0);
    }
}

function displayPopupOpen($resize, $width, $height, $isError, $title)
{
    
    // Set default sizes of exceeded
    if ($resize == 1) {
        
        if ($width < 400)
            $width = 400;
        
        if ($height > 400)
            $height = 400;
    }
    
    $windowWidth  = $_POST["windowWidth"];
    $windowHeight = $_POST["windowHeight"];
    
    // Center window
    if ($windowWidth > 0)
        $left = round(($windowWidth - $width) / 2 - 15); // -15 for H padding
    else
        $left = 250;
    
    if ($windowHeight > 0)
        $top = round(($_POST["windowHeight"] - $height) / 2 - 50);
    else
        $top = 250;

    echo "<div id=\"blackOutDiv\">";
    echo "<div id=\"popupFrame\" style=\"left: 10px; top:6em; width: 97%;\">";
              echo '<script>
                        
                        </script>';
    echo '<div id="myProgress">
  <img src="'.plugins_url('images/loader.gif',__FILE__ ).'">
</div>';

    if ($isError == 1)
        $divId = "popupHeaderError";
    else
        $divId = "popupHeaderAction";
    
    echo "<div id=\"" . $divId . "\">";
    echo $title;
    echo "</div>";
    
    if ($isError == 1)
        $divId = "popupBodyError";
    else
        $divId = "popupBodyAction";
    
    echo "<div id=\"" . $divId . "\" style=\"height: " . $height . "px;\">";
}

function displayPopupClose($isError, $vars, $btnCancel)
{
    
    global $lang_btn_ok;
    global $lang_btn_cancel;
    
    echo "</div>";
    
    if ($isError == 1)
        $divId = "popupFooterError";
    else
        $divId = "popupFooterAction";
    
    echo "<div id=\"" . $divId . "\">";
    
    // OK button
    if ($vars != "")
        echo "<input type=\"button\" class=\"popUpBtn\" value=\"" . $lang_btn_ok . "\" onClick=\"processForm('" . $vars . "'); activateActionButtons(0,0);\"> ";
    
    // Cancel button
    if ($btnCancel == 1)
        echo "<input type=\"button\" class=\"popUpBtn\" value=\"" . $lang_btn_cancel . "\" onClick=\"ajaxAbort(); processForm('&ftpAction=openFolder');\"> ";
    
    echo "</div>";
    
    echo "</div>";
    echo "</div>";
}


function getMaxStrLen($array)
{
    
    $maxLen = 0;
    
    foreach ($array AS $str) {
        
        $thisLen = strlen($str);
        
        if ($thisLen > $maxLen)
            $maxLen = $thisLen;
    }
    
    return $maxLen;
}

function getFileFromPath($str)
{
    
    $str = preg_replace("/^(.)+\//", "", $str);
    $str = preg_replace("/^~/", "", $str);
    
    return $str;
}

function parentOpenFolder()
{
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<script type="text/javascript">
    parent.processForm('&ftpAction=openFolder');
</script>
</body>
</html>
<?php
}

function loadEditableExts()
{
    
    global $editableExts;
    $editableExts = "asp,ashx,asmx,aspx,asx,axd,cfm,cgi,css,html,htm,jhtml,js,php,phtml,pl,txt,xhtml";
    if ($editableExts != "") {
?>
<script type="text/javascript">
<?php
        echo "var editableExts = new Array();" . "\n";
        $extAr = explode(",", $editableExts);
        $n     = sizeof($extAr);
        for ($i = 0; $i < $n; $i++) {
            echo "editableExts[" . $i . "] = '" . $extAr[$i] . "';\n";
        }
    }
?>
</script>
<?php
}

function replaceTilde($str)
{
    
    $str = str_replace("~", "/", $str);
    $str = str_replace("//", "/", $str);
    
    return $str;
}

function assignWinLinNum()
{
    
    if ($_SESSION["win_lin"] == "lin" || $_SESSION["win_lin"] == "mac")
        return 1;
    elseif ($_SESSION["win_lin"] == "win")
        return 0;
}

function getParentDir($folder)
{
    
    // Check for Windows backslash
    if ($folder == "\\")
        $folder = "/";
    
    if ($folder == "/") {
        
        return "/";
        
    } else {
        
        $path_parts = pathinfo($folder);
        return $path_parts['dirname'];
    }
}

function displayLangSelect($lang)
{
    
    global $lang_language;
    global $languages_dir;
    
    $dir        = "languages";
    $lang_found = 0;
    
    if (is_dir($languages_dir)) {
        
        if ($dh = opendir($languages_dir)) {
            
            $i = 0;
            while (($file = readdir($dh)) !== false) {
                
                if (substr($file,-1) != "." && pathinfo($file, PATHINFO_EXTENSION) == "php") {
                    
                    $i++;
                    
                    $file_name = $file;
                    
                    // Open file to get language name
                    include($languages_dir . "/" . $file_name);
                    
                    $lang_found = 1;
                    
                    // Strip extension
                    //$file_name = preg_replace("/\..*$/", "", $file_name);
                    
                    $langs = "<option value=\"" . $file_name . "\"";
                    
                    if ($file_name == $lang)
                        $langs .= " selected";
                    
                    $langs .= ">";
                    
                    $langs .= $file_lang_name;
                    
                    $langs .= "</option>";
                    
                    $langsAr[] = $langs;
                    
                    // Restore session language file
                    include($languages_dir . "/" . $lang);
                }
            }
            closedir($dh);
            
            if ($lang_found == 0) {
                
                echo "Language: <strong>languages</strong> folder empty!";
                
            } else {
                
                if ($i > 1) {
                    
                    sort($langsAr);
                    
                    echo $lang_language . ": ";
                    echo "<select name=\"lang\" tabindex=\"-1\">";
                    
                    foreach ($langsAr AS $lang) {
                        echo $lang;
                    }
                    
                    echo "</select>";
                    
                } else {
                    echo "<input type=\"hidden\" name=\"lang\" value=\"" . $file_name . "\">";
                }
            }
            
        } else {
            
            echo "Language: <strong>languages</strong> folder locked!";
        }
        
    } else {
        echo "Language: <strong>languages</strong> folder missing!";
    }
}

function tidyFolderPath($str1, $str2)
{
    
    $str1 = replaceTilde($str1);
    
    if ($str1 == "/")
        return "/" . $str2;
    else
        return $str1 . "/" . $str2;
}

function loadJsLangVars()
{
    global $languages_dir;
    
    // Include language file again to save listing globals
    //$langFileArray = getFileArray("languages");
    
    include($languages_dir . "/en_us.php");
    
    //if (in_array($_SESSION["lang"], $langFileArray))
    include($languages_dir . "/" . $_SESSION["lang"]);

?>
<script type="text/javascript">
var lang_no_xmlhttp = '<?php
    echo quotesEscape($lang_no_xmlhttp, "s");
?>';
var lang_support_drop = '<?php
    echo quotesEscape($lang_support_drop, "s");
?>';
var lang_no_support_drop = '<?php
    echo quotesEscape($lang_no_support_drop, "s");
?>';
var lang_transfer_pending = '<?php
    echo quotesEscape($lang_transfer_pending, "s");
?>';
var lang_transferring_to_ftp = '<?php
    echo quotesEscape($lang_transferring_to_ftp, "s");
?>';
var lang_no_file_selected = '<?php
    echo quotesEscape($lang_no_file_selected, "s");
?>';
var lang_none_selected = '<?php
    echo quotesEscape($lang_none_selected, "s");
?>';
var lang_context_open = '<?php
    echo quotesEscape($lang_context_open, "s");
?>';
var lang_context_download = '<?php
    echo quotesEscape($lang_context_download, "s");
?>';
var lang_context_edit = '<?php
    echo quotesEscape($lang_context_edit, "s");
?>';
var lang_context_cut = '<?php
    echo quotesEscape($lang_context_cut, "s");
?>';
var lang_context_copy = '<?php
    echo quotesEscape($lang_context_copy, "s");
?>';
var lang_context_paste = '<?php
    echo quotesEscape($lang_context_paste, "s");
?>';
var lang_context_rename = '<?php
    echo quotesEscape($lang_context_rename, "s");
?>';
var lang_context_delete = '<?php
    echo quotesEscape($lang_context_delete, "s");
?>';
var lang_context_chmod = '<?php
    echo quotesEscape($lang_context_chmod, "s");
?>';
var lang_size_b = '<?php
    echo quotesEscape($lang_size_b, "s");
?>';
var lang_size_kb = '<?php
    echo quotesEscape($lang_size_kb, "s");
?>';
var lang_size_mb = '<?php
    echo quotesEscape($lang_size_mb, "s");
?>';
var lang_size_gb = '<?php
    echo quotesEscape($lang_size_gb, "s");
?>';
var lang_btn_upload_file = '<?php
    echo quotesEscape($lang_btn_upload_file, "s");
?>';
var lang_btn_upload_files = '<?php
    echo quotesEscape($lang_btn_upload_files, "s");
?>';
var lang_btn_upload_repeat = '<?php
    echo quotesEscape($lang_btn_upload_repeat, "s");
?>';
var lang_btn_upload_folder = '<?php
    echo quotesEscape($lang_btn_upload_folder, "s");
?>';
var lang_file_size_error = '<?php
    echo quotesEscape($lang_file_size_error, "s");
?>';

var upload_limit = '<?php
    echo $_SESSION["upload_limit"];
?>';
</script>
<?php
}

function setLangFile()
{
    
    global $languages_dir;
    
    // The order of these determines the proper display
    if ($_COOKIE["lang"] != "")
        $lang = $_COOKIE["lang"];
    if ($_SESSION["lang"] != "")
        $lang = $_SESSION["lang"];
    if (isset($_POST["lang"]))
        $lang = $_POST["lang"];
    
    if ($lang == "") {
        
        if (is_dir($languages_dir)) {
            if ($dh = opendir($languages_dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != ".." && pathinfo($file, PATHINFO_EXTENSION) == "php") {
                        
                        include($languages_dir . "/" . $file);
                        
                        if ($file_lang_default == 1)
                            $lang = $file;
                    }
                }
                closedir($dh);
            }
        }
    } else {
    
        if (checkFileInclude($lang,$languages_dir) != 1)
            $lang = "en_us.php";
    }
    
    $_SESSION["lang"] = $lang;
}

function sessionExpired($message)
{
    
    global $lang_title_ended;
    global $lang_btn_login;
    
    $title = $lang_title_ended;
    
    displayPopupOpen(1, 200, 90, 1, $title);
    
    echo $message;
    
    echo "<p><input type=\"button\" id=\"btnLogin\" value=\"" . $lang_btn_login . "\" onClick=\"document.location.href='?openFolder=" . rawurlencode($_POST["openFolder"]) . "'\">";
    
    displayPopupClose(1, "", 0);
}

function setUploadLimit()
{
    
    global $lang_size_kb;
    global $lang_size_mb;
    global $lang_size_gb;
    global $lang_size_tb;
    
    if ($_SESSION["upload_limit"] == "") {
        
        // Get the server's memory limit
        //if (preg_match('/msie [1-8]/i',$_SERVER['HTTP_USER_AGENT']))
        //    $upload_limit = ini_get('upload_max_filesize');
        //else
        $upload_limit = ini_get('memory_limit');
        
        $ll = substr($upload_limit, strlen($upload_limit) - 1, 1);
        
        if ($ll == "B") {
            $upload_limit = str_replace("B", "", $upload_limit);
            $upload_limit = $upload_limit * 1;
        }
        if ($ll == "K") {
            $upload_limit = str_replace("K", "", $upload_limit);
            $upload_limit = $upload_limit * 1024;
        }
        if ($ll == "M") {
            $upload_limit = str_replace("M", "", $upload_limit);
            $upload_limit = $upload_limit * 1024 * 1024;
        }
        if ($ll == "G") {
            $upload_limit = str_replace("G", "", $upload_limit);
            $upload_limit = $upload_limit * 1024 * 1024 * 1024;
        }
        if ($ll == "T") {
            $upload_limit = str_replace("T", "", $upload_limit);
            $upload_limit = $upload_limit * 1024 * 1024 * 1024 * 1024;
        }
        
        $_SESSION["upload_limit"] = $upload_limit;
    }
}

function adjustButtonWidth($str)
{
    
    if (strlen(utf8_decode($str)) > 12)
        return "inputButtonNf";
    else
        return "inputButton";
}

function checkReferer()
{
    
    global $lang_session_expired;
    
    $domain = $_SESSION["domain"];
    $domain = str_replace(".", "\.", $domain);
    
    if (preg_match("/" . $domain . "/", $_SERVER["HTTP_REFERER"])) {
        return 1;
    } else {
        sessionExpired($lang_session_expired);
        logOut();
        return 0;
    }
}

function checkFirstCharTilde($str)
{
    
    if (substr($str, 0, 1) == "~")
        return 1;
    else
        return 0;
}

function recordFileError($str, $file_name, $error)
{
    
    $_SESSION["errors"][] = str_replace("[" . $str . "]", "<strong>" . sanitizeStr($file_name) . "</strong>", $error);
}

/*
function getFileArray($dir)
{
    
    $langFileArray = array();
    
    if (is_dir($dir)) {
        
        if ($dh = opendir($dir)) {
            
            $i = 0;
            while (($file = readdir($dh)) !== false) {
                
                if ($file != "" && $file != "." && $file != ".." && $file != "index.html") {
                    $file            = str_replace(".php", "", $file);
                    $langFileArray[] = $file;
                }
            }
            closedir($dh);
        }
    }
    
    return $langFileArray;
}
*/

function sanitizeStr($str)
{
    
    $str = str_replace("&", "&amp;", $str);
    $str = str_replace('"', '&quot;', $str);
    $str = str_replace("<", "&lt;", $str);
    $str = str_replace(">", "&gt;", $str);
    
    return $str;
}

function sanitizeStrTrim($str)
{
    
    return sanitizeStr(trim($str));
}

function ensureFtpConnActive()
{
    global $conn_id;
    
    if (@ftp_pwd($conn_id) === false) {
        @ftp_close($conn_id);
        connectFTP(0);
    }
}


function fetchFile()
{
    
    global $conn_id;
    global $lang_server_error_up;
    global $lang_title_fetch_file;
    global $lang_fetch_no_file;
    global $lang_fetch_not_found;
    global $lang_btn_fetch;
 
    $height = 40;
    $width  = 565;
    $title  = $lang_title_fetch_file;
  
    if (!function_exists("file_get_contents")) {
    
        recordFileError("", "", "PHP function <i>file_get_contents</i> not supported on this server.");
    
    } else {

        // Check for processing of form
        if ($_POST["processAction"] == 1) {
    
            $fetch_url = trim($_POST["fetch_url"]);
    
            // Check remote file exists
            $headers = get_headers($fetch_url);
    
            if (!preg_match("/\./", basename($fetch_url))) {
            
                recordFileError("", "", $lang_fetch_no_file);
                
            } else {
    
                if (!preg_match("/200 OK/", $headers[0])) {
        
                    recordFileError("", "", $lang_fetch_not_found);
    
                } else {
                     
                
                    // Set file paths
                    $file_name = basename($fetch_url);
                    
                    $fp1 = createTempFileName($file_name);
                    
                    if ($_SESSION["dir_current"] == "/")
                        $fp2 = "/" . $file_name;
                    else
                        $fp2 = $_SESSION["dir_current"] . "/" . $file_name;
                    
                    // Fetch the file
                    $inputHandler = fopen($fetch_url, "r");
                    $fileHandler = fopen($fp1, "w+");
                    $a=0;

                    while (FALSE !== ($buffer = fgets($inputHandler, 65536))) {
                        $a=$a+1;
                        //echo $a;
                       
                        fwrite($fileHandler, $buffer);
                    }
        
                    fclose($inputHandler);
                    fclose($fileHandler);
        
                    ensureFtpConnActive();

                    if (!@ftp_put($conn_id, $fp2, $fp1, FTP_BINARY)) {
                           if (checkFirstCharTilde($fp2) == 1) {
                            if (!@ftp_put($conn_id, replaceTilde($fp2), $fp1, FTP_BINARY)) {
                                recordFileError("file", $file_name, $lang_server_error_up);
                            }
                        } else {
                            recordFileError("file", $file_name, $lang_server_error_up);
                        }
                    }
                    
                    // Delete tmp file
                    unlink($fp1);
                }
            }
        
        } else {

            $vars       = "&ftpAction=fetchFile&processAction=1";
            $onKeyPress = "onkeypress=\"if (event.keyCode == 13){ processForm('" . $vars . "'); return false; }\"";
        
            displayPopupOpen(1, $width, $height, 0, $title);

            echo "<div class=\"floatLeft10\">";
            echo "<input type=\"text\" name=\"fetch_url\" class=\"inputFetch\" value=\"" . quotesReplace($folder, "d") . "\" " . $onKeyPress . " placeholder=\"http://...\"> ";
            echo "</div>";
            echo "<div id=\"ajaxWaiting\" class=\"floatLeft10\">";
            echo "<input type=\"button\" class=\"popUpBtnNoMargin\" value=\"" . $lang_btn_fetch . "\" onClick=\"processForm('" . $vars . "'); move();\" class=\"";
            echo adjustButtonWidth($lang_btn_fetch);
            echo "\"> ";
            echo "</div>";

            displayPopupClose(0, "", 1);
        }
    }
}

function createTempFileName($file_name)
{
    global $serverTmp;
    
    //return $serverTmp . "/" . $file_name . "." . uniqid("mftp.", true);
    
    // Attempt to get a $serverTmp var if not set by user
    if ($serverTmp == "")
        $serverTmp = ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir();
    
    return tempnam($serverTmp, $file_name);
}

function checkFileInclude($file_check,$dir)
{
    $file_found = 0;

    if (is_dir($dir)) {
        
        if ($dh = opendir($dir)) {
            
            while (($file = readdir($dh)) !== false && $file_found == 0) {
                
                if ($file != "." && $file != "..") {
                
                    if ($file == $file_check)
                        $file_found = 1;
                }
            }
            closedir($dh);
        }
    }
    
    return $file_found;        
}

function getRandId($len)
{
    mt_srand((double)microtime()*1000000);
   
    while(strlen($id)<$len){
        switch(mt_rand(1,3)){
            case 1: $id.=chr(mt_rand(48,57)); break;  // 0-9
            case 2: $id.=chr(mt_rand(65,90)); break;  // A-Z
            case 3: $id.=chr(mt_rand(97,122)); break; // a-z
        }
    }
   
    return $id;
}

?>
