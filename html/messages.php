<!DOCTYPE html>
<html lang="en">

<?PHP
session_start();
include("../security.php");
require("../conn.php");
require("components/a_header.php");
require("components/head.php");
?>
<head>
    <style>
        #sidebar {
            width: 350px;
            min-height: 73vh;
            position: relative;
        }
        #content {
            width: 100%;
            min-height: 73vh;
            transition: all 0.3s;
        }
        @media (max-width: 767px) {
            #sidebar{
                display: none;
                position: absolute;
            }
        }
    </style>
</head>

<body class="bg-secondary bg-opacity-75">
    <!-- ---------------------------------------PRODUCT LIST--------------------------- -->
            <div class="container-fluid py-2 rounded" style="font-size: clamp(75%,2vw,100%);">
                <div class="d-flex">
                    <!-- Sidebar -->
                    <div id="sidebar" class="bg-white p-3 border-end rounded shadow-sm">
                        <div class="d-flex align-items-center">
                            <h4 class="mb-0">Messages</h4>
                            <a type="button" id="exitToggler" class="ms-auto text-dark d-md-none"><i class="bi bi-x-circle fs-4 me-2"></i></a>
                        </div>
                        <hr>
                        <!-- Add your sidebar content here -->
                        <ul class="list-unstyled">
                            <?PHP
                            $cuslist = $conn->query("SELECT * FROM tblaccount where fldposition = 'customer'");
                            if(empty($_SESSION["sent_to"])){
                                $firstCus = $conn->query("SELECT * FROM tblaccount where fldposition = 'customer' LIMIT 1");
                                $first = $firstCus->fetch_assoc();
                                $_SESSION["sent_to"] = $first["fldname"];    
                            }


                            while ($row = $cuslist->fetch_assoc()) {
                                echo "
                                <div>
                                    <a href='messaging/message_adm.php?sent_to=$row[fldname]' 
                                       target='messageCon' 
                                       id='userCon' 
                                       class='d-flex p-3 mb-2 rounded border text-decoration-none text-dark' 
                                       data-name='$row[fldname]'>
                                        <li class='me-2 rounded-circle border' style='width: 50px; height: 50px;'></li>
                                        <li class='flex-grow-1 align-self-center'>$row[fldname]</li>
                                    </a>
                                </div>
                                ";
                            }
                            
                            ?>
                        </ul>
                    </div>

                    <!-- Main Content -->
                     <div class="p-3 mx-2 rounded bg-white shadow-sm" style="height: 100%; width: 100%;">
                        <div class="d-flex d-md-none fs-6 ms-auto me-2">
                            <a type="button" id="toggler" class="text-dark"><i class="bi bi-list me-2"></i></a>
                            <h5 id="nameCon"><?PHP echo $_SESSION["sent_to"] ?></h5>
                        </div>
                        <iframe src="messaging/message_adm.php?sent_to=<?PHP echo $_SESSION["sent_to"] ?> " name="messageCon" id="content"></iframe>
                     </div>
                </div>
            </div>
            <script>
    var toggleUsers = document.getElementById("toggler");
    var exitToggleUsers = document.getElementById("exitToggler");
    var sidebarCon = document.getElementById("sidebar");
    var nameCon = document.getElementById("nameCon");
    var userLinks = document.querySelectorAll("#userCon");

    // Update nameCon dynamically
    userLinks.forEach(function (userLink) {
        userLink.onclick = function () {
            var name = this.getAttribute("data-name");
            nameCon.innerHTML = name;
        };
    });

    // Sidebar toggling logic
    exitToggleUsers.onclick = function () {
        sidebarCon.style.display = "none";
    };
    toggleUsers.onclick = function () {
        if (sidebarCon.style.display !== "block") {
            sidebarCon.style.display = "block";
            sidebarCon.style.width = "75%";
        } else {
            sidebarCon.style.display = "none";
        }
    };

    // Adjust sidebar styles based on screen width
    function updateSidebarStyle() {
        if (window.innerWidth > 767) {
            // Apply styles for larger screens
            sidebarCon.style.display = "block";
            sidebarCon.style.width = "350px";
            sidebarCon.style.position = "relative";
        } else {
            // Reset styles for smaller screens
            sidebarCon.style.display = "none"; // Default behavior for smaller screens
            sidebarCon.style.width = "75%";
            sidebarCon.style.position = "absolute";
        }
    }

    // Listen for resize events and apply the styles
    window.addEventListener("resize", updateSidebarStyle);

    // Initialize styles on page load
    updateSidebarStyle();
</script>

</body>
</html>