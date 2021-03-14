<?php
if(session::isLogin()):

    session::logout();

    helper::redirect("/login");
endif;
    helper::redirect("/login");
?>