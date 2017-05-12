<?php 
function esc_url($url) {
if ('' == $url) {return $url;} $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);$strip = array('%0d', '%0a', '%0D', '%0A');
$url = (string) $url;
$count = 1;
while ($count) {
$url = str_replace($strip, '', $url, $count);
 }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

function login_check($dbc) {
    // Check if all session variables are set 
    if (isset($_SESSION['username'], 
                        $_SESSION['login_string'])) {
							
 
       
        $login_string = $_SESSION['login_string'];
        $username =$_SESSION['username'];
 
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if ($stmt = $dbc->prepare("SELECT password 
                                      FROM register 
                                      WHERE username= ? LIMIT 1")) {
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('s',$username);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check =hash('sha512',$password . $user_browser);
 
                if ($login_check == $login_string) {
					
					
                    // Logged In!!!! 
                    return true;
                } else {
									
                    // Not logged in 
                   return false;
                }
            } else {
				
                // Not logged in 
                return false;
            }
        } else {
			
            // Not logged in 
            return false;
        }
    } else {
		
        // Not logged in 
        return false;
    }
}
function sanitize($data)//Clean the html input 
		{
			$data=trim($data);
			$data=htmlspecialchars($data);
			return $data;
		}

