<?php 
namespace VanguardLTE\Games\AgeOfEgyptPTM
{
    include('CheckReels.php');
    class Server
    {
        public function get($request, $game)
        {/*
            if( config('LicenseDK.APL_INCLUDE_KEY_CONFIG') != 'wi9qydosuimsnls5zoe5q298evkhim0ughx1w16qybs2fhlcpn' ) 
            {
                return false;
            }
            if( md5_file(base_path() . '/config/LicenseDK.php') != '27f30d89977203af2f6822e48707425d' ) 
            {
                return false;
            }
            if( md5_file(base_path() . '/app/Lib/LicenseDK.php') != '22dde427cc10243ac0c7a3a625518e6f' ) 
            {
                return false;
            }
            $checked = new \VanguardLTE\Lib\LicenseDK();
            $license_notifications_array = $checked->aplVerifyLicenseDK(null, 0);
            if( $license_notifications_array['notification_case'] != 'notification_license_ok' ) 
            {
                $response = '{"responseEvent":"error","responseType":"error","serverResponse":"Error LicenseDK"}';
                exit( $response );
            } */
            \DB::beginTransaction();
            $userId = \Auth::id();
            if( $userId == null ) 
            {
                $response = '{"responseEvent":"error","responseType":"","serverResponse":"invalid login"}';
                exit( $response );
            }
            $slotSettings = new SlotSettings($game, $userId);
            $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22 = json_decode(trim(file_get_contents('php://input')), true);
            $_obf_0D1713290429323C0B2B02212E103E165B173416383632 = sprintf('%01.2f', $slotSettings->GetBalance()) * 100;
            $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201 = [];
            if( isset($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['umid']) ) 
            {
                $umid = $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['umid'];
                if( isset($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['ID']) ) 
                {
                    $umid = $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['ID'];
                }
            }
            else
            {
                if( isset($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['ID']) ) 
                {
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"ID":18}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"typeBalance":0,"currency":"' . $slotSettings->slotCurrency . '","balanceInCents":' . $_obf_0D1713290429323C0B2B02212E103E165B173416383632 . ',"deltaBalanceInCents":1},"ID":40085}';
                }
                $umid = 0;
            }
            if( isset($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['spinType']) ) 
            {
                $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201 = [];
                if( $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['spinType'] == 'regular' ) 
                {
                    $umid = '0';
                    $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] = 'bet';
                    $bonusMpl = 1;
                    $slotSettings->SetGameData('AgeOfEgyptPTMBonusWin', 0);
                    $slotSettings->SetGameData('AgeOfEgyptPTMFreeGames', 0);
                    $slotSettings->SetGameData('AgeOfEgyptPTMCurrentFreeGame', 0);
                    $slotSettings->SetGameData('AgeOfEgyptPTMTotalWin', 0);
                    $slotSettings->SetGameData('AgeOfEgyptPTMFreeBalance', 0);
                    $slotSettings->SetGameData('AgeOfEgyptPTMFreeStartWin', 0);
                    $chosenTree = 0;
                    $startStick = 0;
                    $treeStep = [
                        -1, 
                        -1, 
                        -1, 
                        -1, 
                        -1
                    ];
                    $_obf_0D5B242A210433153B195C3B2A2903051A26191A1F0B01 = 1;
                    $lastWins = [
                        0, 
                        0, 
                        0, 
                        0, 
                        0
                    ];
                    $slotSettings->SetGameData('AgeOfEgyptPTMChosenTree', $chosenTree);
                    $slotSettings->SetGameData('AgeOfEgyptPTMstartStick', $startStick);
                    $slotSettings->SetGameData('AgeOfEgyptPTMtreeStep', $treeStep);
                    $slotSettings->SetGameData('AgeOfEgyptPTMlastWins', $lastWins);
                }
                else if( $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['spinType'] == 'free' ) 
                {
                    $umid = '0';
                    $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] = 'freespin';
                    $slotSettings->SetGameData('AgeOfEgyptPTMCurrentFreeGame', $slotSettings->GetGameData('AgeOfEgyptPTMCurrentFreeGame') + 1);
                    $bonusMpl = $slotSettings->slotFreeMpl;
                }
                $linesId[0] = [
                    2, 
                    2, 
                    2, 
                    2, 
                    2
                ];
                $linesId[1] = [
                    1, 
                    1, 
                    1, 
                    1, 
                    1
                ];
                $linesId[2] = [
                    3, 
                    3, 
                    3, 
                    3, 
                    3
                ];
                $linesId[3] = [
                    1, 
                    2, 
                    3, 
                    2, 
                    1
                ];
                $linesId[4] = [
                    3, 
                    2, 
                    1, 
                    2, 
                    3
                ];
                $linesId[5] = [
                    2, 
                    1, 
                    1, 
                    1, 
                    2
                ];
                $linesId[6] = [
                    2, 
                    3, 
                    3, 
                    3, 
                    2
                ];
                $linesId[7] = [
                    1, 
                    1, 
                    2, 
                    3, 
                    3
                ];
                $linesId[8] = [
                    3, 
                    3, 
                    2, 
                    1, 
                    1
                ];
                $linesId[9] = [
                    2, 
                    3, 
                    2, 
                    1, 
                    2
                ];
                $linesId[10] = [
                    2, 
                    1, 
                    2, 
                    3, 
                    2
                ];
                $linesId[11] = [
                    1, 
                    2, 
                    2, 
                    2, 
                    1
                ];
                $linesId[12] = [
                    3, 
                    2, 
                    2, 
                    2, 
                    3
                ];
                $linesId[13] = [
                    1, 
                    2, 
                    1, 
                    2, 
                    1
                ];
                $linesId[14] = [
                    3, 
                    2, 
                    3, 
                    2, 
                    3
                ];
                $linesId[15] = [
                    2, 
                    2, 
                    1, 
                    2, 
                    2
                ];
                $linesId[16] = [
                    2, 
                    2, 
                    3, 
                    2, 
                    2
                ];
                $linesId[17] = [
                    1, 
                    1, 
                    3, 
                    1, 
                    1
                ];
                $linesId[18] = [
                    3, 
                    3, 
                    1, 
                    3, 
                    3
                ];
                $linesId[19] = [
                    1, 
                    3, 
                    3, 
                    3, 
                    1
                ];
                $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['bet'] = $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['bet'] / 100;
                for( $i = 0; $i < count($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['lines']); $i++ ) 
                {
                    if( $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['lines'][$i] > 0 ) 
                    {
                        $lines = $i + 1;
                    }
                    else
                    {
                        break;
                    }
                }
                $betLine = $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['bet'] / $lines;
                if( $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] == 'bet' || $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] == 'freespin' || $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] == 'respin' ) 
                {
                    if( $lines <= 0 || $betLine <= 0.0001 ) 
                    {
                        $response = '{"responseEvent":"error","responseType":"' . $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] . '","serverResponse":"invalid bet state"}';
                        exit( $response );
                    }
                    if( $slotSettings->GetBalance() < ($lines * $betLine) ) 
                    {
                        $response = '{"responseEvent":"error","responseType":"' . $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] . '","serverResponse":"invalid balance"}';
                        exit( $response );
                    }
                    if( $slotSettings->GetGameData($slotSettings->slotId . 'FreeGames') < $slotSettings->GetGameData($slotSettings->slotId . 'CurrentFreeGame') && $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] == 'freespin' ) 
                    {
                        $response = '{"responseEvent":"error","responseType":"' . $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] . '","serverResponse":"invalid bonus state"}';
                        exit( $response );
                    }
                }
                if( $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] != 'freespin' ) 
                {
                    if( !isset($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent']) ) 
                    {
                        $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] = 'bet';
                    }
                    $_obf_0D2A0526273612293511363C26193E1C130B2719192611 = $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['bet'] / 100 * $slotSettings->GetPercent();
                    $slotSettings->SetBank((isset($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent']) ? $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] : ''), $_obf_0D2A0526273612293511363C26193E1C130B2719192611, $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent']);
                    $slotSettings->UpdateJackpots($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['bet']);
                    $slotSettings->SetBalance(-1 * $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['bet'], $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent']);
                }
                $_obf_0D360F0140113330275B14311E3516150112390A0F1B22 = $slotSettings->GetSpinSettings($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'], $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['bet'], $lines);
                $winType = $_obf_0D360F0140113330275B14311E3516150112390A0F1B22[0];
                $_obf_0D3030072F273706293C133F2F072B113B383322291201 = $_obf_0D360F0140113330275B14311E3516150112390A0F1B22[1];
                $slotSettings->SetGameData('AgeOfEgyptPTMAllBet', $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['bet']);
                $slotSettings->SetGameData('AgeOfEgyptPTMBetLine', $betLine);
                for( $i = 0; $i <= 2000; $i++ ) 
                {
                    $totalWin = 0;
                    $lineWins = [];
                    $cWins = [
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0
                    ];
                    $wild = ['0'];
                    $_obf_0D0F03101B163816052F05402233211D2611162D305B01 = '9';
                    $scatter = '10';
                    $_obf_0D211F2E30212A2A2B081A2303152D4036262E1D244001 = false;
                    $eggBonusNum = 0;
                    $reels = $slotSettings->GetReelStrips($winType, $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent']);
                    for( $k = 0; $k < $lines; $k++ ) 
                    {
                        $_obf_0D02100911023C3C260E0C262F5B2C1D2839310E112A32 = '';
                        for( $j = 0; $j < count($slotSettings->SymbolGame); $j++ ) 
                        {
                            $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 = $slotSettings->SymbolGame[$j];
                            if( $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 == $scatter || !isset($slotSettings->Paytable['SYM_' . $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11]) ) 
                            {
                            }
                            else
                            {
                                $s = [];
                                $s[0] = $reels['reel1'][$linesId[$k][0] - 1];
                                $s[1] = $reels['reel2'][$linesId[$k][1] - 1];
                                $s[2] = $reels['reel3'][$linesId[$k][2] - 1];
                                $s[3] = $reels['reel4'][$linesId[$k][3] - 1];
                                $s[4] = $reels['reel5'][$linesId[$k][4] - 1];
                                if( $s[0] == $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 || in_array($s[0], $wild) ) 
                                {
                                    $mpl = 1;
                                    $_obf_0D365B172533170712222423300A1B092C161521071B32 = $slotSettings->Paytable['SYM_' . $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11][1] * $betLine * $mpl * $bonusMpl;
                                    if( $cWins[$k] < $_obf_0D365B172533170712222423300A1B092C161521071B32 ) 
                                    {
                                        $cWins[$k] = $_obf_0D365B172533170712222423300A1B092C161521071B32;
                                        $_obf_0D02100911023C3C260E0C262F5B2C1D2839310E112A32 = '{"Count":1,"Line":' . $k . ',"Win":' . $cWins[$k] . ',"stepWin":' . ($cWins[$k] + $totalWin + $slotSettings->GetGameData('AgeOfEgyptPTMBonusWin')) . ',"winReel1":[' . ($linesId[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":["none","none"],"winReel3":["none","none"],"winReel4":["none","none"],"winReel5":["none","none"]}';
                                    }
                                }
                                if( ($s[0] == $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 || in_array($s[0], $wild)) && ($s[1] == $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 || in_array($s[1], $wild)) ) 
                                {
                                    $mpl = 1;
                                    if( in_array($s[0], $wild) && in_array($s[1], $wild) ) 
                                    {
                                        $mpl = 1;
                                    }
                                    else if( in_array($s[0], $wild) || in_array($s[1], $wild) ) 
                                    {
                                        $mpl = $slotSettings->slotWildMpl;
                                    }
                                    $_obf_0D365B172533170712222423300A1B092C161521071B32 = $slotSettings->Paytable['SYM_' . $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11][2] * $betLine * $mpl * $bonusMpl;
                                    if( $cWins[$k] < $_obf_0D365B172533170712222423300A1B092C161521071B32 ) 
                                    {
                                        $cWins[$k] = $_obf_0D365B172533170712222423300A1B092C161521071B32;
                                        $_obf_0D02100911023C3C260E0C262F5B2C1D2839310E112A32 = '{"Count":2,"Line":' . $k . ',"Win":' . $cWins[$k] . ',"stepWin":' . ($cWins[$k] + $totalWin + $slotSettings->GetGameData('AgeOfEgyptPTMBonusWin')) . ',"winReel1":[' . ($linesId[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":[' . ($linesId[$k][1] - 1) . ',"' . $s[1] . '"],"winReel3":["none","none"],"winReel4":["none","none"],"winReel5":["none","none"]}';
                                    }
                                }
                                if( ($s[0] == $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 || in_array($s[0], $wild)) && ($s[1] == $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 || in_array($s[1], $wild)) && ($s[2] == $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 || in_array($s[2], $wild)) ) 
                                {
                                    $mpl = 1;
                                    if( in_array($s[0], $wild) && in_array($s[1], $wild) && in_array($s[2], $wild) ) 
                                    {
                                        $mpl = 1;
                                    }
                                    else if( in_array($s[0], $wild) || in_array($s[1], $wild) || in_array($s[2], $wild) ) 
                                    {
                                        $mpl = $slotSettings->slotWildMpl;
                                    }
                                    $_obf_0D365B172533170712222423300A1B092C161521071B32 = $slotSettings->Paytable['SYM_' . $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11][3] * $betLine * $mpl * $bonusMpl;
                                    if( $cWins[$k] < $_obf_0D365B172533170712222423300A1B092C161521071B32 ) 
                                    {
                                        $cWins[$k] = $_obf_0D365B172533170712222423300A1B092C161521071B32;
                                        $_obf_0D02100911023C3C260E0C262F5B2C1D2839310E112A32 = '{"Count":3,"Line":' . $k . ',"Win":' . $cWins[$k] . ',"stepWin":' . ($cWins[$k] + $totalWin + $slotSettings->GetGameData('AgeOfEgyptPTMBonusWin')) . ',"winReel1":[' . ($linesId[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":[' . ($linesId[$k][1] - 1) . ',"' . $s[1] . '"],"winReel3":[' . ($linesId[$k][2] - 1) . ',"' . $s[2] . '"],"winReel4":["none","none"],"winReel5":["none","none"]}';
                                    }
                                }
                                if( ($s[0] == $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 || in_array($s[0], $wild)) && ($s[1] == $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 || in_array($s[1], $wild)) && ($s[2] == $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 || in_array($s[2], $wild)) && ($s[3] == $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 || in_array($s[3], $wild)) ) 
                                {
                                    $mpl = 1;
                                    if( in_array($s[0], $wild) && in_array($s[1], $wild) && in_array($s[2], $wild) && in_array($s[3], $wild) ) 
                                    {
                                        $mpl = 1;
                                    }
                                    else if( in_array($s[0], $wild) || in_array($s[1], $wild) || in_array($s[2], $wild) || in_array($s[3], $wild) ) 
                                    {
                                        $mpl = $slotSettings->slotWildMpl;
                                    }
                                    $_obf_0D365B172533170712222423300A1B092C161521071B32 = $slotSettings->Paytable['SYM_' . $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11][4] * $betLine * $mpl * $bonusMpl;
                                    if( $cWins[$k] < $_obf_0D365B172533170712222423300A1B092C161521071B32 ) 
                                    {
                                        $cWins[$k] = $_obf_0D365B172533170712222423300A1B092C161521071B32;
                                        $_obf_0D02100911023C3C260E0C262F5B2C1D2839310E112A32 = '{"Count":4,"Line":' . $k . ',"Win":' . $cWins[$k] . ',"stepWin":' . ($cWins[$k] + $totalWin + $slotSettings->GetGameData('AgeOfEgyptPTMBonusWin')) . ',"winReel1":[' . ($linesId[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":[' . ($linesId[$k][1] - 1) . ',"' . $s[1] . '"],"winReel3":[' . ($linesId[$k][2] - 1) . ',"' . $s[2] . '"],"winReel4":[' . ($linesId[$k][3] - 1) . ',"' . $s[3] . '"],"winReel5":["none","none"]}';
                                    }
                                }
                                if( ($s[0] == $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 || in_array($s[0], $wild)) && ($s[1] == $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 || in_array($s[1], $wild)) && ($s[2] == $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 || in_array($s[2], $wild)) && ($s[3] == $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 || in_array($s[3], $wild)) && ($s[4] == $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 || in_array($s[4], $wild)) ) 
                                {
                                    $mpl = 1;
                                    if( in_array($s[0], $wild) && in_array($s[1], $wild) && in_array($s[2], $wild) && in_array($s[3], $wild) && in_array($s[4], $wild) ) 
                                    {
                                        $mpl = 1;
                                    }
                                    else if( in_array($s[0], $wild) || in_array($s[1], $wild) || in_array($s[2], $wild) || in_array($s[3], $wild) || in_array($s[4], $wild) ) 
                                    {
                                        $mpl = $slotSettings->slotWildMpl;
                                    }
                                    $_obf_0D365B172533170712222423300A1B092C161521071B32 = $slotSettings->Paytable['SYM_' . $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11][5] * $betLine * $mpl * $bonusMpl;
                                    if( $cWins[$k] < $_obf_0D365B172533170712222423300A1B092C161521071B32 ) 
                                    {
                                        $cWins[$k] = $_obf_0D365B172533170712222423300A1B092C161521071B32;
                                        $_obf_0D02100911023C3C260E0C262F5B2C1D2839310E112A32 = '{"Count":5,"Line":' . $k . ',"Win":' . $cWins[$k] . ',"stepWin":' . ($cWins[$k] + $totalWin + $slotSettings->GetGameData('AgeOfEgyptPTMBonusWin')) . ',"winReel1":[' . ($linesId[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":[' . ($linesId[$k][1] - 1) . ',"' . $s[1] . '"],"winReel3":[' . ($linesId[$k][2] - 1) . ',"' . $s[2] . '"],"winReel4":[' . ($linesId[$k][3] - 1) . ',"' . $s[3] . '"],"winReel5":[' . ($linesId[$k][4] - 1) . ',"' . $s[4] . '"]}';
                                    }
                                }
                                if( $_obf_0D350901162A195B273D0F282B290A2A0B1811330C0E11 == '9' ) 
                                {
                                    if( $s[0] == $s[1] && $s[1] == $s[2] ) 
                                    {
                                        $_obf_0D211F2E30212A2A2B081A2303152D4036262E1D244001 = true;
                                        $eggBonusNum = 3;
                                    }
                                    if( $s[0] == $s[1] && $s[1] == $s[2] && $s[2] == $s[3] ) 
                                    {
                                        $_obf_0D211F2E30212A2A2B081A2303152D4036262E1D244001 = true;
                                        $eggBonusNum = 4;
                                    }
                                    if( $s[0] == $s[1] && $s[1] == $s[2] && $s[2] == $s[3] && $s[3] == $s[4] ) 
                                    {
                                        $_obf_0D211F2E30212A2A2B081A2303152D4036262E1D244001 = true;
                                        $eggBonusNum = 5;
                                    }
                                }
                            }
                        }
                        if( $cWins[$k] > 0 && $_obf_0D02100911023C3C260E0C262F5B2C1D2839310E112A32 != '' ) 
                        {
                            array_push($lineWins, $_obf_0D02100911023C3C260E0C262F5B2C1D2839310E112A32);
                            $totalWin += $cWins[$k];
                        }
                    }
                    $scattersWin = 0;
                    $_obf_0D5C282514190E21171E5C2A19072A24022B34142A0301 = 0;
                    $scattersStr = '{';
                    $scattersCount = 0;
                    $_obf_0D4032063326312E14292A362E1B3E0B192115063F2322 = 0;
                    for( $r = 1; $r <= 5; $r++ ) 
                    {
                        for( $_obf_0D31403C0837332A1A1711312A3415151610280F122122 = 0; $_obf_0D31403C0837332A1A1711312A3415151610280F122122 <= 3; $_obf_0D31403C0837332A1A1711312A3415151610280F122122++ ) 
                        {
                            if( $reels['reel' . $r][$_obf_0D31403C0837332A1A1711312A3415151610280F122122] == $scatter ) 
                            {
                                $scattersCount++;
                                $scattersStr .= ('"winReel' . $r . '":[' . $_obf_0D31403C0837332A1A1711312A3415151610280F122122 . ',"' . $scatter . '"],');
                            }
                            if( $reels['reel' . $r][$_obf_0D31403C0837332A1A1711312A3415151610280F122122] == $_obf_0D0F03101B163816052F05402233211D2611162D305B01 ) 
                            {
                                $_obf_0D4032063326312E14292A362E1B3E0B192115063F2322++;
                            }
                        }
                    }
                    $scattersWin = $slotSettings->Paytable['SYM_' . $scatter][$scattersCount] * $betLine * $lines * $bonusMpl;
                    $_obf_0D5C282514190E21171E5C2A19072A24022B34142A0301 = $slotSettings->Paytable['SYM_' . $_obf_0D0F03101B163816052F05402233211D2611162D305B01][$_obf_0D4032063326312E14292A362E1B3E0B192115063F2322] * $betLine * $lines * $bonusMpl;
                    if( $scattersCount >= 3 && $slotSettings->slotBonus ) 
                    {
                        $scattersStr .= '"scattersType":"bonus",';
                    }
                    else if( $scattersWin > 0 ) 
                    {
                        $scattersStr .= '"scattersType":"win",';
                    }
                    else
                    {
                        $scattersStr .= '"scattersType":"none",';
                    }
                    $scattersStr .= ('"scattersWin":' . $scattersWin . '}');
                    $totalWin += ($scattersWin + $_obf_0D5C282514190E21171E5C2A19072A24022B34142A0301);
                    if( $i > 1000 ) 
                    {
                        $winType = 'none';
                    }
                    if( $slotSettings->increaseRTP && $winType == 'win' && $totalWin < ($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['bet'] * rand(2, 5)) ) 
                    {
                    }
                    else if( !$slotSettings->increaseRTP && $winType == 'win' && $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['bet'] < $totalWin ) 
                    {
                    }
                    else
                    {
                        if( $i > 1500 ) 
                        {
                            $response = '{"responseEvent":"error","responseType":"' . $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] . '","serverResponse":"Bad Reel Strip"}';
                            return $response;
                        }
                        if( ($scattersCount >= 3 || $_obf_0D211F2E30212A2A2B081A2303152D4036262E1D244001) && $winType != 'bonus' ) 
                        {
                        }
                        else if( $totalWin <= $_obf_0D3030072F273706293C133F2F072B113B383322291201 && $winType == 'bonus' ) 
                        {
                            $_obf_0D195C0F2915230B5C17342A08251204342D3C1F024001 = $slotSettings->GetBank((isset($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent']) ? $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] : ''));
                            if( $_obf_0D195C0F2915230B5C17342A08251204342D3C1F024001 < $_obf_0D3030072F273706293C133F2F072B113B383322291201 ) 
                            {
                                $_obf_0D3030072F273706293C133F2F072B113B383322291201 = $_obf_0D195C0F2915230B5C17342A08251204342D3C1F024001;
                            }
                            else
                            {
                                break;
                            }
                        }
                        else if( $totalWin > 0 && $totalWin <= $_obf_0D3030072F273706293C133F2F072B113B383322291201 && $winType == 'win' ) 
                        {
                            $_obf_0D195C0F2915230B5C17342A08251204342D3C1F024001 = $slotSettings->GetBank((isset($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent']) ? $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] : ''));
                            if( $_obf_0D195C0F2915230B5C17342A08251204342D3C1F024001 < $_obf_0D3030072F273706293C133F2F072B113B383322291201 ) 
                            {
                                $_obf_0D3030072F273706293C133F2F072B113B383322291201 = $_obf_0D195C0F2915230B5C17342A08251204342D3C1F024001;
                            }
                            else
                            {
                                break;
                            }
                        }
                        else if( $totalWin == 0 && $winType == 'none' ) 
                        {
                            break;
                        }
                    }
                }
                if( $totalWin > 0 ) 
                {
                    $slotSettings->SetBank((isset($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent']) ? $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] : ''), -1 * $totalWin);
                    $slotSettings->SetBalance($totalWin);
                }
                $_obf_0D0C361D2E35362209025C2317232809271D34270D3232 = $totalWin;
                if( $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] == 'freespin' ) 
                {
                    $slotSettings->SetGameData('AgeOfEgyptPTMBonusWin', $slotSettings->GetGameData('AgeOfEgyptPTMBonusWin') + $totalWin);
                    $slotSettings->SetGameData('AgeOfEgyptPTMTotalWin', $totalWin);
                }
                else
                {
                    $slotSettings->SetGameData('AgeOfEgyptPTMTotalWin', $totalWin);
                }
                if( $scattersCount >= 3 ) 
                {
                    if( $slotSettings->GetGameData('AgeOfEgyptPTMFreeGames') > 0 ) 
                    {
                        $slotSettings->SetGameData('AgeOfEgyptPTMFreeGames', $slotSettings->GetGameData('AgeOfEgyptPTMFreeGames') + $slotSettings->slotFreeCount);
                    }
                    else
                    {
                        $slotSettings->SetGameData('AgeOfEgyptPTMFreeStartWin', $totalWin);
                        $slotSettings->SetGameData('AgeOfEgyptPTMBonusWin', 0);
                        $slotSettings->SetGameData('AgeOfEgyptPTMFreeGames', $slotSettings->slotFreeCount);
                    }
                }
                $_obf_0D0714245B2417292334031F051A36231C2F0802371622 = '"winValues":[0,0,0,0,0],"eggBonusNum":' . $eggBonusNum . ',"PickedCount":0,"PickedCountArr":[],';
                $_obf_0D1713290429323C0B2B02212E103E165B173416383632 = sprintf('%01.2f', $slotSettings->GetBalance()) * 100;
                $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"credit":' . $_obf_0D1713290429323C0B2B02212E103E165B173416383632 . ',"results":[' . implode(',', $reels['rp']) . '],"windowId":"Adbmao"},"ID":40022,"umid":35}';
                $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"typeBalance":0,"currency":"' . $slotSettings->slotCurrency . '","balanceInCents":' . $_obf_0D1713290429323C0B2B02212E103E165B173416383632 . ',"deltaBalanceInCents":1},"ID":40085}';
                $_obf_0D273522403840350F0A36072E150A0524143F382C3B32 = '' . json_encode($reels) . '';
                $_obf_0D28393910101E062539311B3F371C121912162B061E32 = '' . json_encode($slotSettings->Jackpots) . '';
                $_obf_0D5B5C2E0D1C3D1F232F3E051D3225380127293C2A2432 = implode(',', $lineWins);
                if( $_obf_0D211F2E30212A2A2B081A2303152D4036262E1D244001 ) 
                {
                    $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] = 'egg_bonus';
                    $_obf_0D1B2B063D1C283C0136243D2716223D30162D05260732 = $slotSettings->EggBonus($betLine, $eggBonusNum);
                    $_obf_0D0714245B2417292334031F051A36231C2F0802371622 = '"winValues":[' . implode(',', $_obf_0D1B2B063D1C283C0136243D2716223D30162D05260732['curValues']) . '],"eggBonusNum":' . $eggBonusNum . ',"PickedCount":0,"PickedCountArr":[],';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"winValues":[' . implode(',', $_obf_0D1B2B063D1C283C0136243D2716223D30162D05260732['curValues']) . '],"windowId":"YnJ733"},"ID":47553,"umid":1930}';
                    $slotSettings->SetGameData('AgeOfEgyptPTMWinValues', $_obf_0D1B2B063D1C283C0136243D2716223D30162D05260732['curValues']);
                    $slotSettings->SetGameData('AgeOfEgyptPTMPickedCount', 0);
                    $slotSettings->SetGameData('AgeOfEgyptPTMPickedCountArr', []);
                    $slotSettings->SetGameData('AgeOfEgyptPTMeggBonusNum', $eggBonusNum);
                }
                $response = '{"responseEvent":"spin","responseType":"' . $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] . '","serverResponse":{' . $_obf_0D0714245B2417292334031F051A36231C2F0802371622 . '"allbet":' . $slotSettings->GetGameData('AgeOfEgyptPTMAllBet') . ',"betLine":' . $slotSettings->GetGameData('AgeOfEgyptPTMBetLine') . ',"linesArr":[' . implode(',', $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['lines']) . '],"slotLines":' . $lines . ',"slotBet":' . $betLine . ',"totalFreeGames":' . $slotSettings->GetGameData('AgeOfEgyptPTMFreeGames') . ',"currentFreeGames":' . $slotSettings->GetGameData('AgeOfEgyptPTMCurrentFreeGame') . ',"Balance":' . $slotSettings->GetBalance() . ',"afterBalance":' . $slotSettings->GetBalance() . ',"bonusWin":' . $slotSettings->GetGameData('AgeOfEgyptPTMBonusWin') . ',"freeStartWin":' . $slotSettings->GetGameData('AgeOfEgyptPTMFreeStartWin') . ',"totalWin":' . $totalWin . ',"winLines":[' . $_obf_0D5B5C2E0D1C3D1F232F3E051D3225380127293C2A2432 . '],"bonusInfo":' . $scattersStr . ',"Jackpots":' . $_obf_0D28393910101E062539311B3F371C121912162B061E32 . ',"reelsSymbols":' . $_obf_0D273522403840350F0A36072E150A0524143F382C3B32 . '}}';
                $slotSettings->SetGameData('AgeOfEgyptPTMLastResponse', $response);
                $slotSettings->SaveLogReport($response, $betLine, $lines, $_obf_0D0C361D2E35362209025C2317232809271D34270D3232, $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent']);
            }
            switch( $umid ) 
            {
                case '47552':
                    if( $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['pickNum'] >= 0 && $slotSettings->GetGameData('AgeOfEgyptPTMPickedCount') < $slotSettings->GetGameData('AgeOfEgyptPTMeggBonusNum') ) 
                    {
                        $_obf_0D15343E02090311371C0D341B380D082C1F1E1F032101 = json_decode($slotSettings->GetGameData('AgeOfEgyptPTMLastResponse'));
                        $values = $slotSettings->GetGameData('AgeOfEgyptPTMWinValues');
                        $pick = $slotSettings->GetGameData('AgeOfEgyptPTMPickedCount');
                        $_obf_0D19040F1517090137280D011A253B1C24062916302F22 = $slotSettings->GetGameData('AgeOfEgyptPTMPickedCountArr');
                        $_obf_0D0C361D2E35362209025C2317232809271D34270D3232 = $values[$pick] * $slotSettings->GetGameData('AgeOfEgyptPTMBetLine');
                        $slotSettings->SetBalance($_obf_0D0C361D2E35362209025C2317232809271D34270D3232);
                        $pick++;
                        $_obf_0D19040F1517090137280D011A253B1C24062916302F22[] = $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['pickNum'];
                        $slotSettings->SetGameData('AgeOfEgyptPTMPickedCount', $pick);
                        $slotSettings->SetGameData('AgeOfEgyptPTMPickedCountArr', $_obf_0D19040F1517090137280D011A253B1C24062916302F22);
                        $_obf_0D15343E02090311371C0D341B380D082C1F1E1F032101->serverResponse->PickedCount = $pick;
                        $_obf_0D15343E02090311371C0D341B380D082C1F1E1F032101->serverResponse->PickedCountArr = $_obf_0D19040F1517090137280D011A253B1C24062916302F22;
                        $slotSettings->SaveLogReport(json_encode($_obf_0D15343E02090311371C0D341B380D082C1F1E1F032101), 0, 0, $_obf_0D0C361D2E35362209025C2317232809271D34270D3232, 'egg_bonus');
                        $slotSettings->SetGameData('AgeOfEgyptPTMLastResponse', json_encode($_obf_0D15343E02090311371C0D341B380D082C1F1E1F032101));
                        $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"pickedIndex":' . $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['pickNum'] . ',"windowId":"YnJ733"},"ID":49298,"umid":1934}';
                    }
                    break;
                case '31031':
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"urlList":[{"urlType":"mobile_login","url":"https://login.loc/register","priority":1},{"urlType":"mobile_support","url":"https://ww2.loc/support","priority":1},{"urlType":"playerprofile","url":"","priority":1},{"urlType":"playerprofile","url":"","priority":10},{"urlType":"gambling_commission","url":"","priority":1},{"urlType":"cashier","url":"","priority":1},{"urlType":"cashier","url":"","priority":1}]},"ID":100}';
                    break;
                case '10001':
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"typeBalance":2,"balanceInCents":0},"ID":40083,"umid":3}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"typeBalance":0,"currency":"' . $slotSettings->slotCurrency . '","balanceInCents":' . $_obf_0D1713290429323C0B2B02212E103E165B173416383632 . ',"deltaBalanceInCents":0},"ID":40083,"umid":4}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"commandId":13218,"params":["0","null"]},"ID":50001,"umid":5}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"token":{"secretKey":"","currency":"USD","balance":0,"loginTime":""},"ID":10002,"umid":7}';
                    break;
                case '40294':
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"nicknameInfo":{"nickname":""},"ID":10022,"umid":8}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"commandId":10713,"params":["0","ba","bj","ct","gc","grel","hb","po","ro","sc","tr"]},"ID":50001,"umid":9}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"commandId":11666,"params":["0","0","0"]},"ID":50001,"umid":11}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"commandId":13981,"params":["0","1"]},"ID":50001,"umid":12}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"commandId":14080,"params":["0","0"]},"ID":50001,"umid":14}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"keyValueCount":5,"elementsPerKey":1,"params":["10","1","11","500","12","1","13","0","14","0"]},"ID":40716,"umid":15}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"typeBalance":0,"currency":"' . $slotSettings->slotCurrency . '","balanceInCents":' . $_obf_0D1713290429323C0B2B02212E103E165B173416383632 . ',"deltaBalanceInCents":0},"ID":40083,"umid":16}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"balanceInfo":{"clientType":"casino","totalBalance":' . $_obf_0D1713290429323C0B2B02212E103E165B173416383632 . ',"currency":"' . $slotSettings->slotCurrency . '","balanceChange":' . $_obf_0D1713290429323C0B2B02212E103E165B173416383632 . '},"ID":10006,"umid":17}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{},"ID":40292,"umid":18}';
                    break;
                case '10010':
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"urls":{"casino-cashier-myaccount":[],"regulation_pt_self_exclusion":[],"link_legal_aams":[],"regulation_pt_player_protection":[],"mobile_cashier":[],"mobile_bank":[],"mobile_bonus_terms":[],"mobile_help":[],"link_responsible":[],"cashier":[{"url":"","priority":1},{"url":"","priority":1}],"gambling_commission":[{"url":"","priority":1},{"url":"","priority":1}],"desktop_help":[],"chat_token":[],"mobile_login_error":[],"mobile_error":[],"mobile_login":[{"url":"","priority":1}],"playerprofile":[{"url":"","priority":1},{"url":"","priority":10}],"link_legal_half":[],"ngmdesktop_quick_deposit":[],"external_login_form":[],"mobile_main_promotions":[],"mobile_lobby":[],"mobile_promotion":[],{"url":"","priority":1},{"url":"","priority":10}],"mobile_withdraw":[],"mobile_funds_trans":[],"mobile_quick_deposit":[],"mobile_history":[],"mobile_deposit_limit":[],"minigames_help":[],"link_legal_18":[],"mobile_responsible":[],"mobile_share":[],"mobile_lobby_error":[],"mobile_mobile_comp_points":[],"mobile_support":[{"url":"","priority":1}],"mobile_chat":[],"mobile_logout":[],"mobile_deposit":[],"invite_friend":[]}},"ID":10011,"umid":19}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"brokenGames":[],"windowId":"SuJLru"},"ID":40037,"umid":20}';
                    break;
                case '40066':
                    $_obf_0D131333153E3B3F113536290D1D1A025B0D3F16341932 = $slotSettings->Bet;
                    for( $i = 0; $i < count($_obf_0D131333153E3B3F113536290D1D1A025B0D3F16341932); $i++ ) 
                    {
                        $_obf_0D131333153E3B3F113536290D1D1A025B0D3F16341932[$i] = $_obf_0D131333153E3B3F113536290D1D1A025B0D3F16341932[$i] * 100;
                    }
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"funNoticeGames":0,"funNoticePayouts":0,"gameGroup":"ssp","minBet":0,"maxBet":0,"minPosBet":0,"maxPosBet":50000,"coinSizes":[' . implode(',', $_obf_0D131333153E3B3F113536290D1D1A025B0D3F16341932) . ']},"ID":40025,"umid":21}';
                    break;
                case '40036':
                    $slotSettings->SetGameData($slotSettings->slotId . 'BonusWin', 0);
                    $slotSettings->SetGameData($slotSettings->slotId . 'FreeGames', 0);
                    $slotSettings->SetGameData($slotSettings->slotId . 'CurrentFreeGame', 0);
                    $slotSettings->SetGameData($slotSettings->slotId . 'TotalWin', 0);
                    $slotSettings->SetGameData($slotSettings->slotId . 'FreeBalance', 0);
                    $lastEvent = $slotSettings->GetHistory();
                    $slotSettings->SetGameData($slotSettings->slotId . 'brokenGames', '');
                    if( $lastEvent != 'NULL' ) 
                    {
                        $slotSettings->SetGameData($slotSettings->slotId . 'BonusWin', $lastEvent->serverResponse->bonusWin);
                        $slotSettings->SetGameData($slotSettings->slotId . 'FreeStartWin', $lastEvent->serverResponse->freeStartWin);
                        $slotSettings->SetGameData($slotSettings->slotId . 'FreeGames', $lastEvent->serverResponse->totalFreeGames);
                        $slotSettings->SetGameData($slotSettings->slotId . 'CurrentFreeGame', $lastEvent->serverResponse->currentFreeGames);
                        $slotSettings->SetGameData($slotSettings->slotId . 'TotalWin', $lastEvent->serverResponse->totalWin);
                        $slotSettings->SetGameData($slotSettings->slotId . 'FreeBalance', $lastEvent->serverResponse->Balance);
                        $slotSettings->SetGameData($slotSettings->slotId . 'LinesArr', $lastEvent->serverResponse->linesArr);
                        $slotSettings->SetGameData($slotSettings->slotId . 'Bet', $lastEvent->serverResponse->slotBet);
                        $slotSettings->SetGameData($slotSettings->slotId . 'AllBet', $lastEvent->serverResponse->allbet);
                        $slotSettings->SetGameData('AgeOfEgyptPTMLastResponse', json_encode($lastEvent));
                        $slotSettings->SetGameData('AgeOfEgyptPTMWinValues', $lastEvent->serverResponse->winValues);
                        $slotSettings->SetGameData('AgeOfEgyptPTMPickedCount', $lastEvent->serverResponse->PickedCount);
                        $slotSettings->SetGameData('AgeOfEgyptPTMPickedCountArr', $lastEvent->serverResponse->PickedCountArr);
                        $slotSettings->SetGameData('AgeOfEgyptPTMEggNum', $lastEvent->serverResponse->eggBonusNum);
                        $slotSettings->SetGameData('AgeOfEgyptPTMEeggBonusNum', $lastEvent->serverResponse->eggBonusNum);
                        if( $slotSettings->GetGameData($slotSettings->slotId . 'CurrentFreeGame') < $slotSettings->GetGameData($slotSettings->slotId . 'FreeGames') && $slotSettings->GetGameData($slotSettings->slotId . 'FreeGames') > 0 ) 
                        {
                            $slotSettings->SetGameData($slotSettings->slotId . 'brokenGames', 'agoeg');
                        }
                        if( $lastEvent->responseType == 'egg_bonus' && $slotSettings->GetGameData('AgeOfEgyptPTMPickedCount') < $slotSettings->GetGameData('AgeOfEgyptPTMEeggBonusNum') ) 
                        {
                            $slotSettings->SetGameData($slotSettings->slotId . 'brokenGames', 'agoeg');
                        }
                        $slotSettings->SetGameData('AgeOfEgyptPTMresponseType', $lastEvent->responseType);
                    }
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"brokenGames":["' . $slotSettings->GetGameData($slotSettings->slotId . 'brokenGames') . '"],"windowId":"SuJLru"},"ID":40037,"umid":22}';
                    break;
                case '40020':
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"typeBalance":2,"balanceInCents":0},"ID":40085}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"typeBalance":1,"balanceInCents":0},"ID":40085}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"typeBalance":0,"currency":"' . $slotSettings->slotCurrency . '","balanceInCents":' . $_obf_0D1713290429323C0B2B02212E103E165B173416383632 . ',"deltaBalanceInCents":0},"ID":40085}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"credit":' . $_obf_0D1713290429323C0B2B02212E103E165B173416383632 . ',"windowId":"SuJLru"},"ID":40026,"umid":28}';
                    break;
                case '40030':
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"typeBalance":2,"balanceInCents":0},"ID":40085}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"typeBalance":1,"balanceInCents":0},"ID":40085}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"typeBalance":0,"currency":"' . $slotSettings->slotCurrency . '","balanceInCents":' . $_obf_0D1713290429323C0B2B02212E103E165B173416383632 . ',"deltaBalanceInCents":0},"ID":40085}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"credit":' . $_obf_0D1713290429323C0B2B02212E103E165B173416383632 . ',"windowId":"SuJLru"},"ID":40026,"umid":28}';
                    if( $slotSettings->GetGameData($slotSettings->slotId . 'brokenGames') != '' ) 
                    {
                        if( $slotSettings->GetGameData('AgeOfEgyptPTMresponseType') == 'egg_bonus' ) 
                        {
                            $values = $slotSettings->GetGameData('AgeOfEgyptPTMWinValues');
                            $pick = $slotSettings->GetGameData('AgeOfEgyptPTMPickedCount');
                            $_obf_0D19040F1517090137280D011A253B1C24062916302F22 = $slotSettings->GetGameData('AgeOfEgyptPTMPickedCountArr');
                            $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"freeSpinsData":{"numFreeSpins":0,"coinsize":' . ($slotSettings->GetGameData($slotSettings->slotId . 'Bet') * 100) . ',"rows":[' . implode(',', $slotSettings->GetGameData($slotSettings->slotId . 'LinesArr')) . '],"gamewin":' . ($slotSettings->GetGameData($slotSettings->slotId . 'FreeStartWin') * 100) . ',"freespinwin":0,"freespinTriggerReels":[99,8,115,29,92],"coins":1,"multiplier":1,"mode":0,"startBonus":1},"bonusIds":["ssp_bonusgame3"],"winValues":[' . implode(',', $values) . '],"pickedValues":[' . implode(',', $_obf_0D19040F1517090137280D011A253B1C24062916302F22) . '],"reelinfo":[99,8,115,29,92],"windowId":"gh1xj7"},"ID":47550,"umid":28}';
                        }
                        else
                        {
                            $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"freeSpinsData":{"numFreeSpins":' . ($slotSettings->GetGameData($slotSettings->slotId . 'FreeGames') - $slotSettings->GetGameData($slotSettings->slotId . 'CurrentFreeGame')) . ',"coinsize":' . ($slotSettings->GetGameData($slotSettings->slotId . 'Bet') * 100) . ',"rows":[' . implode(',', $slotSettings->GetGameData($slotSettings->slotId . 'LinesArr')) . '],"gamewin":' . ($slotSettings->GetGameData($slotSettings->slotId . 'FreeStartWin') * 100) . ',"freespinwin":' . ($slotSettings->GetGameData($slotSettings->slotId . 'BonusWin') * 100) . ',"freespinTriggerReels":[43,14,75,118,41],"coins":1,"multiplier":3,"mode":1,"startBonus":1},"bonusIds":["ssp_freegames"],"reelinfo":[49,110,50,107,77],"windowId":"jtaDrF"},"ID":47550,"umid":28}';
                        }
                    }
                    break;
                case '48300':
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"balanceInfo":{"clientType":"casino","totalBalance":' . $_obf_0D1713290429323C0B2B02212E103E165B173416383632 . ',"currency":"' . $slotSettings->slotCurrency . '","balanceChange":0},"ID":10006,"umid":30}';
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"waitingLogins":[],"waitingAlerts":[],"waitingDialogs":[],"waitingDialogMessages":[],"waitingToasterMessages":[]},"ID":48301,"umid":31}';
                    break;
            }
            $response = implode('------', $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201);
            $slotSettings->SaveGameData();
            \DB::commit();
            return $response;
        }
    }

}
