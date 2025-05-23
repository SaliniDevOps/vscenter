<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Booking Service</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>
    <div class="main-container">
        <div class="left-container">
            <div class="background-image"></div>

            <div class="main-title-content">
                <div class="logo-container">
                    <a href="#" class="logo">AutoHub Service Center</a>
                    <br>
                    <a href="#" class="logo">Service Booking</a>
                </div>
            </div>
        </div>

        <div class="right-container">
            <div class="service-booking-content">
                <form action="">
                    <div class="title">
                        <h2>Booking Here</h2>
                    </div>
                    <div class="inputbox">
                        <input type="text" placeholder="Name">
                        <i class="ri-file-user-fill"></i>
                    </div>
                    <div class="inputbox">
                        <input type="text" placeholder="NIC">
                        <i class="ri-profile-line"></i>
                    </div>
                    <div class="inputbox">
                        <input type="email" placeholder="Email Address">
                        <i class="ri-mail-fill"></i>
                    </div>
                    <div class="inputbox">
                        <input type="text" placeholder="Vehicle Number">
                        <i class="ri-roadster-fill"></i>
                    </div>
                    <div class="inputbox">
                        <input type="time" placeholder="Time">
                        <i class="ri-time-fill"></i>
                    </div>

                    <!-- Additional inputboxes -->
                    <div class="inputbox">
                        <select>
                            <option value="" disabled selected>Select Service You Want</option>
                            <option value="oil-change">Oil Change</option>
                            <option value="tire-replacement">Tire Replacement</option>
                            <option value="brake-service">Brake Service</option>
                        </select>
                        <i class="ri-tools-fill"></i>
                    </div>
                    <div class="inputbox">
                        <select>
                            <option value="" disabled selected>Select Type</option>
                            <option value="basic">Basic</option>
                            <option value="standard">Standard</option>
                            <option value="premium">Premium</option>
                        </select>
                        <i class="ri-settings-2-fill"></i>
                    </div>
                    <div class="inputbox">
                        <textarea placeholder="Comment" rows="4"></textarea>
                        <i class="ri-chat-3-fill"></i>
                    </div>
                    
                    <div class="inputbox">
                        <input type="submit" value="Submit">
                    </div>
                </form>
                <div class="signup-content">
                    <p>Already Have Account? <a href="../login/index.html">Log In</a></p>
                </div>
                <div class="home-button-content">
                    <a href=""><i class="ri-home-gear-fill"></i> Home</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

