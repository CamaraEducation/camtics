<?php
class Home{
    function url_index(){
        if(LOGED=='nil'){
            include(Front.'/login.php');
        }else{
            $this->url_dashboard();
        }
    }

    //Define the dashboard location for appropriate user
    function url_dashboard(){
        switch(ROLE){
            case 0:
                include(Department.'/department.php');
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
                $this->url_index();
        }
    }

    function logout(){
        session_destroy();
        $this->url_index();
    }
}

class NavigateTicket extends Home{
    function url_openTicket(){
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

    }
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