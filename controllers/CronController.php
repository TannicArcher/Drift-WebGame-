<?php

/**
 *
 */
class CronController
{

    public $config;

    function __construct ()
    {
        $this->config = Settings::getSettings();
    }

    public function actionLeaders ()
    {

        $time = time();

        $users = array();

        $leads_comps = Competition::leadersGetCompetitions($time);

        if (count($leads_comps) == 0)
            return;

        foreach ($leads_comps as $comp) {
            $need_time = $time - $comp['term'] * 60 * 60 * 24;

            $users[$comp['name']] = User::getLeaders($need_time);

            // получаем старых победителей
            $old_winers = User::getOldWiners($comp['name']);

            if (count($old_winers) > 0) {

                // дёргаем им баланс
                foreach ($old_winers as $winer) {

                    if ($winer['lastupdate'] != $time) {
                        User::updateBalances($winer);

                        User::updateLastUpdate($time, $winer['id']);
                    }

                    // Обнуляем множитель
                    User::setLeaderMultiply($winer['id'], $comp['name'], 0);

                }

            }

            if (count($users[$comp['name']]) > 0) {

                // дёргаем баланс новым победителям
                foreach ($users[$comp['name']] as $winer) {

                    if ($winer['lastupdate'] != $time) {
                        User::updateBalances($winer);

                        User::updateLastUpdate($time, $winer['id']);
                    }

                    // Устанавливаем множитель
                    User::setLeaderMultiply($winer['id'], $comp['name'], $comp[$winer['place'] . 'm']);

                }
            }

            // Устанавливаем дату следущего окончания периода гонки
            Competition::leadersSetNewDate($comp['name'], ($time + $comp['term'] * 60 * 60 * 24));

        }

    }

    public function actionLottery ()
    {

        $time = time();
        $users = intval(Competition::lotteryGetUsersCount());
        $curr_lot_users = Competition::lotteryGetCurrentUsers();
        $lottery_info   = Competition::lotteryGetConfig();

        if ($time >= ($lottery_info['date_update']-300)) {
            $lott_term = $lottery_info['lott_term'];
            $date_start = time() - (3600 * $lott_term);
            Competition::lotterySetNewDate(strtotime("+$lott_term hour"));

            if ($users !== 0) {
                $win_lott  = mt_rand(1, $users);
                $win_user  = $curr_lot_users[$win_lott - 1];
                $user_data = User::getDataById($win_user['user_id']);

                $plan = Deposit::getPlan(intval($lottery_info['lott_item']));
                Deposit::doDeposit($user_data, $plan);

                Competition::lotteryAddRaffle($lottery_info['lott_item'], Competition::lotteryGetLotInfo(), $win_user['user_id'], $win_user['user'], $users, $date_start, $lottery_info['date_update']);
                Competition::lotteryDeleteUsersInRaffle();
            } else {
                Competition::lotteryAddRaffle($lottery_info['lott_item'], Competition::lotteryGetLotInfo(), 0, "---", $users, $date_start, time());
            }

        }

    }

    public function actionFakeInserts ()
    {
        Fake::actionInsert();
    }

    public function actionFakePayments ()
    {
        Fake::actionPayment();
    }

    public function actionFakeReg ()
    {
        Fake::actionReg();
    }
}
