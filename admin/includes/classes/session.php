<?php
class Session {

    private $signed_in = FALSE;
    private $flash_message_type;
    private $flash_message;
    public $user_id;
    public $user_first_name;

    public function __construct() {
        session_start();
        $this->check_the_login();
    }

    public function login($user) {
        if ($user) {
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->user_first_name = $_SESSION['user_first_name'] = $user->first_name;
            $this->signed_in = TRUE;
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_first_name']);
        unset($this->user_id);
        unset($this->user_first_name);
        $this->signed_in = FALSE;
    }

    public function is_signed_in() {
        return $this->signed_in;
    }

    public function set_flash_message($message_type, $message = '') {
        if (!empty($message_type) && !empty($message)) {
            $_SESSION[$message_type] = $message;
        } else {
            return $this->flash_message;
        }
    }

    public function flash_message($message_type) {
        if (isset($_SESSION[$message_type])) {
            $this->flash_message_type = $message_type;
            $this->flash_message = $_SESSION[$message_type];
            unset($_SESSION[$message_type]);
        } else if ($this->flash_message_type === $message_type) {
            return $this->flash_message;
        } else {
            $this->flash_message_type = '';
            $this->flash_message = '';
        }
        return $this->flash_message;
    }

    private function check_the_login() {
        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->user_first_name = $_SESSION['user_first_name'];
            $this->signed_in = TRUE;
        } else {
            unset($this->user_id);
            unset($this->user_first_name);
            $this->signed_in = FALSE;
        }
    }
}

$session = new Session();
?>