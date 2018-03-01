<?php
class Flash {

    private $message_type;
    private $message;

    public function __construct() {
        $this->message_type = NULL;
        $this->message = NULL;
    }

    private function assigning_session_values_to_properties($message_type) {
        $this->message_type = $message_type;
        $this->message = $_SESSION[$message_type];
        unset($_SESSION[$message_type]);
    }

    public function set_message($message_type, $message) {
        if (!empty($message_type) && !empty($message)) {
            $_SESSION[$message_type] = $message;
        } else {
            return $this->message;
        }
    }

    public function message($message_type) {
        if (isset($_SESSION[$message_type])) {
            $this->assigning_session_values_to_properties($message_type);
            return $this->message;
        } else if ($this->message_type === $message_type) {
            return $this->message;
        }
    }
}

$flash = new Flash;
?>