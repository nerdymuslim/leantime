<?php
namespace leantime\domain\controllers {

    use leantime\core;
    use leantime\domain\repositories;

    class loginInfo
    {

        public function run()
        {

            $login = new core\login(core\session::getSID());

            if ($login->logged_in() === true) {

                $user = new repositories\users();

                $profilePicture = $user->getProfilePicture($_SESSION['userdata']['id']);

                $tpl = new core\template();

                $user = $user->getUser($_SESSION['userdata']['id']);

                $availableModals = array(
                    "tickets/showAll" => "backlog",
                    "dashboard/show" => "dashboard",
                    "leancanvas/showCanvas" => "fullLeanCanvas",
                    "leancanvas/simpleCanvas" => "simpleLeanCanvas",
                    "ideas/showBoards" => "ideaBoard",
                    "ideas/advancedBoards" => "advancedBoards",
                    "tickets/roadmap" => "roadmap",
                    "retrospectives/showBoards" => "retrospectives",
                    "tickets/showKanban" => "kanban",
                    "timesheets/showMy" => "mytimesheets",
                    "projects/newProject" => "newProject",
                    "projects/showProject" => "projectSuccess",
                    "projects/showAll" => "showProjects",
                    "clients/showAll" => "showClients",
                );

                $url = $_SERVER['REQUEST_URI'];
                $urlParts = explode('/', $url);
                $modal = "";

                if(count($urlParts) > 2) {
                    $urlKey =  $urlParts[1]."/".$urlParts[2];

                    if(isset($availableModals[$urlKey])) {
                        $modal = $availableModals[$urlKey];
                    }else{
                        $modal = "notfound";
                    }
                }else{
                    $modal = "dashboard";
                }

                $tpl->assign("modal", $modal);


                $tpl->assign("profilePicture", $profilePicture);
                $tpl->assign("userName", $user["firstname"]);
                $tpl->assign("userEmail", $user["username"]);
                $tpl->assign("profileId", $user["profileId"]);


                $tpl->displayPartial("general.loginInfo");


            }
        }
    }
}
