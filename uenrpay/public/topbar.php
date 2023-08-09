<!-- Top Navigation Bar -->
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>UENR<span>pay</span></h2>
        </div>
        <div class="search--notification--profile">
            <div class="search">
                <input type="text" placeholder="Search receipt..">
                <button><i class="ri-search-2-line"></i></button>
            </div>
            <div class="notification--profile">
                <div class="p">
                <span class="username"><?php echo $_SESSION['name'];  ?></span>
                </div>
                <div class="picon bell">
                    <i class="ri-notification-2-line"></i>
                </div>
                <div class="picon profile">
                    <img src="../private/assets/images/profile.jpg" alt="profile">
                </div>
            </div>
        </div>
    </section>