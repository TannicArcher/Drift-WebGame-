<?php

class Paginator
{

    private function ParseURLNavigation ($str, $page)
    {

        $array_a = array("/page/{$page}/", "/page/{$page}", "#");

        return str_replace($array_a, "", $str);

    }

    public function getQuery ($module, $num_page, $on_page, $sort = false, $usid = 0)
    {
        $lim = ($num_page - 1) * $on_page;

        if ($sort)
            $sort = $this->getSort($module, $sort);

        switch ($module) {
            case 'AdminSerfing':
                return "SELECT db_serfing_plans.*, db_serfing.* FROM db_serfing LEFT JOIN db_serfing_plans ON db_serfing.plan = db_serfing_plans.id WHERE db_serfing.status > 0 ORDER BY db_serfing.id DESC LIMIT " . $lim . ", " . $on_page;
                break;
            case 'AdminSerfingnew':
                return "SELECT db_serfing_plans.*, db_serfing.* FROM db_serfing LEFT JOIN db_serfing_plans ON db_serfing.plan = db_serfing_plans.id WHERE db_serfing.status = 0 ORDER BY db_serfing.id DESC LIMIT " . $lim . ", " . $on_page;
                break;
            case 'MainFeedback':
                return "SELECT * FROM db_feedback WHERE status = 1 ORDER BY id DESC LIMIT " . $lim . ", " . $on_page;
                break;
            case 'AdminFeedbacknew':
                return "SELECT * FROM db_feedback WHERE status = 0 ORDER BY id DESC LIMIT " . $lim . ", " . $on_page;
                break;
            case 'AdminInserts':
                return "SELECT * FROM db_insert WHERE status = 1 ORDER BY date_add DESC LIMIT " . $lim . ", " . $on_page;
                break;
            case 'AdminPayments':
                return "SELECT * FROM db_payment WHERE status = 1 ORDER BY date_add DESC LIMIT " . $lim . ", " . $on_page;
                break;
            case 'AdminDeposits':
                return "SELECT db_plans.*, db_deposits.* FROM db_deposits LEFT JOIN db_plans ON db_deposits.plan = db_plans.id ORDER BY db_deposits.date_add DESC LIMIT " . $lim . ", " . $on_page;
                break;
            case 'AdminUsers':
                return "SELECT *, INET_NTOA(ip) uip, (users_002.money_b) money_b, (users_002.money_p) money_p, (users_002.money_r) money_r, (users_002.money_k) money_k, (SELECT SUM(db_plans.perc) FROM db_deposits LEFT JOIN db_plans ON db_deposits.plan = db_plans.id WHERE db_deposits.user_id = users_001.id) speed FROM users_001 LEFT JOIN users_002 ON users_002.id = users_001.id WHERE users_001.id = users_002.id ORDER BY " . $sort . " DESC LIMIT " . $lim . ", " . $on_page;
                break;

        }
    }

    public function getPagination ($module, $num_page, $on_page, $sort = false, $usid = 0)
    {

        $db = Db::getConnection();

        switch ($module) {
            case 'AdminSerfing':
                $sql     = 'SELECT COUNT(*) FROM db_serfing WHERE status > 0';
                $result  = $db->prepare($sql);
                $format  = '/admin/serfing/';
                $isAdmin = true;
                break;
            case 'AdminSerfingnew':
                $sql     = 'SELECT COUNT(*) FROM db_serfing WHERE status = 0';
                $result  = $db->prepare($sql);
                $format  = '/admin/serfing/new/';
                $isAdmin = true;
                break;
            case 'MainFeedback':
                $sql    = 'SELECT COUNT(*) FROM db_feedback WHERE status = 1';
                $result = $db->prepare($sql);
                $format = '/reviews/';
                break;
            case 'AdminFeedback':
                $sql     = 'SELECT COUNT(*) FROM db_feedback WHERE status = 1';
                $result  = $db->prepare($sql);
                $format  = '/admin/feedback/';
                $isAdmin = true;
                break;
            case 'AdminFeedbacknew':
                $sql     = 'SELECT COUNT(*) FROM db_feedback WHERE status = 0';
                $result  = $db->prepare($sql);
                $format  = '/admin/feedback/new/';
                $isAdmin = true;
                break;
            case 'AdminInserts':
                $sql     = 'SELECT COUNT(*) FROM db_insert WHERE status = 1';
                $result  = $db->prepare($sql);
                $format  = '/admin/inserts/';
                $isAdmin = true;
                break;
            case 'AdminPayments':
                $sql     = 'SELECT COUNT(*) FROM db_payment WHERE status = 1';
                $result  = $db->prepare($sql);
                $format  = '/admin/payments/';
                $isAdmin = true;
                break;
            case 'AdminDeposits':
                $sql     = 'SELECT COUNT(*) FROM db_deposits';
                $result  = $db->prepare($sql);
                $format  = '/admin/deposits/';
                $isAdmin = true;
                break;
            case 'AdminUsers':
                $sql     = 'SELECT COUNT(*) FROM users_002';
                $result  = $db->prepare($sql);
                $format  = '/admin/users/' . $sort . '/';
                $isAdmin = true;
                break;

        }

        $result->execute();

        $all_pages = $result->fetchColumn();

        if ($isAdmin) {
            if ($all_pages > $on_page)
                return '<nav><ul class="pagination">' . $this->Navigation(10, $num_page, ceil($all_pages / $on_page), $format) . '</ul></nav>';
        } else {
            if ($all_pages > $on_page)
                return '<ul class="pagination">' . $this->Navigation(10, $num_page, ceil($all_pages / $on_page), $format) . '</ul>';
        }

    }

    private function getSort ($module, $sort)
    {

        switch ($module) {

            case 'AdminUsers':
                switch ($sort) {
                    case 1:
                        return 'users_001.user';
                        break;
                    case 'id':
                        return 'users_001.id';
                        break;
                    case 'b':
                        return 'users_002.money_b';
                        break;
                    case 'p':
                        return 'users_002.money_p';
                        break;
                    case 'r':
                        return 'users_002.money_r';
                        break;
                    case 'k':
                        return 'users_002.money_k';
                        break;
                    case 5:
                        return 'users_001.date_reg';
                        break;
                    case 6:
                        return 'users_001.ip';
                        break;

                }
                break;

        }
    }

    public function issetPage ($module, $on_page, $page, $usid = 0)
    {

        $db = Db::getConnection();

        switch ($module) {

            case 'AdminSerfing':
                $sql    = 'SELECT COUNT(*) FROM db_serfing WHERE status > 0';
                $result = $db->prepare($sql);
                break;
            case 'AdminSerfingnew':
                $sql    = 'SELECT COUNT(*) FROM db_serfing WHERE status = 0';
                $result = $db->prepare($sql);
                break;
            case 'MainFeedback':
                $sql    = 'SELECT COUNT(*) FROM db_feedback WHERE status = 1';
                $result = $db->prepare($sql);
                break;
            case 'AdminFeedback':
                $sql    = 'SELECT COUNT(*) FROM db_feedback WHERE status = 1';
                $result = $db->prepare($sql);
                break;
            case 'AdminFeedbacknew':
                $sql    = 'SELECT COUNT(*) FROM db_feedback WHERE status = 0';
                $result = $db->prepare($sql);
                break;
            case 'AdminInserts':
                $sql    = 'SELECT COUNT(*) FROM db_insert WHERE status = 1 AND type = 2';
                $result = $db->prepare($sql);
                break;
            case 'AdminPayments':
                $sql    = 'SELECT COUNT(*) FROM db_payment WHERE status = 1';
                $result = $db->prepare($sql);
                break;
            case 'AdminDeposits':
                $sql    = 'SELECT COUNT(*) FROM db_deposits';
                $result = $db->prepare($sql);
                break;
            case 'AdminUsers':
                $sql    = 'SELECT COUNT(*) FROM users_002';
                $result = $db->prepare($sql);
                break;

        }

        $result->execute();

        if (($page - 1) * $on_page > $result->fetchColumn())
            return 1;

        return $page;
    }

    function Navigation ($max, $page, $AllPages, $strURI)
    {

        $strReturn = "";
        $left      = false;
        $right     = false;

        $strURI = $this->ParseURLNavigation($strURI, $page);

        $page = (intval($page) > 0) ? intval($page) : 1;

        if ($AllPages <= $max) {

            for ($i = 1; $i <= $AllPages; $i++) {

                if ($i == $page) {

                    $strReturn .= '<li class="page-item active"><a class="page-link" href="' . $strURI . $i . '">' . $page . '</a></li>';

                } else $strReturn .= '<li class="page-item"><a class="page-link" href="' . $strURI . $i . '">' . $i . '</a> ';

            }

        } else {

            for ($i = 1; $i <= $AllPages; $i++) {

                if ($i == $page OR ($i == $page - 1) OR ($i == $page - 2) OR ($i == $page - 3) OR ($i == $page - 4) OR ($i == $page + 1) OR
                    ($i == $page + 2) OR ($i == $page + 3) OR ($i == $page + 4)) {

                    if ($i == $page) {

                        $strReturn .= '<li class="page-item active"><a class="page-link" href="' . $strURI . $i . '">' . $page . '</a></li>';

                    } else {

                        $strReturn .= '<li class="page-item"><a class="page-link" href="' . $strURI . $i . '">' . $i . '</a> </li>';

                    }

                } else {

                    if ($i > $page) {

                        if (!$right) {

                            if ($page <= $AllPages - 6) {

                                $strReturn .= " <li class='page-item'><a class='page-link' href=\"#\">...</a></li> <li class='page-item'><a class='page-link' href=\"{$strURI}{$AllPages}\" class='stn'>{$AllPages}</a></li>";
                                $right     = true;

                            } else {

                                $strReturn .= " <li class='page-item'><a class='page-link' href=\"{$strURI}{$AllPages}\" class='stn'>{$AllPages}</a></li>";
                                $right     = true;

                            }

                        }

                    } else {

                        if (!$left) {

                            if ($page > 6) {

                                $strReturn .= "<li class='page-item'><a class='page-link' href=\"{$strURI}1\" class='stn'>1</a></li>  <li class='page-item'><a class='page-link' href=\"#\">...</a></li>";
                                $left      = true;

                            } else {

                                $strReturn .= "<li class='page-item'><a class='page-link' href=\"{$strURI}1\" class='stn'>1</a></li>";
                                $left      = true;

                            }

                        }

                    }

                }

            }

        }

        $left_str  = '<li class="page-item"><a class="page-link" href="' . $strURI . '" aria-label="Previous"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>';
        $right_str = '<li class="page-item"><a class="page-link" href="' . $strURI . ($page + 1) . '" aria-label="Next"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>';

        return $left_str . $strReturn . $right_str;

    }

}
