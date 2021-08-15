<?php
class Home{
    function url_index(){
        if(LOGED!=='active'){
            include(Front.'/login.php');
        }else{
            $this->url_dashboard();
        }
    }

    //Define the dashboard location for appropriate user
    function url_dashboard(){
        switch(ROLE){
            case 6:                
                include(_CLIENT.'/index.php');
                break;
            case 1:
                include(_SUPER.'/index.php');
                break;
            case 2:
                echo "Branch Administrator";
                break;
            case 3:
                echo "Head of Department";
                break;
            case 4:
                echo "Department Staff";
                break;
            case 5:
                echo "Head of Organization";
                break;
            default:
                $this->logout();
        }
    }

    function logout(){
        session_destroy();
        include(Front.'/login.php');
    }
}

//route definition for Ticket related routes
class NavigateTicket extends Home{
    //route to access open tickets
    function url_openTicket(){
        switch(ROLE){
            case 6:
                include(_CLIENT.'/ticket-open.php');
                break;
            case 1:
                include(_SUPER.'/ticket-open.php');
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;
            default:
                $this->logout();
        }
    }

    //route to  access active/pending tickets
    function url_activeTicket(){
        switch(ROLE){
            case 6:
                include(_CLIENT.'/ticket-pending.php');
                break;
            case 1:
                include(_SUPER.'/ticket-pending.php');
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;
            default:
                $this->logout();
        }
    }

    //route to  access closed tickets
    function url_closedTicket(){
        switch(ROLE){
            case 6:
                include(_CLIENT.'/ticket-closed.php');
                break;
            case 1:
                include(_SUPER.'/ticket-closed.php');
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;
            default:
                $this->logout();
        }
    }
}

function getter(){
    return $extn = pathinfo($_SERVER['REQUEST_URI']);
}

/*
switch(ROLE){
            case 0:
                break;
            case 1:
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;
            default:
                $this->url_index();
        }
*/
?>