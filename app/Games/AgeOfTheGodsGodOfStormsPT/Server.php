<?php 
namespace VanguardLTE\Games\AgeOfTheGodsGodOfStormsPT
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
                if( isset($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['ID']) && $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['ID'] == 40041 ) 
                {
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"jackpotUpdates":{"mrj":[{"coinSize":400,"jackpot":' . ($slotSettings->slotJackpot[3] * 100) . '},{"coinSize":300,"jackpot":' . ($slotSettings->slotJackpot[2] * 100) . '},{"coinSize":200,"jackpot":' . ($slotSettings->slotJackpot[1] * 100) . '},{"coinSize":100,"jackpot":' . ($slotSettings->slotJackpot[0] * 100) . '}]}},"ID":40042,"umid":10}';
                }
                else if( isset($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['ID']) ) 
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
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"jackpotUpdates":{"mrj":[{"coinSize":400,"jackpot":' . ($slotSettings->slotJackpot[3] * 100) . '},{"coinSize":300,"jackpot":' . ($slotSettings->slotJackpot[2] * 100) . '},{"coinSize":200,"jackpot":' . ($slotSettings->slotJackpot[1] * 100) . '},{"coinSize":100,"jackpot":' . ($slotSettings->slotJackpot[0] * 100) . '}]}},"ID":40042,"umid":10}';
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
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTBonusWin', 0);
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTFreeGames', 0);
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTCurrentFreeGame', 0);
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTTotalWin', 0);
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTFreeBalance', 0);
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTFreeStartWin', 0);
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTFreeMpl', $slotSettings->slotFreeMpl);
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTIncreaseMpl', 0);
                }
                else if( $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['spinType'] == 're' ) 
                {
                    $umid = '0';
                    $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] = 'freespin';
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTCurrentFreeGame', $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTCurrentFreeGame') + 1);
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTIncreaseMpl', $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTIncreaseMpl') + 1);
                    $_obf_0D32121F062C192C3B232E0A33102329195B1E055C1B22 = [
                        1, 
                        1, 
                        2, 
                        3, 
                        5, 
                        5, 
                        5, 
                        5, 
                        5
                    ];
                    $bonusMpl = $_obf_0D32121F062C192C3B232E0A33102329195B1E055C1B22[$slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTIncreaseMpl')];
                }
                $linesId = [];
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
                    1, 
                    1, 
                    2, 
                    3, 
                    3
                ];
                $linesId[6] = [
                    3, 
                    3, 
                    2, 
                    1, 
                    1
                ];
                $linesId[7] = [
                    1, 
                    2, 
                    2, 
                    2, 
                    1
                ];
                $linesId[8] = [
                    3, 
                    2, 
                    2, 
                    2, 
                    3
                ];
                $linesId[9] = [
                    2, 
                    1, 
                    1, 
                    1, 
                    2
                ];
                $linesId[10] = [
                    2, 
                    3, 
                    3, 
                    3, 
                    2
                ];
                $linesId[11] = [
                    2, 
                    2, 
                    1, 
                    2, 
                    2
                ];
                $linesId[12] = [
                    2, 
                    2, 
                    3, 
                    2, 
                    2
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
                    1, 
                    3, 
                    1, 
                    3, 
                    1
                ];
                $linesId[16] = [
                    3, 
                    1, 
                    3, 
                    1, 
                    3
                ];
                $linesId[17] = [
                    1, 
                    3, 
                    3, 
                    3, 
                    1
                ];
                $linesId[18] = [
                    3, 
                    1, 
                    1, 
                    1, 
                    3
                ];
                $linesId[19] = [
                    2, 
                    1, 
                    2, 
                    3, 
                    2
                ];
                $linesId[20] = [
                    2, 
                    3, 
                    2, 
                    1, 
                    2
                ];
                $linesId[21] = [
                    1, 
                    1, 
                    3, 
                    3, 
                    3
                ];
                $linesId[22] = [
                    3, 
                    3, 
                    1, 
                    1, 
                    1
                ];
                $linesId[23] = [
                    1, 
                    3, 
                    2, 
                    3, 
                    1
                ];
                $linesId[24] = [
                    3, 
                    1, 
                    2, 
                    1, 
                    3
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
                    $slotSettings->SetBalance(-1 * $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['bet'], $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent']);
                    $_obf_0D2A0526273612293511363C26193E1C130B2719192611 = $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['bet'] / 100 * $slotSettings->GetPercent();
                    $slotSettings->SetBank((isset($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent']) ? $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] : ''), $_obf_0D2A0526273612293511363C26193E1C130B2719192611, $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent']);
                    $_obf_0D3F08152E011C2E053E0C34233B231F3D212F3C1B2A22 = $slotSettings->UpdateJackpots($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['bet']);
                    $slotSettings->SetGameData($slotSettings->slotId . 'JackWinID', $_obf_0D3F08152E011C2E053E0C34233B231F3D212F3C1B2A22['isJackId']);
                }
                $_obf_0D360F0140113330275B14311E3516150112390A0F1B22 = $slotSettings->GetSpinSettings($_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'], $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['bet'], $lines);
                $winType = $_obf_0D360F0140113330275B14311E3516150112390A0F1B22[0];
                $_obf_0D3030072F273706293C133F2F072B113B383322291201 = $_obf_0D360F0140113330275B14311E3516150112390A0F1B22[1];
                if( isset($_obf_0D3F08152E011C2E053E0C34233B231F3D212F3C1B2A22) && $_obf_0D3F08152E011C2E053E0C34233B231F3D212F3C1B2A22['isJackPay'] ) 
                {
                    $_obf_0D1A1E0F30363C13392516380B2F0B1215223713192C32 = 1;
                    $winType = 'bonus';
                }
                else
                {
                    $_obf_0D1A1E0F30363C13392516380B2F0B1215223713192C32 = 0;
                }
                $_obf_0D31140B3D1228102C27370412242B06403F1331313F22 = '';
                if( $_obf_0D1A1E0F30363C13392516380B2F0B1215223713192C32 == 1 && $winType == 'bonus' ) 
                {
                    $_obf_0D31140B3D1228102C27370412242B06403F1331313F22 = 'bonus2';
                    $winType = 'none';
                }
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
                        0
                    ];
                    $wild = ['10'];
                    $scatter = '10';
                    $reels = $slotSettings->GetReelStrips($winType, $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent']);
                    $_obf_0D2613221F3511102909331A5C2E1B1D085C3B05120332 = $reels;
                    $isBonusStart = false;
                    if( $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] == 'freespin' ) 
                    {
                        if( $winType == 'bonus' ) 
                        {
                            $winType = 'none';
                        }
                        $_obf_0D3E191B39060F3438355C091218343B13035C283E3332 = $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTwildReels');
                        for( $j = 0; $j < count($_obf_0D3E191B39060F3438355C091218343B13035C283E3332); $j++ ) 
                        {
                            $_obf_0D3E191B39060F3438355C091218343B13035C283E3332[$j]--;
                            if( $_obf_0D3E191B39060F3438355C091218343B13035C283E3332[$j] > 0 ) 
                            {
                                $reels['reel' . $_obf_0D3E191B39060F3438355C091218343B13035C283E3332[$j]][0] = '10';
                                $reels['reel' . $_obf_0D3E191B39060F3438355C091218343B13035C283E3332[$j]][1] = '10';
                                $reels['reel' . $_obf_0D3E191B39060F3438355C091218343B13035C283E3332[$j]][2] = '10';
                            }
                        }
                    }
                    for( $r = 1; $r <= 5; $r++ ) 
                    {
                        for( $_obf_0D31403C0837332A1A1711312A3415151610280F122122 = 0; $_obf_0D31403C0837332A1A1711312A3415151610280F122122 <= 3; $_obf_0D31403C0837332A1A1711312A3415151610280F122122++ ) 
                        {
                            if( $reels['reel' . $r][$_obf_0D31403C0837332A1A1711312A3415151610280F122122] >= 10 ) 
                            {
                                $reels['reel' . $r][$_obf_0D31403C0837332A1A1711312A3415151610280F122122] = '10';
                            }
                        }
                    }
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
                                        $_obf_0D02100911023C3C260E0C262F5B2C1D2839310E112A32 = '{"Count":1,"Line":' . $k . ',"Win":' . $cWins[$k] . ',"stepWin":' . ($cWins[$k] + $totalWin + $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTBonusWin')) . ',"winReel1":[' . ($linesId[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":["none","none"],"winReel3":["none","none"],"winReel4":["none","none"],"winReel5":["none","none"]}';
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
                                        $_obf_0D02100911023C3C260E0C262F5B2C1D2839310E112A32 = '{"Count":2,"Line":' . $k . ',"Win":' . $cWins[$k] . ',"stepWin":' . ($cWins[$k] + $totalWin + $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTBonusWin')) . ',"winReel1":[' . ($linesId[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":[' . ($linesId[$k][1] - 1) . ',"' . $s[1] . '"],"winReel3":["none","none"],"winReel4":["none","none"],"winReel5":["none","none"]}';
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
                                        $_obf_0D02100911023C3C260E0C262F5B2C1D2839310E112A32 = '{"Count":3,"Line":' . $k . ',"Win":' . $cWins[$k] . ',"stepWin":' . ($cWins[$k] + $totalWin + $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTBonusWin')) . ',"winReel1":[' . ($linesId[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":[' . ($linesId[$k][1] - 1) . ',"' . $s[1] . '"],"winReel3":[' . ($linesId[$k][2] - 1) . ',"' . $s[2] . '"],"winReel4":["none","none"],"winReel5":["none","none"]}';
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
                                        $_obf_0D02100911023C3C260E0C262F5B2C1D2839310E112A32 = '{"Count":4,"Line":' . $k . ',"Win":' . $cWins[$k] . ',"stepWin":' . ($cWins[$k] + $totalWin + $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTBonusWin')) . ',"winReel1":[' . ($linesId[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":[' . ($linesId[$k][1] - 1) . ',"' . $s[1] . '"],"winReel3":[' . ($linesId[$k][2] - 1) . ',"' . $s[2] . '"],"winReel4":[' . ($linesId[$k][3] - 1) . ',"' . $s[3] . '"],"winReel5":["none","none"]}';
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
                                        $_obf_0D02100911023C3C260E0C262F5B2C1D2839310E112A32 = '{"Count":5,"Line":' . $k . ',"Win":' . $cWins[$k] . ',"stepWin":' . ($cWins[$k] + $totalWin + $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTBonusWin')) . ',"winReel1":[' . ($linesId[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":[' . ($linesId[$k][1] - 1) . ',"' . $s[1] . '"],"winReel3":[' . ($linesId[$k][2] - 1) . ',"' . $s[2] . '"],"winReel4":[' . ($linesId[$k][3] - 1) . ',"' . $s[3] . '"],"winReel5":[' . ($linesId[$k][4] - 1) . ',"' . $s[4] . '"]}';
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
                    $scattersStr = '{';
                    $scattersCount = 0;
                    $_obf_0D5B292D245B341404150D2E0C190E362A110E195C2401 = [];
                    $wildRow = 0;
                    for( $r = 1; $r <= 5; $r++ ) 
                    {
                        if( $_obf_0D2613221F3511102909331A5C2E1B1D085C3B05120332['reel' . $r][0] == '13' && $_obf_0D2613221F3511102909331A5C2E1B1D085C3B05120332['reel' . $r][1] == '14' && $_obf_0D2613221F3511102909331A5C2E1B1D085C3B05120332['reel' . $r][2] == '15' ) 
                        {
                            $isBonusStart = true;
                            $_obf_0D5B292D245B341404150D2E0C190E362A110E195C2401[] = $r;
                            $wildRow = $r;
                        }
                    }
                    $scattersWin = 0;
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
                    $totalWin += $scattersWin;
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
                            exit( $response );
                        }
                        if( $isBonusStart && ($winType != 'bonus' || $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] == 'freespin') ) 
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
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTBonusWin', $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTBonusWin') + $totalWin);
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTTotalWin', $totalWin);
                }
                else
                {
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTTotalWin', $totalWin);
                }
                $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTBonusStart', false);
                if( $isBonusStart ) 
                {
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTBonusStart', true);
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTBonusStep', 0);
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTwildReels', $_obf_0D5B292D245B341404150D2E0C190E362A110E195C2401);
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTIncreaseMpl', 0);
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTFreeStartWin', $totalWin);
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTBonusWin', 0);
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTFreeGames', $wildRow);
                }
                $_obf_0D1713290429323C0B2B02212E103E165B173416383632 = sprintf('%01.2f', $slotSettings->GetBalance()) * 100;
                $_obf_0D0C0B3E1D3D2119330A2611285C3E062E112A2F241222 = 'REGULAR';
                if( $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['spinType'] == 're' ) 
                {
                    $_obf_0D0C0B3E1D3D2119330A2611285C3E062E112A2F241222 = 'RE';
                }
                $_obf_0D352204063B1425241010342A0D112E0C153D01383132 = 'false';
                if( $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTBonusStart') ) 
                {
                    $_obf_0D352204063B1425241010342A0D112E0C153D01383132 = 'true';
                }
                if( $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] == 'freespin' ) 
                {
                    $slotSettings->SetGameData('AgeOfTheGodsGodOfStormsPTwildReels', $_obf_0D3E191B39060F3438355C091218343B13035C283E3332);
                }
                $_obf_0D273522403840350F0A36072E150A0524143F382C3B32 = '' . json_encode($reels) . '';
                $_obf_0D28393910101E062539311B3F371C121912162B061E32 = '' . json_encode($slotSettings->Jackpots) . '';
                $_obf_0D5B5C2E0D1C3D1F232F3E051D3225380127293C2A2432 = implode(',', $lineWins);
                $response = '{"responseEvent":"spin","responseType":"' . $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] . '","serverResponse":{"IncreaseMpl":' . $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTIncreaseMpl') . ',"linesArr":[' . implode(',', $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['lines']) . '],"slotLines":' . $lines . ',"slotBet":' . $betLine . ',"totalFreeGames":' . $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTFreeGames') . ',"currentFreeGames":' . $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTCurrentFreeGame') . ',"Balance":' . $slotSettings->GetBalance() . ',"afterBalance":' . $slotSettings->GetBalance() . ',"bonusWin":' . $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTBonusWin') . ',"FreeMpl":' . $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTFreeMpl') . ',"freeStartWin":' . $slotSettings->GetGameData('AgeOfTheGodsGodOfStormsPTFreeStartWin') . ',"totalWin":' . $totalWin . ',"winLines":[' . $_obf_0D5B5C2E0D1C3D1F232F3E051D3225380127293C2A2432 . '],"bonusInfo":' . $scattersStr . ',"Jackpots":' . $_obf_0D28393910101E062539311B3F371C121912162B061E32 . ',"reelsSymbols":' . $_obf_0D273522403840350F0A36072E150A0524143F382C3B32 . '}}';
                $slotSettings->SaveLogReport($response, $betLine, $lines, $_obf_0D0C361D2E35362209025C2317232809271D34270D3232, $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent']);
                $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"balance":' . $_obf_0D1713290429323C0B2B02212E103E165B173416383632 . ',"results":[' . implode(',', $reels['rp']) . '],"spinType":"' . $_obf_0D0C0B3E1D3D2119330A2611285C3E062E112A2F241222 . '","symbols":[3,1,8,1,6,6,1,9,2,2,6,6,3,5],"windowId":"qkpJt6"},"ID":48600,"umid":36}';
                if( $_obf_0D31140B3D1228102C27370412242B06403F1331313F22 == 'bonus2' && $_obf_0D1027172F0A071202030538280B3D0B12241B16110E22['slotEvent'] != 'freespin' ) 
                {
                    $_obf_0D3D142B372330110F102E242819080B361209192B2732 = [
                        1, 
                        1, 
                        1, 
                        1, 
                        1, 
                        2, 
                        2, 
                        2, 
                        2, 
                        2, 
                        3, 
                        3, 
                        3, 
                        3, 
                        3, 
                        4, 
                        4, 
                        4, 
                        4, 
                        4
                    ];
                    $_obf_0D1D174013022B3E283C11222503275C351F0214390111 = [
                        0, 
                        0, 
                        0, 
                        0, 
                        0
                    ];
                    $jid = 0;
                    $JackWinID = $slotSettings->GetGameData($slotSettings->slotId . 'JackWinID') + 1;
                    shuffle($_obf_0D3D142B372330110F102E242819080B361209192B2732);
                    for( $i = 0; $i < 20; $i++ ) 
                    {
                        if( $_obf_0D1D174013022B3E283C11222503275C351F0214390111[$_obf_0D3D142B372330110F102E242819080B361209192B2732[$i]] == 2 ) 
                        {
                            $_obf_0D3D142B372330110F102E242819080B361209192B2732[$i] = $JackWinID;
                        }
                        $_obf_0D1D174013022B3E283C11222503275C351F0214390111[$_obf_0D3D142B372330110F102E242819080B361209192B2732[$i]]++;
                        if( $_obf_0D1D174013022B3E283C11222503275C351F0214390111[$_obf_0D3D142B372330110F102E242819080B361209192B2732[$i]] >= 3 ) 
                        {
                            $jid = $_obf_0D3D142B372330110F102E242819080B361209192B2732[$i];
                            break;
                        }
                    }
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"jackpotUpdates":{"mrj":[{"coinSize":400,"jackpot":' . ($slotSettings->slotJackpot[3] * 100) . '},{"coinSize":300,"jackpot":' . ($slotSettings->slotJackpot[2] * 100) . '},{"coinSize":200,"jackpot":' . ($slotSettings->slotJackpot[1] * 100) . '},{"coinSize":100,"jackpot":' . ($slotSettings->slotJackpot[0] * 100) . '}]}},"ID":40042,"umid":60}';
                    $slotSettings->SetBalance($slotSettings->slotJackpot[$jid - 1]);
                    $_obf_0D21212D3C3D25082B390601401221032F091B1E1C5B32 = $slotSettings->slotJackpot[$jid - 1] * 100;
                    $_obf_0D06271E23103E0C3B152E253723081536110223313B32 = $slotSettings->slotJackpot[$jid - 1];
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"startTime":1,"winningLevel":' . $jid . ',"totalWin":' . $_obf_0D21212D3C3D25082B390601401221032F091B1E1C5B32 . ',"reelInfo":[' . implode(',', $_obf_0D3D142B372330110F102E242819080B361209192B2732) . '],"windowId":"33zr6v"},"ID":40071,"umid":40}';
                    $slotSettings->SaveLogReport($response, $betLine, $lines, $_obf_0D06271E23103E0C3B152E253723081536110223313B32, 'JPG');
                }
                else
                {
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"jackpotUpdates":{"mrj":[{"coinSize":400,"jackpot":' . ($slotSettings->slotJackpot[3] * 100) . '},{"coinSize":300,"jackpot":' . ($slotSettings->slotJackpot[2] * 100) . '},{"coinSize":200,"jackpot":' . ($slotSettings->slotJackpot[1] * 100) . '},{"coinSize":100,"jackpot":' . ($slotSettings->slotJackpot[0] * 100) . '}]}},"ID":40042,"umid":60}';
                }
                $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"windowId":"Hr1cOy"},"ID":40072,"umid":44}';
                $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"typeBalance":0,"currency":"' . $slotSettings->slotCurrency . '","balanceInCents":' . $_obf_0D1713290429323C0B2B02212E103E165B173416383632 . ',"deltaBalanceInCents":1},"ID":40085}';
                $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"balanceInfo":{"clientType":"casino","totalBalance":' . $_obf_0D1713290429323C0B2B02212E103E165B173416383632 . ',"currency":"' . $slotSettings->slotCurrency . '","balanceChange":0},"ID":10006,"umid":45}';
                $response = implode('------', $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201);
                $slotSettings->SaveGameData();
                \DB::commit();
                return $response;
            }
            switch( $umid ) 
            {
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
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"jackpotUpdates":{"mrj":[{"coinSize":400,"jackpot":' . ($slotSettings->slotJackpot[3] * 100) . '},{"coinSize":300,"jackpot":' . ($slotSettings->slotJackpot[2] * 100) . '},{"coinSize":200,"jackpot":' . ($slotSettings->slotJackpot[1] * 100) . '},{"coinSize":100,"jackpot":' . ($slotSettings->slotJackpot[0] * 100) . '}]}},"ID":40042,"umid":10}';
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
                    $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"funNoticeGames":0,"funNoticePayouts":0,"gameGroup":"aeolus","minBet":0,"maxBet":0,"minPosBet":0,"maxPosBet":50000,"coinSizes":[' . implode(',', $_obf_0D131333153E3B3F113536290D1D1A025B0D3F16341932) . ']},"ID":40025,"umid":21}';
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
                        $slotSettings->SetGameData($slotSettings->slotId . 'FreeMpl', $lastEvent->serverResponse->FreeMpl);
                        $slotSettings->SetGameData($slotSettings->slotId . 'LinesArr', $lastEvent->serverResponse->linesArr);
                        $slotSettings->SetGameData($slotSettings->slotId . 'Bet', $lastEvent->serverResponse->slotBet);
                        $slotSettings->SetGameData($slotSettings->slotId . 'IncreaseMpl', $lastEvent->serverResponse->IncreaseMpl);
                        if( $slotSettings->GetGameData($slotSettings->slotId . 'CurrentFreeGame') < $slotSettings->GetGameData($slotSettings->slotId . 'FreeGames') && $slotSettings->GetGameData($slotSettings->slotId . 'FreeGames') > 0 ) 
                        {
                            $slotSettings->SetGameData($slotSettings->slotId . 'brokenGames', 'aeolus');
                        }
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
                        $_obf_0D063C3304131F4019060B2613290F04173D5B232B2422 = '';
                        $_obf_0D15240C2724212608283D0C5B1E141D0230162D100201[] = '3:::{"data":{"freeSpinsData":{"numFreeSpins":0,"coinsize":' . ($slotSettings->GetGameData($slotSettings->slotId . 'Bet') * 100) . ',"rows":[' . implode(',', $slotSettings->GetGameData($slotSettings->slotId . 'LinesArr')) . '],"gamewin":' . ($slotSettings->GetGameData($slotSettings->slotId . 'FreeStartWin') * 100) . ',"freespinwin":' . ($slotSettings->GetGameData($slotSettings->slotId . 'BonusWin') * 100) . ',"freespinTriggerReels":[16,0,5,12,59],"coins":1,"multiplier":' . $slotSettings->GetGameData($slotSettings->slotId . 'FreeMpl') . ',"mode":0,"startBonus":0},"respinWin":' . ($slotSettings->GetGameData($slotSettings->slotId . 'BonusWin') * 100 + ($slotSettings->GetGameData($slotSettings->slotId . 'FreeStartWin') * 100)) . ',"symbols":[11,11,11,1,6,6,4,3,8,7,7,3,8,1,0],"respinsLeft":' . ($slotSettings->GetGameData($slotSettings->slotId . 'FreeGames') - $slotSettings->GetGameData($slotSettings->slotId . 'CurrentFreeGame')) . ',"multiplier":1,"jackpotWin":0,"bonusGameName":"aeolus_bonus","reelinfo":[16,0,5,12,59],"windowId":"pqlR9s"},"ID":48601,"umid":30}';
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
