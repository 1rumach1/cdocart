<?PHP
session_start();
require_once("../../conn.php");

// Sanitize session variables
$username = htmlspecialchars($_SESSION['name']);
$userPosition = htmlspecialchars($_SESSION['position']);
$sent_to = htmlspecialchars($_GET['sent_to']);
if($sent_to){
    $_SESSION["sent_to"] = $sent_to;
}else{
    $_SESSION["sent_to"] = $_SESSION["sent_to"];
}

// Prepare the query using parameterized statement
$stmt = $conn->prepare("SELECT * FROM messages WHERE username = '$_GET[sent_to]' OR sent_to='$_GET[sent_to]' ORDER BY created_at ASC");
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Secure chat interface for customer support">
        <title>Chat Interface</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
        <!-- Scripts with SRI hashes -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <style>
            html, body {
                height: 100vh;
                margin: 0;
                padding: 0;
                overflow: hidden;
                font-size: 12px;
            }
            
            .chat-wrapper {
                height: 85%;
                display: flex;
                flex-direction: column;
            }

            .messages-container {
                flex: 1;
                overflow-y: auto;
                padding: 1rem;
            }

            .message-input-container {
                padding: 1rem;
                background-color: #f8f9fa;
                border-top: 1px solid #dee2e6;
            }
        </style>
    </head>
    <body>
        <h2 class="d-none d-sm-inline"><?PHP echo $sent_to?></h2>
        <hr>
        <div class="chat-wrapper">
            <!-- Messages Container -->
            <div class="messages-container" id="chatContainer">
                <div class="message_holder" role="log" aria-live="polite">
                <?php
                while ($row = $result->fetch_assoc()) {
                    $isCurrentUser = $row["position"] === "admin";
                    $color = $isCurrentUser ? "bg-primary text-white rounded-3" : "bg-secondary text-white rounded-3";
                    $position = $isCurrentUser ? "me-2 ms-auto text-end" : "ms-2 me-auto text-start";
                    $messageStyle = "max-width: 70%";
                    $containerStyle = $isCurrentUser ? "d-flex flex-column align-items-end mb-3" : "d-flex flex-column align-items-start mb-3";
                    
                    echo '<div class="' . $containerStyle . '">';
                    echo '  <div class="message-item p-2 px-3 text-break ' . $color . '" style="' . $messageStyle . '">';
                    echo '      <span class="d-inline-block">' . htmlspecialchars($row['message']) . '</span>';
                    echo '  </div>';
                    echo '  <small class="text-muted ' . $position . '" title="' . htmlspecialchars($row['created_at']) . '">' . 
                            date('h:i A', strtotime($row['created_at'])) . 
                         '</small>';
                    echo '</div>';
                }
                ?>
                </div>
            </div>

            <!-- Input Container -->
            <div class="message-input-container">
                <form id="messageForm" action="process.php" method="post" class="d-flex gap-2">
                    <input type="text" 
                        id="messageInput"
                        placeholder="Type a message..." 
                        name="message" 
                        class="form-control" 
                        required
                        maxlength="1000"
                        autocomplete="off">
                    <input type="hidden" name="sent_to" value="<?PHP echo isset($_GET["sent_to"])? $_GET['sent_to'] : "admin" ?>">
                    <button type="submit" class="btn btn-primary px-3" id="sendButton"><i class="ri-send-plane-2-fill"></i></button>
                </form>
            </div>
        </div> 
    </body>
    <script>
        // Configuration
        const CONFIG = {
            PUSHER_APP_KEY: 'e9e315430e211d373294',
            PUSHER_CLUSTER: 'ap1',
            MAX_MESSAGE_LENGTH: 1000,
            SCROLL_THRESHOLD: 50,
            DEBOUNCE_DELAY: 300
        };

        // Current user info
        const CURRENT_USER = {
            position: '<?php echo addslashes($userPosition); ?>',
            username: '<?php echo addslashes($username); ?>',
            sent_to: '<?php echo addslashes($sent_to); ?>'
        };

        // Initialize Pusher
        const pusher = new Pusher(CONFIG.PUSHER_APP_KEY, {
            cluster: CONFIG.PUSHER_CLUSTER
        });

        // DOM Elements
        const elements = {
            chatContainer: document.getElementById('chatContainer'),
            messageForm: document.getElementById('messageForm'),
            messageInput: document.getElementById('messageInput'),
            sendButton: document.getElementById('sendButton'),
            messageHolder: document.querySelector('.message_holder')
        };

        // State management
        let state = {
            isUserScrolling: false,
            lastMessageTime: new Date()
        };

        // Utility functions
        const utils = {
            escapeHtml: (unsafe) => {
                return unsafe
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#039;");
            },
            
            debounce: (func, wait) => {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            },

            formatTime: (dateString) => {
                return new Date(dateString).toLocaleTimeString('en-US', {
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: true
                });
            },

        };

        // Message handling
        const messageHandler = {
            createMessageElement: (data) => {
                const isCurrentUser = data.username === CURRENT_USER.username;
                const color = isCurrentUser ? "bg-primary text-white rounded-3" : "bg-secondary text-white rounded-3";
                const position = isCurrentUser ? "me-2 ms-auto text-end" : "ms-2 me-auto text-start";
                const containerStyle = isCurrentUser ? "d-flex flex-column align-items-end mb-3" : "d-flex flex-column align-items-start mb-3";
                
                return `
                    <div class="${containerStyle}">
                        <div class="message-item p-2 px-3 text-break ${color}" style="max-width: 70%">
                            <span class="d-inline-block">${utils.escapeHtml(data.message)}</span>
                        </div>
                        <small class="text-muted ${position}" title="${data.created_at}">
                            ${utils.formatTime(data.created_at)}
                        </small>
                    </div>
                `;
            },

            
            addMessage: (data) => {
                // Check if the message is intended for the current user or sent by the current user
                if ((data.username === CURRENT_USER.username || data.username === CURRENT_USER.sent_to)) {
                    elements.messageHolder.insertAdjacentHTML('beforeend', messageHandler.createMessageElement(data));
                    
                    if (!state.isUserScrolling) {
                        scrollHandler.scrollToBottom();
                    }
                }
            }
        };

        // Scroll handling
        const scrollHandler = {
            scrollToBottom: () => {
                elements.chatContainer.scrollTop = elements.chatContainer.scrollHeight;
                state.isUserScrolling = false;
            },

            handleScroll: utils.debounce(() => {
                const scrollPosition = elements.chatContainer.scrollTop + elements.chatContainer.clientHeight;
                const isNearBottom = (elements.chatContainer.scrollHeight - scrollPosition) < CONFIG.SCROLL_THRESHOLD;
                
                state.isUserScrolling = !isNearBottom;
                
            }, CONFIG.DEBOUNCE_DELAY)
        };

        // Form handling
        const formHandler = {
            handleSubmit: async (e) => {
                e.preventDefault();
                const message = elements.messageInput.value.trim();
                
                if (!message || message.length > CONFIG.MAX_MESSAGE_LENGTH) {
                    return;
                }

                elements.sendButton.disabled = true;
                elements.messageInput.disabled = true;

                try {
                    const response = await fetch('process.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: `message=${encodeURIComponent(message)}`
                    });

                    if (!response.ok) {
                        throw new Error('Message send failed');
                    }

                    elements.messageInput.value = '';
                    scrollHandler.scrollToBottom();
                } catch (error) {
                    console.error('Error sending message:', error);
                    toastr.error('Failed to send message. Please try again.');
                } finally {
                    elements.sendButton.disabled = false;
                    elements.messageInput.disabled = false;
                    elements.messageInput.focus();
                }
            }
        };

        // Initialize application
        const init = () => {
            // Configure toastr
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-bottom-left",
                timeOut: 3000
            };

            // Subscribe to Pusher channel
            const channel = pusher.subscribe('timely-bath-36');
            channel.bind('add_message', messageHandler.addMessage);

            // Event listeners
            elements.messageForm.addEventListener('submit', formHandler.handleSubmit);
            elements.chatContainer.addEventListener('scroll', scrollHandler.handleScroll);
            
            // Input validation and character count
            elements.messageInput.addEventListener('input', (e) => {
                const remainingChars = CONFIG.MAX_MESSAGE_LENGTH - e.target.value.length;
                if (remainingChars < 0) {
                    e.target.value = e.target.value.slice(0, CONFIG.MAX_MESSAGE_LENGTH);
                }
            });

            // Handle connection status
            pusher.connection.bind('connected', () => {
            });

            pusher.connection.bind('disconnected', () => {
                toastr.warning('Connection lost. Trying to reconnect...');
            });

            pusher.connection.bind('error', (err) => {
                if (err.error.data.code === 4004) {
                    toastr.error('Connection limit reached. Please try again later.');
                } else {
                    toastr.error('Connection error. Please refresh the page.');
                }
            });

            // Initialize message timestamps
            document.querySelectorAll('.message-time').forEach(timeElement => {
                const timestamp = timeElement.getAttribute('data-time');
                timeElement.textContent = utils.formatTime(timestamp);
            });

            // Scroll to bottom on initial load
            scrollHandler.scrollToBottom();

            // Handle window resize
            window.addEventListener('resize', utils.debounce(() => {
                if (!state.isUserScrolling) {
                    scrollHandler.scrollToBottom();
                }
            }, CONFIG.DEBOUNCE_DELAY));
        };

        // Initialize when DOM is ready
        document.addEventListener('DOMContentLoaded', init);
    </script>
</html>